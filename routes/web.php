<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['prefix' => 'admin-dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('roles', RoleController::class)->names('admin.roles');
    Route::resource('permissions', PermissionController::class)->names('admin.permissions');
    // Assign permission to role
    Route::post('roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('admin.roles.permissions');
    Route::delete('roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('admin.roles.permissions.revoke');

    // Assign roles to permissions
    Route::post('permissions/{permission}/roles', [PermissionController::class, 'giveRoles'])->name('admin.permissions.roles');
    Route::delete('permissions/{permission}/roles/{role}', [PermissionController::class, 'revokeRole'])->name('admin.permissions.roles.revoke');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
