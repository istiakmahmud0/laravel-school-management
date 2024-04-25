<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
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

    // User
    Route::resource('users', UserController::class)->names('admin.users');
    // Assign roles to user
    Route::post('users/{user}/roles', [UserController::class, 'addRolesToUser'])->name('admin.user.assign.roles');
    // Delete roles form user
    Route::delete('users/{user}/roles/{role}', [UserController::class, 'removeRoleFromUser'])->name('admin.user.remove.role');
    // Assign permission to user

    Route::post('users/{user}/permissions', [UserController::class, 'addPermissionsToUser'])->name('admin.user.assign.permission');
    // Delete roles form user
    Route::delete('users/{user}/permissions/{permission}', [UserController::class, 'removePermissionFromUser'])->name('admin.user.remove.permission');
    // Update the admin password
    Route::post('/admin/password/update/{userId}', [UserController::class, 'updateUserPassword'])->name('admin.updatePassword');
    /**
     * User profile update
     */
    Route::get('user/profile', [AdminProfileController::class, 'index'])->name('admin.user.profile');
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
