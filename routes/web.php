<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Faculty\FacultyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth','role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');



});
require __DIR__.'/auth.php';
//
//Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('permission:write post');
//Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('role:editor|admin');
// department Route
    Route::get('/department',[DepartmentController::class,'index'])->name('index');
    Route::post('/department',[DepartmentController::class,'create'])->name('create')->middleware(['auth','role:admin']);
    Route::get('/department/edit/{id}',[DepartmentController::class,'edit'])->name('edit')->middleware(['auth','role:admin']);
    Route::put('/department/edit/{id}',[DepartmentController::class,'update'])->name('update')->middleware(['auth','role:admin']);
    Route::get('/department/delete/{id}',[DepartmentController::class,'destroy'])->name('destroy')->middleware(['auth','role:admin']);

// Faculty Routes
   Route::get('/faculty',[FacultyController::class,'index'])->name('faculty.index');
   Route::post('/faculty',[FacultyController::class,'create'])->name('faculty.create')->middleware(['auth','role:admin']);
   Route::get('/faculty/edit/{id}',[FacultyController::class,'edit'])->name('faculty.edit');
   Route::put('/faculty/edit/{id}',[FacultyController::class,'update'])->name('faculty.update');
   Route::get('/faculty/delete/{id}',[FacultyController::class,'destroy'])->name('faculty.destroy');