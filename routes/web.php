<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/tentang', [App\Http\Controllers\PageController::class, 'tentang'])->name('tentang');
Route::get('/tentang/sejarah', [App\Http\Controllers\PageController::class, 'sejarah'])->name('sejarah');
Route::get('/tentang/wilayah', [App\Http\Controllers\PageController::class, 'wilayah'])->name('tentang.wilayah');
Route::get('/tentang/demografi', [App\Http\Controllers\PageController::class, 'demografi'])->name('tentang.demografi');
Route::get('/tentang/potensi', [App\Http\Controllers\PageController::class, 'potensi'])->name('tentang.potensi');
Route::get('/tentang/wisata', [App\Http\Controllers\PageController::class, 'wisata'])->name('tentang.wisata');
Route::get('/lembaga', [App\Http\Controllers\PageController::class, 'lembaga'])->name('lembaga');
Route::get('/pembangunan', [App\Http\Controllers\PageController::class, 'pembangunan'])->name('pembangunan');
Route::get('/kabar', [App\Http\Controllers\PageController::class, 'kabar'])->name('kabar');
Route::get('/kabar/{slug}', [App\Http\Controllers\PageController::class, 'kabarShow'])->name('kabar.show');
Route::get('/galeri', [App\Http\Controllers\PageController::class, 'galeri'])->name('galeri');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\Admin\PostController;

// Admin Routes (Protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/admin/posts', PostController::class)->names('admin.posts');
    Route::post('/admin/personils/upload_bagan', [App\Http\Controllers\Admin\PersonilController::class, 'uploadBagan'])->name('admin.personils.upload_bagan');
    Route::delete('/admin/personils/bagan/{category}', [App\Http\Controllers\Admin\PersonilController::class, 'deleteBagan'])->name('admin.personils.delete_bagan');
    Route::resource('/admin/personils', App\Http\Controllers\Admin\PersonilController::class)->names('admin.personils');
    Route::resource('/admin/potensis', App\Http\Controllers\Admin\PotensiController::class)->names('admin.potensis');
    Route::resource('/admin/wisata', App\Http\Controllers\Admin\WisataController::class)->names('admin.wisata')->parameters(['wisata' => 'wisata']);
    Route::resource('/admin/albums', App\Http\Controllers\Admin\AlbumController::class)->names('admin.albums');
    Route::post('/admin/albums/{album}/photos', [App\Http\Controllers\Admin\PhotoController::class, 'store'])->name('admin.photos.store');
    Route::delete('/admin/albums/{album}/photos/{photo}', [App\Http\Controllers\Admin\PhotoController::class, 'destroy'])->name('admin.photos.destroy');

});
Route::get('/run-migrations', function () { \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]); return \Illuminate\Support\Facades\Artisan::output(); });
