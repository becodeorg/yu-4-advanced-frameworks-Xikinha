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

Route::post('/api', [PlaylistController::class, 'index'])->name('api');

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
Route::get('/playlist', [DashboardController::class, 'showPlaylist'])->name('playlist');

Route::get('/login', [LoginController::class, 'show'])->name('login')->middleware('guest');
Route::post('/loginSubmit', [LoginController::class, 'store'])->name('loginSubmit');

Route::get('/logout', [LogoutController::class, 'perform'])->name('logout')->middleware('auth');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/registerSubmit', [RegisterController::class, 'store'])->name('registerSubmit');