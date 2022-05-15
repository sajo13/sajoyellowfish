<?php

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('generate-shorten-link', [App\Http\Controllers\ShortLinkController::class, 'index'])->name('list');
Route::get('new_url', [App\Http\Controllers\ShortLinkController::class, 'new_url']);
Route::post('generate-shorten-link', [App\Http\Controllers\ShortLinkController::class, 'store'])->name('generate.shorten.link.post');
Route::get('{link}', [App\Http\Controllers\ShortLinkController::class, 'shortenLink'])->name('shorten.link');

