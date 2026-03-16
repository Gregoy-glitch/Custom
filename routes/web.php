<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

// Authentication
Route::get('/login',  [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'process_login'])->name('process_login');
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login')->with('success', 'You have been logged out.');
})->name('logout');

// Admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Users
Route::get('/users/list',        [UsersController::class, 'index'])->name('admin.userlist');
Route::post('/Add_New_User',     [UsersController::class, 'addNewUser'])->name('add_new_user');
Route::post('/edit_user/{id}',   [UsersController::class, 'edit_user'])->name('edit_user');
Route::post('/delete_user/{id}', [UsersController::class, 'delete_user'])->name('delete_user');