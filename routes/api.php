<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('api')->post('/index', 'RecordController@index');
Route::middleware('api')->post('/records/update', 'RecordController@update');
//Route::middleware('api')->post('/records/store', 'RecordController@store');

