<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ImageController;

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


Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(ImageController::class)->group(function (){
        Route::get('/dashboard', 'index')->name('dashboard.index');
        Route::get('/create', 'create')->name('create');
        Route::get('/show/{id}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::get('/dashboard/{id}', 'edit')->name('edit');
        Route::put('/dashboard/{id}', 'update')->name('update');
        Route::delete('/dashboard/{id}', 'delete')->name('delete');
    });
});

Route::get('/', function () {
    return redirect()->route('login');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
