<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

// will not allowed if user-role-user or have not authenticated user request to those routes
Route::middleware(['admin_auth'])->group(function () {
 Route::redirect('/','loginPage');
 Route::get('loginPage',[AdminAuthController::class,'loginPage'])->name('adminAuth@loginPage');
 Route::get('registerPage',[AdminAuthController::class,'registerPage'])->name('adminAuth@registerPage');
});

Route::middleware(['auth',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard',[AdminAuthController::class,'dashboard'])->name('adminAuth@dashboard');
});
