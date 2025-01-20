<?php

use App\Http\Controllers\Controller;
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
    return view('layout');
});

Route::get('/admin', [Controller::class, 'admin'])->name('web.admin');
Route::post('/profile', [Controller::class, 'store'])->name('web.profile.store');
Route::post('/profile/update', [Controller::class, 'update'])->name('web.profile.update');