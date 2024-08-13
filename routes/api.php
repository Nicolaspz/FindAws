<?php

use App\Http\Controllers\Controller;
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
// Em routes/web.php
Route::get('/verify-phone', [Controller::class, 'showVerificationForm'])->name('verify-phone');
Route::post('/verify-phone', [Controller::class, 'verifyPhone'])->name('verify-phone.submit');

