<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [HomeController::class,'index'])->name('index');

Route::prefix('auth')->group(function () {
    Route::get('/admin/login',[AuthController::class,'admin_login'])->name('auth.admin.login');
    Route::post('/admin/login',[AuthController::class,'admin_login_validation'])->name('auth.admin.login.validation');
    Route::get('/admin/logout',[AuthController::class,'admin_logout'])->name('auth.admin.logout');
}); 

Route::prefix('dashboard')->middleware('auth.admin')->group(function () {
    
    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    // Population
    Route::prefix('population')->group(function () {
        Route::get('/', [AdminController::class,'population_index'])->name('population.index');
        Route::get('/create', [AdminController::class,'population_create'])->name('population.create');
        Route::post('/create', [AdminController::class,'population_store'])->name('population.store');
        Route::get('/edit/{id}', [AdminController::class,'population_edit'])->name('population.edit');
        Route::put('/edit/{id}', [AdminController::class,'population_update'])->name('population.update');
        Route::get('/destroy/{id}', [AdminController::class,'population_destroy'])->name('population.destroy');
    });
    // Birth
    Route::prefix('birth')->group(function () {
        Route::get('/', [AdminController::class,'birth_index'])->name('birth.index');
        Route::get('/create', [AdminController::class,'birth_create'])->name('birth.create');
        Route::post('/create', [AdminController::class,'birth_store'])->name('birth.store');
        Route::get('/edit/{id}', [AdminController::class,'birth_edit'])->name('birth.edit');
        Route::put('/edit/{id}', [AdminController::class,'birth_update'])->name('birth.update');
        Route::get('/destroy/{id}', [AdminController::class,'birth_destroy'])->name('birth.destroy');
    });
    // Death
    Route::prefix('death')->group(function () {
        Route::get('/', [AdminController::class,'death_index'])->name('death.index');
        Route::get('/create', [AdminController::class,'death_create'])->name('death.create');
        Route::post('/create', [AdminController::class,'death_store'])->name('death.store');
        Route::get('/edit/{id}', [AdminController::class,'death_edit'])->name('death.edit');
        Route::put('/edit/{id}', [AdminController::class,'death_update'])->name('death.update');
        Route::get('/destroy/{id}', [AdminController::class,'death_destroy'])->name('death.destroy');
    });
    // Facility
    Route::prefix('facility')->group(function () {
        Route::get('/', [AdminController::class,'facility_index'])->name('facility.index');
        Route::get('/create', [AdminController::class,'facility_create'])->name('facility.create');
        Route::post('/create', [AdminController::class,'facility_store'])->name('facility.store');
        Route::get('/edit/{id}', [AdminController::class,'facility_edit'])->name('facility.edit');
        Route::put('/edit/{id}', [AdminController::class,'facility_update'])->name('facility.update');
        Route::get('/destroy/{id}', [AdminController::class,'facility_destroy'])->name('facility.destroy');
    });
    // Service
    Route::prefix('service')->group(function () {
        Route::get('/', [AdminController::class,'service_index'])->name('service.index');
        Route::get('/create', [AdminController::class,'service_create'])->name('service.create');
        Route::post('/create', [AdminController::class,'service_store'])->name('service.store');
        Route::get('/edit/{id}', [AdminController::class,'service_edit'])->name('service.edit');
        Route::put('/edit/{id}', [AdminController::class,'service_update'])->name('service.update');
        Route::get('/destroy/{id}', [AdminController::class,'service_destroy'])->name('service.destroy');
    });
    // Activity
    Route::prefix('activity')->group(function () {
        Route::get('/', [AdminController::class,'activity_index'])->name('activity.index');
        Route::get('/create', [AdminController::class,'activity_create'])->name('activity.create');
        Route::post('/create', [AdminController::class,'activity_store'])->name('activity.store');
        Route::get('/edit/{id}', [AdminController::class,'activity_edit'])->name('activity.edit');
        Route::put('/edit/{id}', [AdminController::class,'activity_update'])->name('activity.update');
        Route::get('/destroy/{id}', [AdminController::class,'activity_destroy'])->name('activity.destroy');
    });
    // User Executive
    Route::prefix('user/executive')->group(function () {
        Route::get('/', [AdminController::class,'user_executive_index'])->name('user.executive.index');
        Route::get('/create', [AdminController::class,'user_executive_create'])->name('user.executive.create');
        Route::post('/create', [AdminController::class,'user_executive_store'])->name('user.executive.store');
        Route::get('/edit/{id}', [AdminController::class,'user_executive_edit'])->name('user.executive.edit');
        Route::put('/edit/{id}', [AdminController::class,'user_executive_update'])->name('user.executive.update');
        Route::get('/pass/{id}', [AdminController::class,'user_executive_pass'])->name('user.executive.pass');
        Route::put('/pass/{id}', [AdminController::class,'user_executive_pass_act'])->name('user.executive.pass.act');
        Route::get('/destroy/{id}', [AdminController::class,'user_executive_destroy'])->name('user.executive.destroy');
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
        Route::get('/profile', [AdminController::class,'user_admin_profile'])->name('user.admin.profile');
    });
});