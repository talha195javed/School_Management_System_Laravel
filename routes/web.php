<?php

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

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DiaryExpensesController;
use App\Http\Controllers\FeeSubmittedDetailController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StationaryChargeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\WebPageController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return redirect('/login');
//});

Route::get('/', [WebPageController::class, 'website']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/profile/edit', 'HomeController@profileEdit')->name('profile.edit');
Route::put('/profile/update', 'HomeController@profileUpdate')->name('profile.update');
Route::get('/profile/changepassword', 'HomeController@changePasswordForm')->name('profile.change.password');
Route::post('/profile/changepassword', 'HomeController@changePassword')->name('profile.changepassword');

Route::group(['middleware' => ['auth','role:Admin']], function ()
{
    Route::get('/roles-permissions', 'RolePermissionController@roles')->name('roles-permissions');
    Route::get('/role-create', 'RolePermissionController@createRole')->name('role.create');
    Route::post('/role-store', 'RolePermissionController@storeRole')->name('role.store');
    Route::get('/role-edit/{id}', 'RolePermissionController@editRole')->name('role.edit');
    Route::put('/role-update/{id}', 'RolePermissionController@updateRole')->name('role.update');

    Route::get('/permission-create', 'RolePermissionController@createPermission')->name('permission.create');
    Route::post('/permission-store', 'RolePermissionController@storePermission')->name('permission.store');
    Route::get('/permission-edit/{id}', 'RolePermissionController@editPermission')->name('permission.edit');
    Route::put('/permission-update/{id}', 'RolePermissionController@updatePermission')->name('permission.update');

    Route::get('assign-subject-to-class/{id}', 'GradeController@assignSubject')->name('class.assign.subject');
    Route::post('assign-subject-to-class/{id}', 'GradeController@storeAssignedSubject')->name('store.class.assign.subject');

    Route::resource('assignrole', 'RoleAssign');
    Route::resource('classes', 'GradeController');
    Route::resource('subject', 'SubjectController');
    Route::resource('teacher', 'TeacherController');
    Route::resource('parents', 'ParentsController');
    Route::resource('student', 'StudentController');
    Route::get('attendance', 'AttendanceController@index')->name('attendance.index');

});

Route::group(['middleware' => ['auth','role:Teacher']], function ()
{
    Route::post('attendance', 'AttendanceController@store')->name('teacher.attendance.store');
    Route::get('attendance-create/{classid}', 'AttendanceController@createByTeacher')->name('teacher.attendance.create');
});

Route::group(['middleware' => ['auth','role:Parent']], function ()
{
    Route::get('attendance/{attendance}', 'AttendanceController@show')->name('attendance.show');
});

Route::group(['middleware' => ['auth','role:Student']], function () {

});


Route::get('/day-book-index', [DiaryExpensesController::class, 'index'])->name('dayBook.index');
Route::get('/day-book-create', [DiaryExpensesController::class, 'create'])->name('dayBook.create');
Route::post('/day-book-store', [DiaryExpensesController::class, 'store'])->name('dayBook.store');
Route::get('/day-book-edit/{id}', [DiaryExpensesController::class, 'edit'])->name('dayBook.edit');
Route::post('/day-book-update', [DiaryExpensesController::class, 'update'])->name('dayBook.update');
Route::delete('/day-book-delete/{id}', [DiaryExpensesController::class, 'destroy'])->name('dayBook.destroy');


Route::get('/fee-submitted-create/{student_id}', [FeeSubmittedDetailController::class, 'create'])->name('fee.creates');

Route::get('/pay-submitted-create/{teacher_id}', [FeeSubmittedDetailController::class, 'pay_create'])->name('pay.creates');

Route::get('/attends/{class_id}', [GradeController::class, 'attends'])->name('classes.attends');

Route::get('/teacher_attends', [TeacherController::class, 'attends'])->name('teacher.attends');

Route::get('/attends_view/{class_id}', [GradeController::class, 'attends_view'])->name('classes.attends_view');

Route::get('image-upload', [ GradeController::class, 'imageUpload' ])->name('image.upload');
Route::post('image-upload', [ GradeController::class, 'imageUploadPost' ])->name('image.upload.post');



Route::post('students/attends/save', [AttendanceController::class, 'store'])->name('attendance.save');

Route::post('teachers/attends/save', [AttendanceController::class, 'teacher_store'])->name('teacher_attendance.save');

Route::post('/fee-submitted-details', [FeeSubmittedDetailController::class, 'store'])->name('fee.store');

Route::post('/pay-submitted-details', [FeeSubmittedDetailController::class, 'paystore'])->name('pay.store');

Route::put('/fee-submitted-details/{feeSubmittedDetail}', [FeeSubmittedDetailController::class, 'edit']);

Route::get('/stationary-charges/{student_id}', [StationaryChargeController::class, 'create'])->name('stationary.creates');
Route::put('/stationary-charges/{stationaryCharge}', [StationaryChargeController::class, 'edit']);

Route::post('/stationary-charges-details', [StationaryChargeController::class, 'store'])->name('stationary.store');
