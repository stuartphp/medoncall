<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
    // $data['items'] = App\Models\Medicine::paginate(10);
    // $data['headers'] = [['name'=>'Schedule', 'sortable'=>'schedule'], 'Product Name', 'Dosage Form', 'Price', ['name'=>'Action', 'align'=>'right']];
    // return view('test', $data);
});

Route::middleware(['auth', 'web'])->group(function(){
    Route::get('/dashboard',[\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', function(){ return view('admin.profile');})->name('profile');
    Route::get('terms-and-conditions', function(){ return view('terms-and-conditions');})->name('terms');
    Route::prefix('admin')->as('admin.')->group(function () {
        Route::prefix('user-management')->as('user-management.')->group(function () {
            Route::get('users', function(){ return view('admin.user-management.users');})->name('users');
            Route::get('user-addresses', function(){ return view('admin.user-management.user-addresses');})->name('addresses');
            Route::get('permissions', function(){ return view('admin.user-management.permissions');})->name('permissions');
            Route::resource('roles', \App\Http\Controllers\Admin\UserManagement\RolesController::class);
        });
        Route::prefix('manage-orders')->as('manage-orders.')->group(function () {
            Route::get('list', function(){ return view('admin.manage-orders.list');})->name('list');
        });

    });
    Route::get('medicine', function(){ return view('admin.medicine');})->name('medicine');
    Route::resource('orders', \App\Http\Controllers\Admin\OrdersController::class);
});

require __DIR__.'/auth.php';
