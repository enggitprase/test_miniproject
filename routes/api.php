<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;

Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('get_user', [ApiController::class, 'get_user']);

    Route::get('mahasiswa', 'App\Http\Controllers\ReadController@index');
    Route::get('mahasiswa/{nim}', 'App\Http\Controllers\ReadController@GetByNim');
    Route::get('mahasiswa/getbynama/{nama}', 'App\Http\Controllers\ReadController@GetByNama');
    Route::get('mahasiswa/getbyymd/{ymd}', 'App\Http\Controllers\ReadController@GetByYmd');

    Route::post('mahasiswa', 'App\Http\Controllers\CreateController@create');
    Route::put('mahasiswa/update/{mahasiswa}', 'App\Http\Controllers\CreateController@updateById');
    Route::delete('mahasiswa/delete/{mahasiswa}', 'App\Http\Controllers\CreateController@delete');
});