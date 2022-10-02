<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/settings', [App\Http\Controllers\DUNGA::class, 'settings']);
Route::post('/momo', [App\Http\Controllers\DUNGA::class, 'momo']);
Route::post('/history', [App\Http\Controllers\DUNGA::class, 'history']);
Route::post('/render_minigame', [App\Http\Controllers\DUNGA::class, 'minigame']);
Route::post('/balance-hu', [App\Http\Controllers\DUNGA::class, 'hu']);
Route::post('/check-day-mission', [App\Http\Controllers\DUNGA::class, 'checkDayMission'])->name('checkDayMission');
Route::post('/week_top', [App\Http\Controllers\DUNGA::class, 'weekTop']);
Route::post('/day_top', [App\Http\Controllers\DUNGA::class, 'dayTop']);
Route::post('/check-tran', [App\Http\Controllers\DUNGA::class, 'checkTran']);
Route::get('/muster', [App\Http\Controllers\DUNGA::class, 'muster']);
Route::post('/diem-danh', [App\Http\Controllers\DUNGA::class, 'diemdanh']);
Route::post('/get-day-mission', [App\Http\Controllers\DUNGA::class, 'getDayMission'])->name('getDayMission');
Route::post('/refund', [App\Http\Controllers\DUNGA::class, 'refund']);
Route::post('/check-gift-code', [App\Http\Controllers\DUNGA::class, 'checkGiftcode'])->name('checkGiftcode');
Route::get('/check', [App\Http\Controllers\dgaAdmin\HistoryController::class, 'check'])->name('check');
