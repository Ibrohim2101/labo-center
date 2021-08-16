<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home.index');
})->name('home.index');

// Webhook (Telegram bot)
Route::post('/{token}/webhook', WebhookController::class)->name('webhook');

Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');

Route::group([
    'prefix' => 'dashboard',
    'middleware' => 'auth'
], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('settings', SettingsController::class)->only('index', 'update')->parameter('settings', 'user');
});

require __DIR__ . '/auth.php';
