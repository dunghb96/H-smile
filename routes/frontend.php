<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\AppointmentController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DoctorController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PriceListController;
use App\Http\Controllers\Frontend\ServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\OrderController;
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
Route::get('/doctors', [DoctorController::class, 'index'])->name('hsmile.doctors');

Route::get('/price-list', [PriceListController::class, 'index'])->name('hsmile.price_list');
Route::get('/contact', [ContactController::class, 'index'])->name('hsmile.contact');
Route::post('/contact-post', [ContactController::class, 'post'])->name('hsmile.contact.post');
Route::get('/history', [HomeController::class, 'history'])->name('hsmile.history');
Route::get('/search', [HomeController::class, 'search'])->name('hsmile.search');

Route::group(['prefix' => 'service'], function () {
    Route::get('/', [ServiceController::class, 'index'])->name('hsmile.services');
    Route::get('/{id}', [ServiceController::class, 'get'])->name('hsmile.service.detail');
});
Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('hsmile.blog');
    Route::get('/{id}', [BlogController::class, 'get'])->name('hsmile.blog.detail');
});

Route::group(['prefix' => 'appointment'], function () {
    Route::get('/', [AppointmentController::class, 'index'])->name('hsmile.appointment');
    Route::post('/', [AppointmentController::class, 'booking'])->name('hsmile.booking');
    Route::post('/get-doctor', [AppointmentController::class, 'getDoctor']);
});

Route::group(['prefix' => 'order'], function () {
    Route::get('/{id}', [OrderController::class, 'detail'])->name('hsmile.order.detail');
});


Route::get('/payOrder/{id}', [OrderController::class, 'payOrder'])->name('hsmile.order.payOrder');

Route::get('/banksuccess', [OrderController::class, 'bankSuccess'])->name("hsmile.order.bankSuccess");





Route::post('send-sms-notification', [AppointmentController::class, 'sendSmsNotificaition'])->name("send-sms-notification");
// không có frontend/ đâu
