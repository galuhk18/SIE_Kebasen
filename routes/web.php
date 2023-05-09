<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [HomeController::class,'index'])->name('index');
Route::get('/',[AdminController::class,'index'])->name('admin.index');

// Facility
Route::prefix('facility')->group(function () {
    Route::get('/', [AdminController::class,'facility_index'])->name('facility.index');
    Route::get('/create', [AdminController::class,'facility_create'])->name('facility.create');
    Route::post('/create', [AdminController::class,'facility_store'])->name('facility.store');
    Route::get('/edit/{id}', [AdminController::class,'facility_edit'])->name('facility.edit');
    Route::put('/edit/{id}', [AdminController::class,'facility_update'])->name('facility.update');
    Route::get('/destroy/{id}', [AdminController::class,'facility_destroy'])->name('facility.destroy');
});
// User admin
Route::prefix('user/admin')->group(function () {
    Route::get('/', [AdminController::class,'user_admin_index'])->name('user.admin.index');
    Route::get('/create', [AdminController::class,'user_admin_create'])->name('user.admin.create');
    Route::post('/create', [AdminController::class,'user_admin_store'])->name('user.admin.store');
    Route::get('/edit/{id}', [AdminController::class,'user_admin_edit'])->name('user.admin.edit');
    Route::put('/edit/{id}', [AdminController::class,'user_admin_update'])->name('user.admin.update');
    Route::get('/pass/{id}', [AdminController::class,'user_admin_pass'])->name('user.admin.pass');
    Route::put('/pass/{id}', [AdminController::class,'user_admin_pass_act'])->name('user.admin.pass.act');
    Route::get('/destroy/{id}', [AdminController::class,'user_admin_destroy'])->name('user.admin.destroy');
});