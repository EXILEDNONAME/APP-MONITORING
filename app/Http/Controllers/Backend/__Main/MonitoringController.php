<?php

namespace App\Http\Controllers\Backend\__Main;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use App\Http\Traits\Backend\__System\Controllers\Datatable\ExtensionController;
use App\Http\Traits\HandlesFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controllers\HasMiddleware;
use Yajra\DataTables\Facades\DataTables;

use App\Http\Requests\Backend\__Main\Monitoring\StoreRequest;
use App\Http\Requests\Backend\__Main\Monitoring\UpdateRequest;

class MonitoringController extends Controller implements HasMiddleware
{
    /**
     **************************************************
     * @return MIDDLEWARE
     **************************************************
     **/

    public static function middleware(): array
    {
        return [];
    }

    /**
     **************************************************
     * @return CONSTRUCT
     **************************************************
     **/

    public function __construct()
    {
        $this->model            = 'App\Models\Backend\__Main\AccessPoint';
        $this->path             = 'pages.backend.__main.monitoring.';
        $this->url              = '/dashboard/monitorings';
        $this->sort             = '1, desc';
        $this->status           = 'default';

        app()->instance('current.model', $this->model);
        app()->instance('current.url', $this->url);
    }

    use DefaultController;
    use ExtensionController;
    use HandlesFormRequest;

    public function store(StoreRequest $request) {}
    public function update(UpdateRequest $request, $id) {}

    public function index()
    {
        $statusName = property_exists($this, 'status') && $this->status ? $this->status : 'default';
        $statusFilter = DB::table('system_status_filters')->where('name', $statusName)->first();
        $attributes = json_decode($statusFilter->properties ?? '[]', true);

        $model = $this->model;
        $sort = $this->sort;

        if (request()->ajax()) {
            $query = $this->model::query();

            if (request('date')) {
                $query->whereDate('date', request('date'));
            }
            if (request('date_start') && request('date_end')) {
                $query->whereBetween('date_start', [request('date_start'), request('date_end')]);
            }

            $datatable = DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('status_device', function ($order) {
                    return '<span class="status-device-cell" data-ip="' . $order->ip_address . '"><span class="spinner spinner-darker-success spinner-left mr-3"></span></span>';
                })
                ->editColumn('date', function ($order) {
                    return empty($order->date) ? NULL : \Carbon\Carbon::parse($order->date)->format('d F Y, H:i');
                })
                ->editColumn('date_start', function ($order) {
                    return empty($order->date_start) ? NULL : \Carbon\Carbon::parse($order->date_start)->format('d F Y');
                })
                ->editColumn('date_end', function ($order) {
                    return empty($order->date_end) ? NULL : \Carbon\Carbon::parse($order->date_end)->format('d F Y');
                })
                ->editColumn('description', function ($order) {
                    return nl2br(e($order->description));
                })
                ->editColumn('file', function ($order) {
                    if (!$order->file) {
                        return '<span class="text-muted"> - </span>';
                    }
                    $imgUrl = env("APP_URL") . '/storage/files/form-uploads/' . $order->file;
                    $modalId = 'modal-file-' . $order->id;
                    return <<<HTML
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#$modalId"><span class="fas fa-file-image text-success"></span></a>
                        <div class="modal fade" id="$modalId" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content">
                        <div class="modal-header"><h5 class="modal-title">Preview Image</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><i aria-hidden="true" class="ki ki-close"></i></button></div>
                        <div class="modal-body"><img width="100%" data-src="$imgUrl" class="lazy-img" loading="lazy" alt="Preview"></div>
                        <div class="modal-footer">
                            <a href="$imgUrl" class="btn btn-primary" download="{$order->file}">Download</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                        </div>
                        </div>
                        HTML;
                    return $html;
                });
            if ($this->table_relation_1 instanceof \Closure) {
                $datatable = ($this->table_relation_1)($datatable);
            }
            if ($this->table_relation_2 instanceof \Closure) {
                $datatable = ($this->table_relation_2)($datatable);
            }
            if ($this->table_relation_3 instanceof \Closure) {
                $datatable = ($this->table_relation_3)($datatable);
            }
            if ($this->table_relation_4 instanceof \Closure) {
                $datatable = ($this->table_relation_4)($datatable);
            }
            if ($this->table_relation_5 instanceof \Closure) {
                $datatable = ($this->table_relation_5)($datatable);
            }
            return $datatable->rawColumns(['file', 'status_device'])->make(true);
        }
        return view($this->path . 'index', compact(['attributes', 'model', 'sort']));
    }
}
