<?php

use Illuminate\Support\Facades\Route;

use Leeuwenkasteel\Icons\Http\Controllers\IndexController;

Route::middleware('web')->group(function() {
	Route::middleware('auth')->group(function() {
		Route::resource('icons', IndexController::class);
	});
});