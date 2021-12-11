<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ApppointmentController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DoctorController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PriceListController;
use App\Http\Controllers\Frontend\ServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('hsmile.home');
Route::get('/aboutus', [AboutController::class, 'index'])->name('hsmile.aboutus');
Route::get('/services', [ServiceController::class, 'index'])->name('hsmile.services');
Route::get('/doctors', [DoctorController::class, 'index'])->name('hsmile.doctors');
Route::get('/blog', [BlogController::class, 'index'])->name('hsmile.blog');
Route::get('/price-list', [PriceListController::class, 'index'])->name('hsmile.price_list');
Route::get('/contact', [ContactController::class, 'index'])->name('hsmile.contact');
Route::get('/apppointment', [ApppointmentController::class, 'index'])->name('hsmile.apppointment');
Route::post('/apppointment', [ApppointmentController::class, 'booking'])->name('hsmile.booking');