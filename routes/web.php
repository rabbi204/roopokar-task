<?php

use App\Http\Controllers\EmployeeController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('backend.index');
})->name('dashboard');

Route::get('employee/index',[EmployeeController::class,'index']) -> name('employee.index');

Route::post('employee-store',[EmployeeController::class,'store']);

Route::get('employee-all',[EmployeeController::class,'allEmployee']);
Route::get('employee-edit/{id}',[EmployeeController::class,'employeeEdit']);
Route::post('employee-update/{id}',[EmployeeController::class,'employeeUpdate']);
Route::get('employee-delete/{id}',[EmployeeController::class,'employeeDelete']);

// Route::get('employee/view',[EmployeeController::class,'view']) -> name('employee.view');
