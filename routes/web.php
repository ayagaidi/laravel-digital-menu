<?php
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\PublicMenuController;
use Illuminate\Support\Facades\Route;
Route::get('/',[PublicMenuController::class,'home'])->name('home');
Route::post('/locale',[PublicMenuController::class,'switchLocale'])->name('locale.switch');
Route::get('/{restaurant:slug}/branches/{branch:slug}',[PublicMenuController::class,'branch'])->name('menu.branch');
Route::get('/{restaurant:slug}/branches/{branch:slug}/qr',[PublicMenuController::class,'qr'])->name('menu.qr');
Route::get('/admin/login',[AuthController::class,'show'])->name('admin.login');
Route::post('/admin/login',[AuthController::class,'login'])->name('admin.login.submit');
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/',DashboardController::class)->name('dashboard');
    Route::resource('branches',BranchController::class)->except('show');
    Route::resource('categories',CategoryController::class)->except('show');
    Route::resource('items',MenuItemController::class)->except('show');
});
