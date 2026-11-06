<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/postregister', [AuthController::class, 'postregister'])->name('postregister');

Route::get('/menu', [AuthController::class, 'menu'])->name('menu');

Route::get('/admin', [AuthController::class, 'admin'])->name('admin');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//tambah menu
Route::get('/tambah', [AuthController::class, 'tambah'])->name('tambah');
Route::post('/posttambah', [AuthController::class, 'posttambah'])->name('posttambah');

Route::get('/hapus/{produk}', [AuthController::class, 'hapus'])->name('hapus');