<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\UserController;
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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// user management
Route::get('/user/view', [UserController::class, 'index'])->name('user.view');
Route::get('/user/add', [UserController::class, 'create'])->name('user.create');
Route::post('/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

// user profile and change password
Route::get('/profile/view', [ProfileController::class, 'index'])->name('profile.view');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
// Route::get('/profile/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
// Route::post('/profile/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');

Route::prefix('setups')->group(function () {

    // Student Class Routes 
    Route::get('student/class/view', [StudentClassController::class, 'index'])->name('student.class.view');

    Route::get('student/class/add', [StudentClassController::class, 'create'])->name('student.class.add');

    Route::post('student/class/store', [StudentClassController::class, 'store'])->name('store.student.class');

    Route::get('student/class/edit/{id}', [StudentClassController::class, 'edit'])->name('student.class.edit');

    Route::post('student/class/update/{id}', [StudentClassController::class, 'update'])->name('update.student.class');

    Route::get('student/class/delete/{id}', [StudentClassController::class, 'destroy'])->name('student.class.delete');

    // Student Year Routes 

    Route::get('student/year/view', [StudentYearController::class, 'index'])->name('student.year.view');

    Route::get('student/year/add', [StudentYearController::class, 'create'])->name('student.year.add');

    Route::post('student/year/store', [StudentYearController::class, 'store'])->name('store.student.year');

    Route::get('student/year/edit/{id}', [StudentYearController::class, 'edit'])->name('student.year.edit');

    Route::post('student/year/update/{id}', [StudentYearController::class, 'update'])->name('update.student.year');

    Route::get('student/year/delete/{id}', [StudentYearController::class, 'destroy'])->name('student.year.delete');


    // // Student Group Routes 

    Route::get('student/group/view', [StudentGroupController::class, 'index'])->name('student.group.view');

    Route::get('student/group/add', [StudentGroupController::class, 'create'])->name('student.group.add');

    Route::post('student/group/store', [StudentGroupController::class, 'store'])->name('store.student.group');

    Route::get('student/group/edit/{id}', [StudentGroupController::class, 'edit'])->name('student.group.edit');

    Route::post('student/group/update/{id}', [StudentGroupController::class, 'update'])->name('update.student.group');

    Route::get('student/group/delete/{id}', [StudentGroupController::class, 'destroy'])->name('student.group.delete');

    // // Student Shift Routes 

    Route::get('student/shift/view', [StudentShiftController::class, 'index'])->name('student.shift.view');

    Route::get('student/shift/add', [StudentShiftController::class, 'create'])->name('student.shift.add');

    Route::post('student/shift/store', [StudentShiftController::class, 'store'])->name('store.student.shift');

    Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'edit'])->name('student.shift.edit');

    Route::post('student/shift/update/{id}', [StudentShiftController::class, 'update'])->name('update.student.shift');

    Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'destroy'])->name('student.shift.delete');


    // // Fee Category Routes 

    Route::get('fee/category/view', [FeeCategoryController::class, 'index'])->name('fee.category.view');

    Route::get('fee/category/add', [FeeCategoryController::class, 'create'])->name('fee.category.add');

    Route::post('fee/category/store', [FeeCategoryController::class, 'store'])->name('store.fee.category');

    Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'edit'])->name('fee.category.edit');

    Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'update'])->name('update.fee.category');

    Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'destroy'])->name('fee.category.delete');

    // // Fee Category Amount Routes 

    Route::get('fee/amount/view', [FeeAmountController::class, 'index'])->name('fee.amount.view');

    Route::get('fee/amount/add', [FeeAmountController::class, 'create'])->name('fee.amount.add');

    Route::post('fee/amount/store', [FeeAmountController::class, 'store'])->name('store.fee.amount');

    Route::get('fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'edit'])->name('fee.amount.edit');

    Route::post('fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'update'])->name('update.fee.amount');

    Route::get('fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'Details'])->name('fee.amount.details');


    // // Exam Type Routes 

    Route::get('exam/type/view', [ExamTypeController::class, 'index'])->name('exam.type.view');

    Route::get('exam/type/add', [ExamTypeController::class, 'create'])->name('exam.type.add');

    Route::post('exam/type/store', [ExamTypeController::class, 'store'])->name('store.exam.type');

    Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'edit'])->name('exam.type.edit');

    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'update'])->name('update.exam.type');

    Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'destroy'])->name('exam.type.delete');


    // // School Subject All Routes 

    // Route::get('school/subject/view', [SchoolSubjectController::class, 'ViewSubject'])->name('school.subject.view');

    // Route::get('school/subject/add', [SchoolSubjectController::class, 'SubjectAdd'])->name('school.subject.add');

    // Route::post('school/subject/store', [SchoolSubjectController::class, 'SubjectStore'])->name('store.school.subject');

    // Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'SubjectEdit'])->name('school.subject.edit');

    // Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'SubjectUpdate'])->name('update.school.subject');

    // Route::get('school/subject/delete/{id}', [SchoolSubjectController::class, 'SubjectDelete'])->name('school.subject.delete');


    // // Assign Subject Routes 

    // Route::get('assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');

    // Route::get('assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add');

    // Route::post('assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign.subject');

    // Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subject.edit');

    // Route::post('assign/subject/update/{class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign.subject');

    // Route::get('assign/subject/details/{class_id}', [AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');


    // // Designation All Routes 

    // Route::get('designation/view', [DesignationController::class, 'ViewDesignation'])->name('designation.view');

    // Route::get('designation/add', [DesignationController::class, 'DesignationAdd'])->name('designation.add');

    // Route::post('designation/store', [DesignationController::class, 'DesignationStore'])->name('store.designation');

    // Route::get('designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');

    // Route::post('designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('update.designation');

    // Route::get('designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');


});