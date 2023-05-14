<?php

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
    return view('index');
})->name('index');

Auth::routes();

Route::post('/adminloginproc', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.loginproc');
Route::get('/adminhome', [App\Http\Controllers\AdminController::class, 'adminhome'])->name('admin.home');
Route::get('/adminlogout', [App\Http\Controllers\AdminController::class, 'logout'])->name('adminlogout');
Route::get('/customerkereta', [App\Http\Controllers\AdminController::class, 'customerkereta'])->name('admin.customerkereta');
Route::get('/customermotosikal', [App\Http\Controllers\AdminController::class, 'customermotosikal'])->name('admin.customermotosikal');
Route::get('/tambahdata', [App\Http\Controllers\AdminController::class, 'tambahdata'])->name('admin.tambahdata');
Route::get('/remainder', [App\Http\Controllers\AdminController::class, 'tamattempoh'])->name('admin.tamattempoh');
Route::get('/dataxpired', [App\Http\Controllers\AdminController::class, 'dataexpired'])->name('admin.dataexpired');


Route::post('/submitcustomer', [App\Http\Controllers\CustomerController::class, 'submit'])->name('submitcust');
Route::delete('/keretadestroy/{customer}', [App\Http\Controllers\CustomerController::class, 'keretadelete'])->name('kereta.destroy');
Route::delete('/motodestroy/{customer}', [App\Http\Controllers\CustomerController::class, 'motodelete'])->name('moto.destroy');
Route::get('/editcustomer/{customer}', [App\Http\Controllers\CustomerController::class, 'editcustomer'])->name('editcustomer');
Route::post('/updatecustomer/{customer}', [App\Http\Controllers\CustomerController::class, 'updatecustomer'])->name('updatecustomer');
