<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\OptionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Settings
    Route::group(['prefix' => 'setting'], function () {
        //options
        Route::group(['prefix' => 'option'], function () {
            Route::group(['middleware' => 'permission:setting_website'], function () {
                Route::get('/', [OptionController::class, 'showForm'])->name('setting.option');
                Route::post('/', [OptionController::class, 'saveForm']);
            });
        });
    });


    //User
    Route::group(['prefix' => 'user'], function () {
        Route::get('list', [UserController::class, 'getList'])->middleware('permission:show_list_users')->name('user.list');

        Route::group(['middleware' => 'permission:add_users'], function () {
            Route::get('add', [UserController::class, 'getAdd'])->name('user.add');
            Route::post('add', [UserController::class, 'postAdd']);
        });

        Route::group(['middleware' => 'permission:edit_users'], function () {
            Route::get('edit/{id}', [UserController::class, 'getEdit'])->name('user.edit');
            Route::post('edit/{id}', [UserController::class, 'postEdit']);
            Route::post('change-status', [UserController::class, 'changeStatus'])->name('user.change_status');
        });

        Route::get('edit_profile', [UserController::class, 'getEditProfile'])->name('user.edit_profile');
        Route::post('edit_profile', [UserController::class, 'postEditProfile']);
        Route::post('delete', [UserController::class, 'delete'])->middleware('permission:delete_users')->name('user.delete');
    });

    //Roles
    Route::group(['prefix' => 'role'], function () {
        Route::get('list', [RoleController::class, 'index'])->middleware('permission:role_show_list')->name('role.list');

        Route::group(['middleware' => 'permission:role_add'], function () {
            Route::get('add', [RoleController::class, 'showFormAdd'])->name('role.add');
            Route::post('add', [RoleController::class, 'postFormAdd']);
        });

        Route::group(['middleware' => 'permission:role_edit'], function () {
            Route::get('edit/{id}', [RoleController::class, 'showFormEdit'])->name('role.edit');
            Route::post('edit/{id}', [RoleController::class, 'postFormEdit']);
        });

        Route::post('delete', [RoleController::class, 'delete'])->middleware('permission:role_delete')->name('role.delete');
    });
    Route::group(['prefix' => 'doctor'], function () {
        Route::get('/', [DoctorController::class, 'index'])->name('doctor.list');
    });

})

?>
