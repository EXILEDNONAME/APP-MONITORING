<?php

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
], function(){
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