<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OverViewController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminListController;
use App\Http\Controllers\AccountInfoController;

// will not allowed if user-role-user or already authenticated user request to those routes
Route::middleware(['admin_auth'])->group(function () {
 Route::get('/',[AdminAuthController::class,'loginPage']);
 Route::get('loginPage',[AdminAuthController::class,'loginPage'])->name('adminAuth@loginPage');
 Route::get('registerPage',[AdminAuthController::class,'registerPage'])->name('adminAuth@registerPage');


 Route::middleware(['auth',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard',[AdminAuthController::class,'dashboard'])->name('Auth@dashboard');
    //category
    Route::get('category',[CategoryController::class,'categoryPage'])->name('Auth@categoryPage');
    Route::post('category/create',[CategoryController::class,'create'])->name('Category@create');
    Route::get('category/ajax/delete',[CategoryController::class,'delete'])->name('Category@delete');
    Route::get('category/edit/{id}',[CategoryController::class,'editPage'])->name('Category@editPage');
    Route::post('category/update',[CategoryController::class,'update'])->name('Category@update');

    //post
    Route::prefix('post')->group(function () {
       Route::get('',[PostController::class,'postPage'])->name('Auth@postPage');
       Route::post('add',[PostController::class,'add'])->name('post@add'); 
    });
    

    //admin Lists
    Route::get('adminList',[AdminListController::class,'adminListPage'])->name('Auth@adminListPage');
    Route::get('adminList/delete',[AdminListController::class,'delete'])->name('AdminList@delete');
    Route::get('adminList/approve',[AdminListController::class,'approve'])->name('AdminList@approve');
    

    //user account info
    Route::get('account/info',[AccountInfoController::class,'infoPage'])->name('account@infoPage');
    Route::post('account/info/update',[AccountInfoController::class,'update'])->name('account@update');
    Route::get('account/info/changePassword',[AccountInfoController::class,'changePasswordPage'])->name('account@changePasswordPage');
    Route::post('account/info/changePassword',[AccountInfoController::class,'changePassword'])->name('account@changePassword');


    //overview
    Route::prefix('overView')->group(function () {
      Route::get('',[OverViewController::class,'indexPage'])->name('overView@indexPage');
      Route::get('edit/{id}',[OverViewController::class,'editPage'])->name('overView@edit');
      Route::post('update',[OverViewController::class,'update'])->name('overView@update');
      Route::get('delete',[OverViewController::class,'delete'])->name('overView@delete');
      Route::get('more/{id}',[OverViewController::class,'more'])->name('overView@more');
      Route::get('outOfStock',[OverViewController::class,'outOfStock'])->name('overView@outOfStock');
    });

});

});
