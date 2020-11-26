<?php

use Illuminate\Support\Facades\Route;

Route::resource("applications", App\Http\Controllers\ApplicationController::class);

Route::view('/','appPages.list')->name("home");