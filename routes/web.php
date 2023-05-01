<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropdownController;


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

Route::get('add', [EmployeeController::class,'index']);
Route::post('store', [EmployeeController::class,'store'])->name('store');
Route::get('edit/{employee}', [EmployeeController::class, 'edit'])->name('edit');
Route::post('delete/{employee}', [EmployeeController::class, 'delete'])->name('delete');
Route::post('update/{employee}', [EmployeeController::class,'update'])->name('update');

Route::get('dependent-dropdown', [DropdownController::class, 'index']);
Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity']);
