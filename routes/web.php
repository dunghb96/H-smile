<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\showController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\PatientController;
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

Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::get('/send-mail', [HomeController::class, 'mail'])->name('mail.sendMail');
