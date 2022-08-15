<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'show'])->name('home');

Route::post('/discover', [DashboardController::class, 'search'])->name('search');

Route::get('/discover', [DashboardController::class, 'showRandom'])->name('dashboard');
Route::post('/discoverSubmit', [DashboardController::class, 'storeTrack'])->name('storeTrack');

Route::get('/playlist', [PlaylistController::class, 'index'])->name('playlist');
Route::get('/show', [PlaylistController::class, 'show'])->name('show');
Route::get('/delete', [PlaylistController::class, 'softDelete'])->name('delete');

Route::get('/addNotes', [PlaylistController::class, 'edit'])->name('edit');
Route::post('/addNotes', [PlaylistController::class, 'storeNotes'])->name('storeNotes');

Route::get('/login', [LoginController::class, 'show'])->name('login')->middleware('guest');
Route::post('/loginSubmit', [LoginController::class, 'store'])->name('loginSubmit');

Route::get('/logout', [LogoutController::class, 'perform'])->name('logout')->middleware('auth');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/registerSubmit', [RegisterController::class, 'store'])->name('registerSubmit');