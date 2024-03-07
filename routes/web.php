<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::post('contact/send', [HomeController::class, 'contactSubmit'])->name('contactSubmit');

Route::get('courses', [HomeController::class, 'courses'])->name('courses');
Route::get('course-details/{id}', [HomeController::class, 'courseShow'])->name('course.details');
Route::get('apply', [HomeController::class, 'apply'])->name('apply');
Route::post('apply', [HomeController::class, 'formSubmit'])->name('formSubmit');



Route::get('/change-language', [LocalizationController::class, 'changeLanguage'])->name('change.language');


// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.show');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    // Admin Dashboard Routes
    Route::middleware(['isAdmin'])->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        //Home Video Routes 
        Route::get('video', [VideoController::class, 'index'])->name('admin.video');
        Route::post('video/attach', [VideoController::class, 'attachVideo'])->name('admin.video.attach');
        Route::post('video/detach/{id}', [VideoController::class, 'detachVideo'])->name('admin.video.detach');
        Route::get('video/show/{video}', [VideoController::class, 'show'])->name('admin.video.show');

        //Courses Routes 
        Route::resource('courses', CourseController::class);
    });
});
