<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.frontend.index');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/backend/dashboard.php';
require __DIR__ . '/backend/language.php';
require __DIR__ . '/backend/administrative/application.php';
require __DIR__ . '/backend/administrative/database.php';
require __DIR__ . '/backend/administrative/management.php';
require __DIR__ . '/backend/administrative/session.php';

require __DIR__ . '/backend/application/datatable.php';

Route::group([
    'as' => 'dashboard.main.access-points.',
    'prefix' => 'dashboard/access-points',
    'namespace' => 'App\Http\Controllers\Backend\__Main',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('chart', 'AccessPointController@chart')->name('chart');
    Route::get('active/{id}', 'AccessPointController@active')->name('active');
    Route::get('activities', 'AccessPointController@activity')->name('activity');
    Route::get('delete/{id}', 'AccessPointController@delete')->name('delete');
    Route::get('delete-permanent/{id}', 'AccessPointController@delete_permanent')->name('delete-permanent');
    Route::get('inactive/{id}', 'AccessPointController@inactive')->name('inactive');
    Route::get('restore/{id}', 'AccessPointController@restore')->name('restore');
    Route::get('selected-active', 'AccessPointController@selected_active')->name('selected-active');
    Route::get('selected-inactive', 'AccessPointController@selected_inactive')->name('selected-inactive');
    Route::get('selected-delete', 'AccessPointController@selected_delete')->name('selected-delete');
    Route::get('selected-delete-permanent', 'AccessPointController@selected_delete_permanent')->name('selected-delete-permanent');
    Route::get('selected-restore', 'AccessPointController@selected_restore')->name('selected-restore');
    Route::get('trash', 'AccessPointController@trash')->name('trash');
    Route::resource('/', 'AccessPointController')->parameters(['' => 'id']);
});

Route::group([
    'as' => 'dashboard.main.monitorings.',
    'prefix' => 'dashboard/monitorings',
    'namespace' => 'App\Http\Controllers\Backend\__Main',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('chart', 'MonitoringController@chart')->name('chart');
    Route::get('active/{id}', 'MonitoringController@active')->name('active');
    Route::get('activities', 'MonitoringController@activity')->name('activity');
    Route::get('delete/{id}', 'MonitoringController@delete')->name('delete');
    Route::get('delete-permanent/{id}', 'MonitoringController@delete_permanent')->name('delete-permanent');
    Route::get('inactive/{id}', 'MonitoringController@inactive')->name('inactive');
    Route::get('restore/{id}', 'MonitoringController@restore')->name('restore');
    Route::get('selected-active', 'MonitoringController@selected_active')->name('selected-active');
    Route::get('selected-inactive', 'MonitoringController@selected_inactive')->name('selected-inactive');
    Route::get('selected-delete', 'MonitoringController@selected_delete')->name('selected-delete');
    Route::get('selected-delete-permanent', 'MonitoringController@selected_delete_permanent')->name('selected-delete-permanent');
    Route::get('selected-restore', 'MonitoringController@selected_restore')->name('selected-restore');
    Route::get('trash', 'MonitoringController@trash')->name('trash');
    Route::resource('/', 'MonitoringController')->parameters(['' => 'id']);
});

Route::get('/ping/{ip}', function ($ip) {
    try {
        if (strncasecmp(PHP_OS, 'WIN', 3) === 0) {
            $output = shell_exec("ping -n 1 -w 100 " . escapeshellarg($ip));
            $isAlive = strpos($output, 'TTL=') !== false;
        } else {
            $output = shell_exec("ping -c 1 -W 1 " . escapeshellarg($ip));
            $isAlive = strpos($output, '1 received') !== false || strpos($output, 'bytes from') !== false;
        }
        return response()->json(['status' => $isAlive ? 'online' : 'offline']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'unknown']);
    }
});

Route::post('/ping-check-batch', function (Request $request) {
    $ips = $request->get('ips', []);
    $results = [];

    foreach ($ips as $ip) {
    $start = microtime(true);
    $conn = @fsockopen($ip, 80, $errno, $errstr, 0.1);
    if ($conn) {
        fclose($conn);
        $results[$ip] = 'online';
    } else {
        $results[$ip] = 'offline';
    }
}

    return response()->json($results);
});
