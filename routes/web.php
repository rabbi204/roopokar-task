<?php

use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeEducationController;
use App\Http\Controllers\EmployeeExperienceController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
   $all_employee =  Employee::all();

//    $all_employee = DB::table('employees')
//                 ->join('employee_education','employees.id','employee_education.employee_id')
//                 ->join('employee_experiences','employees.id','employee_experiences.employee_id')
//                 ->select('employee_education.instituation', 'employee_experiences.organization','employees.*')
//                 ->orderBy('employees.id','DESC')->get();


    return view('backend.index',compact('all_employee'));
})->name('dashboard');

Route::get('employee/profile/{id}',[EmployeeController::class,'employeeProfile']) -> name('employee.profile');





/** all employee route */
Route::get('employee/index',[EmployeeController::class,'index']) -> name('employee.index');

Route::post('employee-store',[EmployeeController::class,'store']);

Route::get('employee-all',[EmployeeController::class,'allEmployee']);
Route::get('employee-edit/{id}',[EmployeeController::class,'employeeEdit']);
Route::post('employee-update/{id}',[EmployeeController::class,'employeeUpdate']);
Route::get('employee-delete/{id}',[EmployeeController::class,'employeeDelete']);


/** all employee education route */
Route::get('employee-education/index',[EmployeeEducationController::class,'index']) -> name('employee.education.index');
Route::post('emp-education-store',[EmployeeEducationController::class,'employeeEducationStore']);
Route::get('emp-education-all',[EmployeeEducationController::class,'allEmployeeEducation']);
Route::get('emp-education-edit/{id}',[EmployeeEducationController::class,'employeeEducationEdit']);
Route::post('emp-education-update/{id}',[EmployeeEducationController::class,'employeeEducationUpdate']);
Route::get('emp-education-delete/{id}',[EmployeeEducationController::class,'employeeEducationDelete']);

/** all employee experience route */
Route::get('employee-experience/index',[EmployeeExperienceController::class,'index']) -> name('employee.experience.index');
Route::post('emp-experience-store',[EmployeeExperienceController::class,'employeeExperinceStore']);
Route::get('emp-experience-all',[EmployeeExperienceController::class,'allEmployeeExperience']);
Route::get('emp-experience-edit/{id}',[EmployeeExperienceController::class,'employeeExperienceEdit']);
Route::post('emp-experience-update/{id}',[EmployeeExperienceController::class,'employeeExperienceUpdate']);
Route::get('emp-experience-delete/{id}',[EmployeeExperienceController::class,'employeeExperienceDelete']);
