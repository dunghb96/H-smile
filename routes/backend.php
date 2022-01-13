

<?php

use App\Http\Controllers\Backend\AppointmentController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\FeedbackController;
use App\Http\Controllers\Backend\ExaminationScheduleController;
use App\Http\Controllers\Backend\MedicineController;
use App\Http\Controllers\Backend\OptionController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ServiceController;
use App\Models\Patients;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\SlideController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\PriceListController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\PatientController;
use App\Http\Controllers\Backend\ServiceCategoryController;
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


    Route::group(['prefix' => 'doctor'], function () {
        Route::get('/', [DoctorController::class, 'index'])->middleware('permission:list_doctors')->name('admin.doctor');
        Route::get('/json', [DoctorController::class, 'json']);
        Route::get('/today', [DashboardController::class, 'today'])->middleware('permission:my_schedules')->name('admin.today');
        Route::get('/today/json', [DashboardController::class, 'today_json']);
        Route::get('/future', [DashboardController::class, 'future'])->middleware('permission:my_schedules')->name('admin.future');
        Route::get('/future/json', [DashboardController::class, 'future_json']);
        Route::get('/past', [DashboardController::class, 'past'])->name('admin.past');
        Route::get('/past/json', [DashboardController::class, 'past_json']);
        Route::post('/today/addnote', [DashboardController::class, 'addnote']);
    });

    Route::group(['prefix' => 'setting', 'middleware' => ['permission:website_settings']], function () {
        Route::get('/', [SettingController::class, 'index'])->name('admin.setting');
        Route::post('/saveForm', [SettingController::class, 'saveForm']);
        Route::post('/thaylogo', [SettingController::class, 'thaylogo']);
        Route::post('/thayfavicon', [SettingController::class, 'thayfavicon']);
        Route::post('/thaylogofooter', [SettingController::class, 'thaylogofooter']);
    });

    Route::group(['prefix' => 'slide'], function () {
        Route::get('/', [SlideController::class, 'index'])->middleware('permission:list_slides')->name('admin.slide');
        Route::get('/json', [SlideController::class, 'json']);
        Route::post('/add', [SlideController::class, 'add'])->middleware('permission:add_slides');
        Route::post('/loaddata', [SlideController::class, 'loaddata']);
        Route::post('/edit', [SlideController::class, 'edit'])->middleware('permission:edit_slides');
        Route::post('/del', [SlideController::class, 'del'])->middleware('permission:delete_slides');
    });

    Route::group(['prefix' => 'blog-category', 'middleware' => ['permission:list_blogs']], function () {
        Route::get('/', [BlogCategoryController::class, 'index'])->name('admin.blog_category');
        Route::get('/json', [BlogCategoryController::class, 'json']);
        Route::post('/add', [BlogCategoryController::class, 'add']);
        Route::post('/loaddata', [BlogCategoryController::class, 'loaddata']);
        Route::post('/edit', [BlogCategoryController::class, 'edit']);
        Route::post('/del', [BlogCategoryController::class, 'del']);
    });

    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', [BlogController::class, 'index'])->middleware('permission:list_blogs')->name('admin.blog');
        Route::get('/json', [BlogController::class, 'json']);
        Route::post('/add', [BlogController::class, 'add']);
        Route::post('/loaddata', [BlogController::class, 'loaddata']);
        Route::post('/edit', [BlogController::class, 'edit']);
        Route::post('/del', [BlogController::class, 'del']);
    });

    Route::group(['prefix' => 'medicine'], function () {
        Route::get('/', [MedicineController::class, 'index'])->middleware('permission:list_services')->name('admin.medicine');
        Route::get('/json', [MedicineController::class, 'json']);
        Route::post('/add', [MedicineController::class, 'add']);
        Route::post('/loaddata', [MedicineController::class, 'loaddata']);
        Route::post('/edit', [MedicineController::class, 'edit']);
        Route::post('/del', [MedicineController::class, 'del']);
    });

    Route::group(['prefix' => 'service'], function () {
        Route::get('/', [ServiceController::class, 'index'])->middleware('permission:list_services')->name('admin.service');
        Route::get('/json', [ServiceController::class, 'json']);
        Route::post('/add', [ServiceController::class, 'add']);
        Route::post('/loaddata', [ServiceController::class, 'loaddata']);
        Route::post('/edit', [ServiceController::class, 'edit']);
        Route::post('/del', [ServiceController::class, 'del']);
    });

    Route::group(['prefix' => 'service-category'], function () {
        Route::get('/', [ServiceCategoryController::class, 'index'])->middleware('permission:list_service_category')->name('admin.service_category');
        Route::get('/json', [ServiceCategoryController::class, 'json']);
        Route::post('/add', [ServiceCategoryController::class, 'add']);
        Route::post('/loaddata', [ServiceCategoryController::class, 'loaddata']);
        Route::post('/edit', [ServiceCategoryController::class, 'edit']);
        Route::post('/del', [ServiceCategoryController::class, 'del']);
    });

    Route::group(['prefix' => 'price-list'], function () {
        Route::get('/', [PriceListController::class, 'index'])->name('admin.price_list');
        Route::get('/json', [PriceListController::class, 'json']);
        Route::post('/add', [PriceListController::class, 'add']);
        Route::post('/loaddata', [PriceListController::class, 'loaddata']);
        Route::post('/edit', [PriceListController::class, 'edit']);
        Route::post('/del', [PriceListController::class, 'del']);

    });

    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', [ContactController::class, 'index'])->middleware('permission:list_contacts')->name('admin.contact');
        Route::get('/json', [ContactController::class, 'json']);
        Route::post('/reply', [ContactController::class, 'add'])->name('admin.partner.add');
        Route::post('/loaddata', [ContactController::class, 'loaddata']);
        Route::post('/del', [ContactController::class, 'del']);
    });

    Route::group(['prefix' => 'partner'], function () {
        Route::get('/', [PartnerController::class, 'index'])->middleware('permission:list_partners')->name('admin.partner');
        Route::get('/json', [PartnerController::class, 'json']);
        Route::post('/add', [PartnerController::class, 'add'])->name('admin.partner.add');
        Route::post('/loaddata', [PartnerController::class, 'loaddata']);
        Route::post('/edit', [PartnerController::class, 'edit']);
        Route::post('/del', [PartnerController::class, 'del']);
    });

    Route::group(['prefix' => 'appointment'], function () {
        Route::get('/', [AppointmentController::class, 'index'])->middleware('permission:list_appointments')->name('admin.appointment');
        Route::get('/json', [AppointmentController::class, 'json']);
        Route::post('/duyet', [AppointmentController::class, 'duyet']);
        Route::post('/get-doctor', [AppointmentController::class, 'getDoctor']);
        Route::post('/add-schedule', [AppointmentController::class, 'addSchedule']);
        // Route::post('/add', [AppointmentController::class, 'add']);
        Route::post('/loaddata', [AppointmentController::class, 'loaddata']);
        // Route::post('/edit', [AppointmentController::class, 'edit']);
        Route::post('/save', [AppointmentController::class, 'save']);
        Route::post('/del', [AppointmentController::class, 'del']);
    });

    Route::group(['prefix' => 'examination-schedule'], function () {
        Route::get('/', [ExaminationScheduleController::class, 'index'])->middleware('permission:list_schedules')->name('admin.examination_schedule');
        Route::post('/json', [ExaminationScheduleController::class, 'json']);
        Route::post('/hoanthanh', [ExaminationScheduleController::class, 'hoanthanh']);
        Route::post('/hentiep', [ExaminationScheduleController::class, 'hentiep']);
        Route::post('/get-doctor', [ExaminationScheduleController::class, 'getDoctor']);
        Route::post('/henlai', [ExaminationScheduleController::class, 'henlai']);
        Route::post('/changeTime', [ExaminationScheduleController::class, 'changeTime']);
        Route::post('/xeplich', [ExaminationScheduleController::class, 'xeplich']);
        Route::post('/loaddata', [ExaminationScheduleController::class, 'loaddata']);
        Route::post('/saveExamSchedule', [ExaminationScheduleController::class, 'saveExamSchedule']);
        Route::post('/del', [ExaminationScheduleController::class, 'del']);
    });

    Route::group(['prefix' => 'patient'], function () {
        Route::get('/', [PatientController::class, 'index'])->middleware('permission:list_patients')->name('admin.patient');
        Route::get('/json', [PatientController::class, 'json']);
        Route::post('/loaddata', [PatientController::class, 'loaddata']);
        Route::get('/loadhistory', [PatientController::class, 'loadhistory']);
    });

    Route::group(['prefix' => 'employee'], function () {
        Route::get('/', [EmployeeController::class, 'index'])->middleware('permission:list_employees')->name('admin.employee');
        Route::get('/json', [EmployeeController::class, 'json']);
        Route::post('/add', [EmployeeController::class, 'add']);
        Route::post('/loaddata', [EmployeeController::class, 'loaddata']);
        Route::post('/edit', [EmployeeController::class, 'edit']);
        Route::post('/del', [EmployeeController::class, 'del']);
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/accountsettings', [UserController::class, 'accountsettings'])->name('admin.accountsettings');
        Route::post('/edit', [UserController::class, 'edit']);
        Route::post('/changePassword',[UserController::class, 'changePassword'])->name('changePasswordPost');
        Route::post('/thayanh', [UserController::class, 'thayanh']);
        Route::post('/xoaanh', [UserController::class, 'xoaanh']);

    });

    Route::group(['prefix' => 'feedback'], function () {
        Route::get('/', [FeedbackController::class, 'index'])->middleware('permission:list_feedbacks')->name('admin.feedback');
        Route::get('/json', [FeedbackController::class, 'json']);
        Route::post('/add', [FeedbackController::class, 'add']);
        Route::post('/loaddata', [FeedbackController::class, 'loaddata']);
        Route::post('/edit', [FeedbackController::class, 'edit']);
        Route::post('/del', [FeedbackController::class, 'del']);
    });

    Route::group(['prefix' => 'role'], function () {
        Route::get('/', [RoleController::class, 'index'])->middleware('permission:list_roles')->name('admin.role');
        Route::get('/json', [RoleController::class, 'json']);
        Route::post('/save', [RoleController::class, 'save']);
        Route::post('/loaddata', [RoleController::class, 'loaddata']);
        Route::post('/saveedit', [RoleController::class, 'saveedit']);
        Route::post('/del', [RoleController::class, 'del']);
    });

    Route::group(['prefix' => 'booking'], function () {
        Route::get('/', [BookingController::class, 'index'])->name('admin.list_booking');
        Route::post('/json', [BookingController::class, 'json']);
        Route::post('/save', [RoleController::class, 'save']);
        Route::post('/loaddata', [RoleController::class, 'loaddata']);
        Route::post('/saveedit', [RoleController::class, 'saveedit']);
        Route::post('/del', [RoleController::class, 'del']);
    });

})

?>
