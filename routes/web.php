<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeController;
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
Route::resource('/company', CompanyController::class);
Route::get('/search', [CompanyController::class,'search'])->name('search');
Route::get('/export-company', [CompanyController::class,'export'])->name('export-company');
Route::resource('/employe', EmployeController::class);
Route::get('/search-employe', [EmployeController::class,'search'])->name('search-employe');
Route::get('/export-empoye', [EmployeController::class,'export'])->name('export-employe');