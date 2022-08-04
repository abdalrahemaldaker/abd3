<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AttendanceController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\ExamController;
use App\Http\Controllers\admin\ExamResultController;
use App\Http\Controllers\admin\ExamTypeController;
use App\Http\Controllers\admin\SclassController;
use App\Http\Controllers\admin\SclassmanageController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\YearController as AdminYearController;
use App\Http\Controllers\admin\StageController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\SubjectController;
use App\Http\Controllers\admin\TeacherController;
use App\Models\Attendance;
use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\Sclass;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin', [AdminController::class, 'dashboard']);
// Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);



Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::resource('admin/users',UserController::class);


    Route::group(['as' => 'admin.' , 'prefix' => 'admin' , 'middleware' => 'auth'] ,function(){

        Route::get('/', [AdminController::class, 'dashboard']);
        Route::get('/dashboard', [AdminController::class, 'dashboard']);
        Route::resource('users',UserController::class);
        // ->except('show')
        Route::resource('years',AdminYearController::class)->except('show');
        Route::resource('stages', StageController::class);
        Route::resource('subjects', SubjectController::class);
        Route::resource('students', StudentController::class);
        Route::resource('teachers', TeacherController::class);
        Route::resource('sclasses', SclassController::class);
        Route::resource('exam-types', ExamTypeController::class);
        Route::get('sclasses/manage/{sclass}', [SclassmanageController::class , 'manage'])->name('sclasses.manage');
        Route::post('sclasses/{Sclass}/fill', [SclassmanageController::class,'fill'])->name('sclasses.fill');
        Route::delete('sclasses/manage/{sclass}', [SclassmanageController::class ,'destroy'] )->name('student.detach');
        Route::resource('/sclasses/{sclass}/courses', CourseController::class);
        Route::get('/attendances', [AttendanceController::class , 'index'])->name('attendances.index');
        Route::get('/attendances/{sclass}/edit', [AttendanceController::class , 'edit'])->name('attendances.edit');
        Route::post('/attendances/{sclass}/{date}', [AttendanceController::class , 'update'])->name('attendances.update');
        Route::resource('exams', ExamController::class);
        // Route::resource('exam-results', ExamResultController::class);
        Route::get('/exam-results', [ExamResultController::class , 'index'])->name('exam-results.index');
        Route::get('/exam-results/{sclass}/edit', [ExamResultController::class , 'edit'])->name('exam-results.edit');
        Route::post('/exam-results/{sclass}/{date}', [ExamResultController::class , 'update'])->name('exam-results.update');
        // Route::resource('{sclass}/attendances', AttendanceController::class)->except('index');

        // Route::get('/attendances/{sclass}/edit',[AttendanceController::class , 'fill'])->name('attendances.fill');
        // Route::POST('/attendances',[AttendanceController::class , 'save'])->name('attendances.save');

    });

    Route::get('/test2', function () {
        return view('test');
    });

    // Route::view('/test', 'test');
    Route::get('/sclasses/autocomplete-search', [SclassmanageController::class, 'autocompleteSearch'])->name('/sclasses.autocomplete-search');
    // Route::resource('stages', StageController::class);
});


