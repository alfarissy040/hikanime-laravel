<?php

use App\Http\Controllers\AdminAnimeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;

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


Route::controller(AnimeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/anime-list', 'anime_list');
    Route::get('/anime/{anime:slug}', 'anime');
    Route::get('/anime/{anime:slug}/{episode:slug}', 'streaming');
    Route::get('/genre', 'genre');
    Route::get('/genre/{genre:slug}', 'show_genre');
    Route::get('/search', 'search');
    Route::get('/report-link', 'report_link');
    Route::post('/report-link', 'store');
});

Route::get('/hikamin/login',[LoginController::class ,'index'])->name('login');
Route::post('/hikamin/login',[LoginController::class ,'authenticate']);
Route::post('/hikamin/logout',[LoginController::class ,'logout'])->middleware('auth');

Route::controller(AdminController::class)->group(function () {
    Route::get('/hikamin', 'index')->middleware('auth');
    Route::get('/hikamin/checkAnime', 'checkAnime')->middleware('auth');
    Route::get('/hikamin/checkEpisode', 'checkEpisode')->middleware('auth');
});

Route::resource('/hikamin/anime', AdminAnimeController::class)->middleware('auth');
Route::resource('/hikamin/anime/{anime:slug}/episode', EpisodeController::class)->middleware('auth');
Route::resource('/hikamin/anime/{anime:slug}/batch', DownloadController::class)->middleware('auth');

Route::get('/hikamin/batch', [DownloadController::class, 'index'])->middleware('auth');

Route::resource('/hikamin/report', ReportController::class)->middleware('auth');

Route::get('/hikamin/getGenre', [AdminAnimeController::class, 'getGenre'])->middleware('auth');