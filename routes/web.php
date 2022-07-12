<?php

use App\Http\Controllers\CameraController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserAuthController;
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

Route::middleware('auth')->group(function() {
    Route::view('/', 'users.home')->name('home');
    
    Route::prefix('camera')->name('camera.')->group(function() {
        Route::get('list', [CameraController::class, 'list'])->name('list');
        Route::get('stream/{id}', [CameraController::class, 'stream'])->name('stream');
    });

    Route::prefix('member')->name('member.')->group(function() {
        Route::get('list', [MemberController::class, 'list'])->name('list');
        Route::get('add', [MemberController::class, 'add'])->name('add');
        Route::post('add', [MemberController::class, 'store'])->name('store');
        Route::get('update/{id}', [MemberController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [MemberController::class, 'update'])->name('update');
        Route::post('delete/{id}', [MemberController::class, 'delete'])->name('delete');
        Route::get('image/{memberId}/{fileName}', [MemberController::class, 'image'])->name('image');
    });
});

Route::name('user.')->group(function() {
    Route::get('/login', [UserAuthController::class, 'loginView'])->name('login');
    Route::post('/login', [UserAuthController::class, 'login']);
});
