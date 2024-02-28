<?php

use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\FeedbackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/customer/register', [CustomerController::class,'register']);
Route::post('/customer/update', [CustomerController::class,'update']);
Route::post('/customer/feedback', [FeedbackController::class,'addfeedback']);
Route::post('/customer/complaint', [FeedbackController::class,'addcomplaint']);