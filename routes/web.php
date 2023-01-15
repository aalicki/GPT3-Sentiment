<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SentimentController;
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

Route::get('/', [SentimentController::class, 'index'])->name('sentiment');

Route::prefix('sentiment')->group(function () {

    Route::middleware(['throttle:sentiment'])->group(function () {
        Route::post('/check-sentiment', [SentimentController::class, 'processSentiment'])->name('sentiment.check');
    });
});

require __DIR__.'/auth.php';
