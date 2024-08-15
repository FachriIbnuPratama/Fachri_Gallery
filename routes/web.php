<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\FotoController;
Route::resource("/foto", FotoController::class);

use App\Http\Controllers\AlbumController;
Route::resource("/album", AlbumController::class);