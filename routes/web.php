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
    return view('pages.home');
})->name('index');

Route::resource('employee', EmployeeController::class);
Route::get('/trash', [EmployeeController::class, 'trash'])->name('trash');
Route::get('/restore/{id}', [EmployeeController::class, 'restore'])->name('restore');
Route::get('/restore', [EmployeeController::class, 'restoreAll'])->name('restore-all');
Route::get('/force/{id}', [EmployeeController::class, 'force'])->name('force');
Route::get('/force', [EmployeeController::class, 'forceAll'])->name('force-all');
