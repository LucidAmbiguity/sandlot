<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\AssignRoleController;
use App\Http\Controllers\Admin\GivePermissionToRoleController;
use App\Http\Controllers\Admin\GivePermissionToUserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Pages\PagesController;
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
})->name('welcome');

Route::get('/about', [PagesController::class, 'about'])->name('about');

Route::middleware(['auth'])->group(function () {
    // dd('in group');
    Route::resource('admin/roles', RoleController::class);
    Route::resource('admin/permissions', PermissionController::class);
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/roles/assign', AssignRoleController::class)
        ->name('index', 'assignRole.index')
        ->name('update', 'assignRole.update')
        ->name('destroy', 'assignRole.destroy');
    Route::resource('admin/permissions/assignRole', GivePermissionToRoleController::class)
        ->name('index', 'givePermissionToRole.index')
        ->name('store', 'givePermissionToRole.store')
        ->name('update', 'givePermissionToRole.update')
        ->name('destroy', 'givePermissionToRole.destroy');
    Route::resource('admin/permissions/assignUser', GivePermissionToUserController::class)
        ->name('index', 'givePermissionToUser.index')
        ->name('store', 'givePermissionToUser.store')
        ->name('update', 'givePermissionToUser.update')
        ->name('destroy', 'givePermissionToUser.destroy');




    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
