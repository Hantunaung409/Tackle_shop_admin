<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OverViewController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminListController;

// will not allowed if user-role-user or already authenticated user request to those routes
Route::middleware(['admin_auth'])->group(function () {
 Route::redirect('/','loginPage');
 Route::get('loginPage',[AdminAuthController::class,'loginPage'])->name('adminAuth@loginPage');
 Route::get('registerPage',[AdminAuthController::class,'registerPage'])->name('adminAuth@registerPage');
});

Route::middleware(['auth',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard',[AdminAuthController::class,'dashboard'])->name('Auth@dashboard');
    //category
    Route::get('category',[CategoryController::class,'categoryPage'])->name('Auth@categoryPage');
    Route::post('category/create',[CategoryController::class,'create'])->name('Category@create');
    Route::get('category/ajax/delete',[CategoryController::class,'delete'])->name('Category@delete');
    Route::get('category/edit/{id}',[CategoryController::class,'editPage'])->name('Category@editPage');
    Route::post('category/update',[CategoryController::class,'update'])->name('Category@update');

    
    Route::get('post',[PostController::class,'postPage'])->name('Auth@postPage');
    Route::get('overView',[OverViewController::class,'overViewPage'])->name('Auth@overViewPage');
    Route::get('adminList',[AdminListController::class,'adminListPage'])->name('Auth@adminListPage');
});
