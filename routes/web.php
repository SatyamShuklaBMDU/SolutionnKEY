<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    Auth::logout();
    session()->invalidate();
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('layout.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::middleware(['auth', 'permission:usermanagement'])->group(function () {
        Route::get('/add-user', [UserController::class, 'adduser'])->name('add-users');
        Route::post('/edit-users', [UserController::class, 'editUser'])->name('edituserlist');
        Route::post('/update-users', [UserController::class, 'updateUser'])->name('updateuserlist');
        Route::get('/all-user', [UserController::class, 'alluser'])->name('all-users');
        Route::post('/user/filter',[UserController::class,'filter'])->name('user-filter');
        Route::post('/user-store', [UserController::class, 'user_store'])->name('users-store');
    });
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/customer/show',[CustomerController::class,'show'])->name('customer-show');
    Route::post('/customer/filter',[CustomerController::class,'filter'])->name('customer-filter');
    Route::delete('/delete-customer/{id}', [CustomerController::class, 'destroy'])->name('delete-customer');

    // FeedBack Route
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::delete('/delete-feedback/{id}', [CustomerController::class, 'destroy'])->name('delete-feedback');
    
    // Complaint Route
    Route::get('/complaint', [ComplaintController::class, 'index'])->name('complaint');
    Route::delete('/delete-complaint/{id}', [CustomerController::class, 'destroy'])->name('delete-feedback');

});

require __DIR__.'/auth.php';
