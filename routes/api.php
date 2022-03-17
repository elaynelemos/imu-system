<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('api')->post('/records/store', 'DatabaseController@save');