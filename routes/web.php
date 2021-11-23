<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('frontend.home.index');
});
Route::get('/doctor',function(){ return view('frontend.doctor.list_doctor'); });
Route::get('/about',function(){ return view('frontend.about.index'); });
Route::get('/blog',function(){ return view('frontend.blog.list_blog'); });
Route::get('/contact',function(){ return view('frontend.contact.index'); });
Route::get('/service',function(){ return view('frontend.service.list_service'); });
Route::get('/price',function(){ return view('frontend.price.index'); });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('hsmile.home');


Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
