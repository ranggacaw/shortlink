<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/generate-link', [ShortLinkController::class, 'index']);
Route::post('/generate-link', [ShortLinkController::class, 'store'])->name('generate.link.post');
Route::get('{code}', [ShortLinkController::class, 'shortenLink'])->name('generate.link');