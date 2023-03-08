<?php

use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);

Route::resource('/posts', \App\Http\Controllers\PostController::class);

Route::group(['prefix' => 'posts'], function () {
    Route::delete('pendidikan/{pendidikan}', [PostController::class, 'pendidikanDestroy']);
    Route::delete('pelatihan/{pelatihan}', [PostController::class, 'pelatihanDestroy']);
    Route::delete('pekerjaan/{pekerjaan}', [PostController::class, 'pekerjaanDestroy']);
});
