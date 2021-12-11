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


Route::get('/doctor', function () {
    return view('frontend.doctor.list_doctor');
})->name('doctor.list');
Route::get('/about', function () {
    return view('frontend.about.index');
})->name('about');
Route::get('/blog', function () {
    return view('frontend.blog.list_blog');
})->name('blog.list');
Route::get('/contact', function () {
    return view('frontend.contact.index');
})->name('contact');
// Route::get('/service', function () {
//     return view('frontend.service.list_service');
// })->name('service.list');
Route::get('/price', [HomeController::class, 'price'])->name('price.list');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('hsmile.home');
Route::get('/service', [showController::class, 'index'])->name('service.list');
Route::get('/', [HomeController::class, 'service'])->name('home');
Route::get('/form-booking', [HomeController::class, 'form'])->name('form');
// Route::post('/form-booking', [HomeController::class, 'postData']);

Route::post('form-post', [BookingController::class, 'postData'])->name('postData');

Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
