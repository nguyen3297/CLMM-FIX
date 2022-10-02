<?php

use Illuminate\Support\Facades\Route;
use App\Models\Setting;
use App\Models\HistoryPlay;
use Carbon\Carbon;

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

Route::get('/play', function () {
    $setting = Setting::first();
    if ($setting->status == 1) {
        echo 'HAZZZ';
    } else {
        if ($setting->theme == 'v1') {
            return view('welcome', compact('setting'));
        } else if ($setting->theme == 'v2') {
            $contact = \App\Models\Contact::query()->where('status', 1)->get();
            return view('homeV2', compact('setting', 'contact'));
        } else if ($setting->theme == 'v3') {
            $contact = \App\Models\Contact::query()->where('status', 1)->get();
            return view('homeV3', compact('setting', 'contact'));
        } else if ($setting->theme == 'v4') {
            $contact = \App\Models\Contact::query()->where('status', 1)->get();
            return view('homeV4', compact('setting', 'contact'));
        } else {
            return view('welcome', compact('setting'));
        }
    }
})->name('play');
Route::get('/', function () {
    $setting = Setting::first();
    return view('welcome', compact('setting'));
});
