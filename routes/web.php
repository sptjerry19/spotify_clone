<?php

use App\Http\Controllers\SongsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create/song', function () {
    return view('songs.create');
});

Route::prefix('page')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::prefix('songs')->group(function () {
        Route::get('', [SongsController::class, 'index'])->name('page.songs');
        Route::post('store', [SongsController::class, 'store'])->name('page.songs.store');
    });
});
