<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ExecuteController;
use App\Http\Controllers\EditController;

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

// Route::get('/', function () {
//     return view('test');
// });

Route::get('/record', function () {
    return view('record');
});
Route::get('/execute', function () {
    return view('execute');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Home (Before Sign In)
Route::get('/', [HomeController::class, 'public']);
// Maintenance
Route::view('/maintenance', 'maintenance');


// // Home (After Sign In)
// Route::get('/home/{object_id?}', [HomeController::class, 'private']);
// // Record
// Route::get('/record/{object_id}/record', [RecordController::class, 'record']);
// Route::get('/record/{object_id}/setting', [RecordController::class, 'setting']);
// // Execute
// Route::get('/exexcute/{object_id}', [ExecuteController::class, 'index']);
// // Edit
// Route::get('/edit/{object_id}', [EditController::class, 'index']);

// ユーザ
Route::middleware('auth')->group(function() {
    // Home (After Sign In)
    Route::get('/home/{object_id?}', [HomeController::class, 'private']);
    // Record
    Route::get('/record/{object_id}', [RecordController::class, 'index']);
    // Execute
    Route::get('/exexcute/{object_id}', [ExecuteController::class, 'index']);
    // Edit
    Route::get('/edit/{object_id}', [ExecuteController::class, 'index']);

    Route::get('/', [WelcomeController::class, 'index'])->name('home');
    Route::get('/mylist/{auc_product_date_seqno}/{view_group?}', [FavoriteController::class, 'index'])->name('favorite');
    Route::get('/cart/{auc_product_date_seqno}/{view_group?}', [CartController::class, 'index'])->name('cart')->where('view_group', '[1-9]|1[0-1]');
    Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');
    Route::get('/owned/{auc_product_date_seqno}', [OwnedItemsController::class, 'index'])->name('owned.items');
    Route::get('/item/{auc_product_date_seqno}/{item_seq_no}', [ItemController::class, 'detail'])->name('item.detail');
    Route::get('/items/{auc_product_date_seqno}/{view_group}', [ProductListController::class, 'index'])->name('item.list');

    // システム管理者
    Route::middleware('can:systemAdmin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
        Route::get('/admin/announcements/edit', [AnnouncementController::class, 'update'])->name('admin.announcement.edit');
        Route::post('/admin/announcements/edit', [AnnouncementController::class, 'update'])->name('admin.announcement.edit');
        Route::get('/admin/announcements/new', [AnnouncementController::class, 'addAnnouncement'])->name('admin.announcement.new');
        Route::post('/admin/announcements/new', [AnnouncementController::class, 'addAnnouncement'])->name('admin.announcement.new');
        Route::get('/admin/announcements', [AnnouncementController::class, 'index'])->name('admin.announcement');
        Route::get('/admin/settings', [SettingsController::class, 'index'])->name('admin.settings');
        Route::get('/admin/upload', [UploadTransferCSVController::class, 'index'])->name('admin.import');
        Route::get('/admin/comments', [ItemCommentController::class, 'index'])->name('admin.comment.list');
        Route::get('/admin/comments/edit', [ItemCommentController::class, 'update'])->name('admin.comment.edit');
        Route::post('/admin/comments/edit', [ItemCommentController::class, 'update'])->name('admin.comment.edit');
        Route::get('/admin/bidlog', [AdminBidLogController::class, 'index'])->name('admin.bidlog');
    });
});