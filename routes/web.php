<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
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
    // session()->invalidate();
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
    Route::middleware(['auth', 'permission:customermanagement'])->group(function () {
    Route::get('/customer/show',[CustomerController::class,'show'])->name('customer-show');
    Route::post('/change-account-status', [CustomerController::class,'changeAccountStatus'])->name('change.account.status');
    Route::post('/customer/filter',[CustomerController::class,'filter'])->name('customer-filter');
    Route::delete('/delete-customer/{id}', [CustomerController::class, 'destroy'])->name('delete-customer');
    });
    Route::middleware(['auth', 'permission:professionalmanagement'])->group(function () {
        Route::get('/vendor/show',[VendorController::class,'show'])->name('vendor-show');
        Route::post('/change-vendor-account-status', [VendorController::class,'changeAccountStatus'])->name('change.vendor.account.status');
        Route::post('/vendor/filter',[VendorController::class,'filter'])->name('vendor-filter');
    });
    // FeedBack Route
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::post('/feedback/filter',[ComplaintController::class,'filter'])->name('feedback-filter');
    Route::delete('/delete-feedback/{id}', [FeedbackController::class, 'destroy'])->name('delete-feedback');
    // Complaint Route
    Route::get('/complaint', [ComplaintController::class, 'index'])->name('complaint');
    Route::post('/complaint/filter',[ComplaintController::class,'filter'])->name('complaint-filter');
    Route::delete('/delete-complaint/{id}', [ComplaintController::class, 'destroy'])->name('delete-complaint');
    //Service Route
    Route::get('/service', [ServiceController::class, 'index'])->name('service');
    Route::post('/services/filter',[ServiceController::class,'filter'])->name('service-filter');
    Route::get('/service-create', [ServiceController::class, 'create'])->name('service-create');
    Route::post('/services', [ServiceController::class, 'service_store'])->name('services-store'); 
    Route::get('/services-edit/{service}', [ServiceController::class, 'edit'])->name('services-edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services-update');
    Route::delete('/delete-service/{id}', [ServiceController::class, 'destroy'])->name('delete-service');
    //Blog Controller
    Route::get('/blog/Pending', [BlogController::class, 'pending'])->name('blog-pending');
    Route::get('/blog/Approved', [BlogController::class, 'approved'])->name('blog-approved');
    //Notifactions Route
    Route::get('/notification', [NotificationController::class, 'index'])->name('notification');
    Route::get('/notification/create', [NotificationController::class, 'create'])->name('notification-create');
    Route::post('/notification/filter', [NotificationController::class, 'filter'])->name('notification-filter');
    Route::post('/notification/store', [NotificationController::class, 'store'])->name('notification-store');
    // Document Route
    Route::get('/customer/Documents', [DocumentController::class, 'index'])->name('customer-document');
    // Family Route
    Route::get('/customer/Family', [FamilyController::class, 'index'])->name('customer-family');

    

});

require __DIR__.'/auth.php';
