<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ExecuteController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Home (Before Sign In)
Route::get('/', [HomeController::class, 'home'])->name('login');
// Log In with Google 
Route::get('/login/google', [LoginController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);
// Maintenance
Route::view('/maintenance', 'maintenance');


// ユーザ
Route::middleware('auth')->group(function() {
    // Home (After Log In)
    Route::get('/index/{object_id?}', [IndexController::class, 'index']);
    // Create
    // create directory
    Route::post('/dir/create', [RecordController::class, 'create_directory']);
    // create scraping
    Route::get('/scr/record', [RecordController::class, 'get_record']);
    Route::post('/scr/record', [RecordController::class, 'post_record']);
    Route::get('/scr/setting', [RecordController::class, 'get_setting']);
    Route::post('/scr/setting', [RecordController::class, 'post_setting']);
    Route::post('/scr/create', [RecordController::class, 'create_scraping']);
    // Detail (and Execute and Edit)
    Route::get('/detail/{object_id}', [ExecuteController::class, 'detail']);
    Route::get('/exexcute/{object_id}', [ExecuteController::class, 'execute']);
    Route::get('/edit/{object_id}', [ExecuteController::class, 'index']);
    // Log out
    Route::get('/logout', [LoginController::class, 'logout']);

    // システム管理者
    Route::middleware('admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
    });
});