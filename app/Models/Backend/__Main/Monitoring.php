<?php

namespace App\Models\Backend\__Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Monitoring extends Model 
{
    use HasFactory, LogsActivity, SoftDeletes;

    protected $table = 'main_monitorings';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['created', 'deleted', 'updated'];

    public function getActivitylogOptions(): LogOptions 
    {
        return LogOptions::defaults()->logOnly(['*']);
    }
}