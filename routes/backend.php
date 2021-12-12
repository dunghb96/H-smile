

<?php

use App\Http\Controllers\Backend\AppointmentController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\OptionController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\Backend\ServiceController;
use App\Models\Patients;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\SlideController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\PriceListController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\SettingController;

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

    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::group(['prefix' => 'setting'], function () {
        Route::get('/', [SettingController::class, 'index'])->name('admin.setting');
        Route::post('/save', [SettingController::class, 'del']);
    });

    Route::group(['prefix' => 'slide'], function () {
        Route::get('/', [SlideController::class, 'index'])->middleware('permission:show_list_slides')->name('admin.slide');
        Route::get('/json', [SlideController::class, 'json']);
        Route::post('/add', [SlideController::class, 'add']);
        Route::post('/loaddata', [SlideController::class, 'loaddata']);
        Route::post('/edit', [SlideController::class, 'edit']);
        Route::post('/del', [SlideController::class, 'del']);
    });

    Route::group(['prefix' => 'blog-category'], function () {
        Route::get('/', [BlogCategoryController::class, 'index'])->name('admin.blog_category');
        Route::get('/json', [BlogCategoryController::class, 'json']);
        Route::post('/add', [BlogCategoryController::class, 'add']);
        Route::post('/loaddata', [BlogCategoryController::class, 'loaddata']);
        Route::post('/edit', [BlogCategoryController::class, 'edit']);
        Route::post('/del', [BlogCategoryController::class, 'del']);
    });

    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', [BlogController::class, 'index'])->name('admin.blog');
        Route::get('/json', [BlogController::class, 'json']);
        Route::post('/add', [BlogController::class, 'add']);
        Route::post('/loaddata', [BlogController::class, 'loaddata']);
        Route::post('/edit', [BlogController::class, 'edit']);
        Route::post('/del', [BlogController::class, 'del']);
    });

    Route::group(['prefix' => 'service'], function () {
        Route::get('/', [ServiceController::class, 'index'])->middleware('permission:show_list_slides')->name('admin.service');
        Route::get('/json', [ServiceController::class, 'json']);
        Route::post('/add', [ServiceController::class, 'add']);
        Route::post('/loaddata', [ServiceController::class, 'loaddata']);
        Route::post('/edit', [ServiceController::class, 'edit']);
        Route::post('/del', [ServiceController::class, 'del']);

    });

    Route::group(['prefix' => 'price-list'], function () {
        Route::get('/', [PriceListController::class, 'index'])->name('admin.price_list');
        Route::get('/json', [PriceListController::class, 'json']);
        Route::post('/add', [PriceListController::class, 'add']);
        Route::post('/loaddata', [PriceListController::class, 'loaddata']);
        Route::post('/edit', [PriceListController::class, 'edit']);
        Route::post('/del', [PriceListController::class, 'del']);

    });


    Route::group(['prefix' => 'employee'], function () {
        Route::get('/', [EmployeeController::class, 'index'])->middleware('permission:show_list_slides')->name('admin.employee');
        Route::get('/json', [EmployeeController::class, 'json']);

    });

    Route::group(['prefix' => 'doctor'], function () {
        Route::get('/', [DoctorController::class, 'index'])->middleware('permission:show_list_slides')->name('admin.doctor');
        Route::get('/json', [DoctorController::class, 'json']);

    });
    Route::group(['prefix' => 'partner'], function () {
        Route::get('/', [PartnerController::class, 'index'])->middleware('permission:show_list_slides')->name('admin.partner');
        Route::get('/json', [PartnerController::class, 'json']);
        Route::post('/add', [PartnerController::class, 'add'])->name('admin.partner.add');
        Route::post('/loaddata', [PartnerController::class, 'loaddata']);
        Route::post('/edit', [PartnerController::class, 'edit']);
        Route::post('/del', [PartnerController::class, 'del']);
    });



    //Slides
    // Route::group(['prefix' => 'slide'], function () {
    //     Route::get('', [SlideController::class, 'index'])->middleware('permission:show_list_slides')->name('slide.list');


    //     Route::group(['middleware' => 'permission:add_slides'], function () {
    //         Route::get('add', [SlideController::class, 'getAdd'])->name('slide.add');
    //         Route::post('add', [SlideController::class, 'postAdd']);
    //     });

    //     Route::group(['middleware' => 'permission:edit_slides'], function () {
    //         Route::get('edit/{id}', [SlideController::class, 'getEdit'])->name('slide.edit');
    //         Route::post('edit/{id}', [SlideController::class, 'postEdit']);
    //     });

    //         Route::post('delete', [SlideController::class, 'delete'])->middleware('permission:delete_slides')->name('slide.delete');

    // });


    //Slides
    // Route::group(['prefix' => 'news'], function () {
    //     Route::get('', [NewsController::class, 'index'])->middleware('permission:show_list_news')->name('news.list');


    //     Route::group(['middleware' => 'permission:add_news'], function () {
    //         Route::get('add', [NewsController::class, 'getAdd'])->name('news.add');
    //         Route::post('add', [NewsController::class, 'postAdd']);
    //     });

    //     Route::group(['middleware' => 'permission:edit_news'], function () {
    //         Route::get('edit/{id}', [NewsController::class, 'getEdit'])->name('news.edit');
    //         Route::post('edit/{id}', [NewsController::class, 'postEdit']);
    //     });

    //     Route::post('delete', [NewsController::class, 'delete'])->middleware('permission:delete_news')->name('news.delete');

    // });


    // //Settings
    // Route::group(['prefix' => 'setting'], function () {
    //     //options
    //     Route::group(['prefix' => 'option'], function () {
    //         Route::group(['middleware' => 'permission:setting_website'], function () {
    //             Route::get('/', [OptionController::class, 'showForm'])->name('setting.option');
    //             Route::post('/', [OptionController::class, 'saveForm']);
    //         });
    //     });
    // });


    //User
    // Route::group(['prefix' => 'user'], function () {
    //     Route::get('list', [UserController::class, 'getList'])->middleware('permission:show_list_users')->name('user.list');

    //     Route::group(['middleware' => 'permission:add_users'], function () {
    //         Route::get('add', [UserController::class, 'getAdd'])->name('user.add');
    //         Route::post('add', [UserController::class, 'postAdd']);
    //     });

    //     Route::group(['middleware' => 'permission:edit_users'], function () {
    //         Route::get('edit/{id}', [UserController::class, 'getEdit'])->name('user.edit');
    //         Route::post('edit/{id}', [UserController::class, 'postEdit']);
    //         Route::post('change-status', [UserController::class, 'changeStatus'])->name('user.change_status');
    //     });

    //     Route::get('edit_profile', [UserController::class, 'getEditProfile'])->name('user.edit_profile');
    //     Route::post('edit_profile', [UserController::class, 'postEditProfile']);
    //     Route::post('delete', [UserController::class, 'delete'])->middleware('permission:delete_users')->name('user.delete');
    // });

    // //Roles
    // Route::group(['prefix' => 'role'], function () {
    //     Route::get('list', [RoleController::class, 'index'])->middleware('permission:role_show_list')->name('role.list');

    //     Route::group(['middleware' => 'permission:role_add'], function () {
    //         Route::get('add', [RoleController::class, 'showFormAdd'])->name('role.add');
    //         Route::post('add', [RoleController::class, 'postFormAdd']);
    //     });

    //     Route::group(['middleware' => 'permission:role_edit'], function () {
    //         Route::get('edit/{id}', [RoleController::class, 'showFormEdit'])->name('role.edit');
    //         Route::post('edit/{id}', [RoleController::class, 'postFormEdit']);
    //     });

    //     Route::post('delete', [RoleController::class, 'delete'])->middleware('permission:role_delete')->name('role.delete');
    // });

    // Route::prefix('post')->group(function () {
    //     Route::get('/', [PostController::class, 'index'])->name('post.list');
    //     Route::get('add-new', [PostController::class, 'create'])->name('post.add');
    //     Route::post('add-new', [PostController::class, 'store']);
    //     Route::get('detail/{id}', [PostController::class, 'get'])->name('post.detail');
    //     Route::get('edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    //     Route::post('edit/{id}', [PostController::class, 'save']);
    //     Route::get('delete', [PostController::class, 'remove'])->name('post.delete');
    // });

    // Route::prefix('contact')->group(function () {
    //     Route::get('/', [PostController::class, 'index'])->name('contact.list');
    //     Route::get('add-new', [PostController::class, 'create'])->name('contact.add');
    //     Route::post('add-new', [PostController::class, 'store']);
    //     Route::get('edit/{id}', [PostController::class, 'edit'])->name('contact.edit');
    //     Route::post('edit/{id}', [PostController::class, 'save']);
    //     Route::get('delete', [PostController::class, 'remove'])->name('contact.delete');
    // });
    // Route::prefix('patient')->group(function () {
    //     Route::get('/', [PatientController::class, 'index'])->name('patient.list');
    //     Route::get('add-new', [PostController::class, 'create'])->name('contact.add');
    //     Route::post('add-new', [PostController::class, 'store']);
    //     Route::get('edit/{id}', [PostController::class, 'edit'])->name('contact.edit');
    //     Route::post('edit/{id}', [PostController::class, 'save']);
    //     Route::get('delete', [PostController::class, 'remove'])->name('contact.delete');
    // });

    // Route::prefix('service')->group(function () {
    //     Route::get('/', [ServiceController::class, 'index'])->name('service.index');
    //     Route::get('addService', [ServiceController::class, 'create'])->name('service.add');
    //     Route::post('addService', [ServiceController::class, 'store']);
    //     Route::get('editService/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    //     Route::post('editService/{id}', [ServiceController::class, 'update']);
    //     Route::get('deleteService/{id}', [ServiceController::class, 'Delete'])->name('service.delete');
    // });
    // Route::prefix('appointment')->group(function () {
    //     Route::get('/', [AppointmentController::class, 'index'])->name('appointment.index');
    //     // Route::get('addService', [ServiceController::class, 'create'])->name('service.add');
    //     // Route::post('addService', [ServiceController::class, 'store']);
    //     // Route::get('editService/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    //     // Route::post('editService/{id}', [ServiceController::class, 'update']);
    //     // Route::get('deleteService/{id}', [ServiceController::class, 'Delete'])->name('service.delete');
    // });
})

?>
