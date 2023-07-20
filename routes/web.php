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
    // Record
    Route::get('/record/{object_id}', [RecordController::class, 'index']);
    // Execute
    Route::get('/exexcute/{object_id}', [ExecuteController::class, 'index']);
    // Edit
    Route::get('/edit/{object_id}', [ExecuteController::class, 'index']);
    // Log out
    Route::get('/logout', [LoginController::class, 'logout']);

    // Route::get('/', [WelcomeController::class, 'index'])->name('home');
    // Route::get('/mylist/{auc_product_date_seqno}/{view_group?}', [FavoriteController::class, 'index'])->name('favorite');
    // Route::get('/cart/{auc_product_date_seqno}/{view_group?}', [CartController::class, 'index'])->name('cart')->where('view_group', '[1-9]|1[0-1]');
    // Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');
    // Route::get('/owned/{auc_product_date_seqno}', [OwnedItemsController::class, 'index'])->name('owned.items');
    // Route::get('/item/{auc_product_date_seqno}/{item_seq_no}', [ItemController::class, 'detail'])->name('item.detail');
    // Route::get('/items/{auc_product_date_seqno}/{view_group}', [ProductListController::class, 'index'])->name('item.list');

    // システム管理者
    Route::middleware('admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
    });
});




// Route::get('/', function () {
//     return view('test');
// });

// Route::get('/record', function () {
//     return view('record');
// });
// Route::get('/execute', function () {
//     return view('execute');
// });


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// // Home (After Sign In)
// Route::get('/index/{object_id?}', [HomeController::class, 'index']);
// // Record
// Route::get('/record/{object_id}/record', [RecordController::class, 'record']);
// Route::get('/record/{object_id}/setting', [RecordController::class, 'setting']);
// // Execute
// Route::get('/exexcute/{object_id}', [ExecuteController::class, 'index']);
// // Edit
// Route::get('/edit/{object_id}', [EditController::class, 'index']);

