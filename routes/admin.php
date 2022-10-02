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

Route::group(['as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\dgaAdmin\HomeController::class, 'home'])->name('home');
    Route::get('/home', [App\Http\Controllers\dgaAdmin\HomeController::class, 'home'])->name('home');
    Route::get('/setting', [App\Http\Controllers\dgaAdmin\HomeController::class, 'setting'])->name('setting');
    Route::post('/setting', [App\Http\Controllers\dgaAdmin\HomeController::class, 'settingEdit'])->name('settingEdit');
    Route::get('/setting-game', [App\Http\Controllers\dgaAdmin\HomeController::class, 'settingGame'])->name('settingGame');
    Route::post('/setting-game', [App\Http\Controllers\dgaAdmin\HomeController::class, 'settingGamePost'])->name('settingGamePost');
    Route::get('/add-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'addMomo'])->name('addMomo');
    Route::post('/get-otp', [App\Http\Controllers\dgaAdmin\MomoController::class, 'getOTP'])->name('getOTP');
    Route::post('/verify-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'verifyMomo'])->name('verifyMomo');
    Route::get('/login-momo/{phone}', [App\Http\Controllers\dgaAdmin\MomoController::class, 'loginMomo'])->name('loginMomo');
    Route::post('/delete-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'deleteMomo'])->name('deleteMomo');
    Route::post('/active-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'activeMomo'])->name('activeMomo');
    Route::post('/hide-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'hideMomo'])->name('hideMomo');
    Route::post('/soak-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'soakMomo'])->name('soakMomo');
    Route::post('/maintenance-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'maintenanceMomo'])->name('maintenanceMomo');
    Route::post('/info-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'infoMomo'])->name('infoMomo');
    Route::post('/edit-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'editMomo'])->name('editMomo');
    Route::get('/history-play/{game}', [App\Http\Controllers\dgaAdmin\HistoryController::class, 'historyPlay'])->name('historyPlay');
    Route::get('/history-play-all', [App\Http\Controllers\dgaAdmin\HistoryController::class, 'historyPlayALL'])->name('historyPlayALL');
    Route::get('/history-muster', [App\Http\Controllers\dgaAdmin\HistoryController::class, 'historyMuster'])->name('historyMuster');
    Route::get('/history-day-mission', [App\Http\Controllers\dgaAdmin\HistoryController::class, 'historyDayMission'])->name('historyDayMission');
    Route::post('/login-all-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'loginAllMomo'])->name('loginAllMomo');
    Route::post('/check-status-transfer', [App\Http\Controllers\dgaAdmin\MomoController::class, 'checkStatusTransfer'])->name('checkStatusTransfer');
    Route::post('/login-momo-one', [App\Http\Controllers\dgaAdmin\MomoController::class, 'loginMomoOne'])->name('loginMomoOne');
    Route::get('/week-top', [App\Http\Controllers\dgaAdmin\HistoryController::class, 'weekTop'])->name('weekTop');
    Route::post('/pay-week-top', [App\Http\Controllers\dgaAdmin\HistoryController::class, 'payWeekTop'])->name('payWeekTop');
    Route::get('/history-bank', [App\Http\Controllers\dgaAdmin\HistoryController::class, 'historyBank'])->name('historyBank');
    Route::post('/send-money', [App\Http\Controllers\dgaAdmin\MomoController::class, 'sendMoney'])->name('sendMoney');
    Route::get('/change-password', [App\Http\Controllers\dgaAdmin\HomeController::class, 'changePass'])->name('changePass');
    Route::post('/change-password', [App\Http\Controllers\dgaAdmin\HomeController::class, 'changePassPost'])->name('changePassPost');
    Route::post('/update', [App\Http\Controllers\dgaAdmin\HomeController::class, 'update'])->name('updateVer');
    Route::get('/support', [App\Http\Controllers\dgaAdmin\HomeController::class, 'support'])->name('support');
    Route::post('/support', [App\Http\Controllers\dgaAdmin\HomeController::class, 'supportPost'])->name('supportPost');
    Route::post('/edit-support', [App\Http\Controllers\dgaAdmin\HomeController::class, 'supportEdit'])->name('supportEdit');
    Route::post('/status-support', [App\Http\Controllers\dgaAdmin\HomeController::class, 'supportStatus'])->name('supportStatus');
    Route::get('/add-giftcode', [App\Http\Controllers\dgaAdmin\GiftCodeController::class, 'index'])->name('giftcode');
    Route::post('/add-giftcode', [App\Http\Controllers\dgaAdmin\GiftCodeController::class, 'giftcodePost'])->name('giftcodePost');
    Route::post('/edit-giftcode', [App\Http\Controllers\dgaAdmin\GiftCodeController::class, 'giftcodeEdit'])->name('giftcodeEdit');
    Route::post('/status-giftcode', [App\Http\Controllers\dgaAdmin\GiftCodeController::class, 'giftcodeStatus'])->name('giftcodeStatus');
    Route::get('/history-giftcode', [App\Http\Controllers\dgaAdmin\GiftCodeController::class, 'historyGiftCode'])->name('historyGiftCode');
    Route::get('/history-hu', [App\Http\Controllers\dgaAdmin\HistoryController::class, 'historyHu'])->name('historyHu');
    Route::get('/history-transfer-momo', [App\Http\Controllers\dgaAdmin\HistoryController::class, 'historyTransMomo'])->name('historyTransMomo');
    Route::get('/black-list', [App\Http\Controllers\dgaAdmin\HomeController::class, 'blackList'])->name('blackList');
    Route::post('/black-list', [App\Http\Controllers\dgaAdmin\HomeController::class, 'blackListPost'])->name('blackListPost');
    Route::post('/delete-black-list-momo', [App\Http\Controllers\dgaAdmin\HomeController::class, 'deleteMomoBlack'])->name('deleteMomoBlack');
    Route::get('/info-tran/{tran}', [App\Http\Controllers\dgaAdmin\HistoryController::class, 'infoTran'])->name('infoTran');
    Route::post('/info-tran/{tran}', [App\Http\Controllers\dgaAdmin\HistoryController::class, 'infoTranEdit'])->name('infoTranEdit');
});

Route::get('/login', [App\Http\Controllers\dgaAdmin\LoginController::class, 'index'])->name('admin.login');
Route::post('/login', [App\Http\Controllers\dgaAdmin\LoginController::class, 'submitLog'])->name('admin.login.post');
Route::get('/xu-ly-minigame', [App\Http\Controllers\dgaAdmin\MiniGame::class, 'XuLiMiniGame'])->name('admin.XuLiMiniGame');
Route::get('/xu-ly-pay', [App\Http\Controllers\dgaAdmin\MiniGame::class, 'payMoneyMiniGame'])->name('admin.payMoneyMiniGame');
Route::get('/xu-ly-day-mission', [App\Http\Controllers\dgaAdmin\MiniGame::class, 'payDayMission'])->name('admin.payMoneyMiniGame');
Route::get('/send-money-momo/{token}/{amount}/{comment}/{receiver}', [App\Http\Controllers\dgaAdmin\MomoController::class, 'sendMoneyMomo'])->name('admin.sendMoneyMomo');
Route::get('/history-momo/{token}', [App\Http\Controllers\dgaAdmin\MomoController::class, 'historyMomo'])->name('admin.historyMomo');
Route::get('/check-status-momo', [App\Http\Controllers\dgaAdmin\MiniGame::class, 'checkStatusMomo'])->name('admin.checkStatusMomo');
Route::get('/diemdanh', [App\Http\Controllers\dgaAdmin\MiniGame::class, 'diemdanh'])->name('admin.diemdanh');
Route::get('/check-momo/{phone}/{receiver}', [App\Http\Controllers\dgaAdmin\MomoController::class, 'checkMomo'])->name('admin.checkMomo');
Route::get('/get-new-token/{token}', [App\Http\Controllers\dgaAdmin\MomoController::class, 'getNewToken'])->name('admin.getNewToken');
Route::get('/xu-ly-hu', [App\Http\Controllers\dgaAdmin\MiniGame::class, 'payHu'])->name('admin.payHu');
Route::get('/xu-ly-minigame-v2', [App\Http\Controllers\dgaAdmin\MiniGame::class, 'XuLiMiniGameV2'])->name('admin.XuLiMiniGameV2');
Route::get('/history-momo-v2/{token}', [App\Http\Controllers\dgaAdmin\MomoController::class, 'historyMomoV2'])->name('admin.historyMomoV2');
Route::get('/ref-token', [App\Http\Controllers\dgaAdmin\MomoController::class, 'refToken'])->name('admin.refToken');
Route::get('/xu-ly-pay-error', [App\Http\Controllers\dgaAdmin\MiniGame::class, 'payMoneyMiniGameError'])->name('admin.payMoneyMiniGameError');
Route::get('/xu-ly-pay-muster-error', [App\Http\Controllers\dgaAdmin\MiniGame::class, 'payMusterError'])->name('admin.payMusterError');
Route::get('/kiem-tra-ma-giao-dich', [App\Http\Controllers\dgaAdmin\MiniGame::class, 'checkTransId'])->name('admin.checkTransId');
