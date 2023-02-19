<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\ConnectionRequestController;
use App\Http\Controllers\SuggestionController;

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

Auth::routes();


// Suggestions
Route::get('/suggestions', [SuggestionController::class, 'index'])->name('suggestions.index');
Route::post('/suggestions/{user}/connect', [SuggestionController::class, 'connect'])->name('suggestions.connect');

// Connection Requests
Route::get('/requests/sent', [ConnectionRequestController::class, 'sentRequests'])->name('requests.sent');
Route::post('/requests/withdraw/{connection}', [ConnectionRequestController::class, 'withdraw'])->name('requests.withdraw');
Route::get('/requests/received', [ConnectionRequestController::class, 'receivedRequests'])->name('requests.received');
Route::post('/requests/{connection}/accept', [ConnectionRequestController::class, 'accept'])->name('requests.accept');
Route::post('/requests/{connection}/withdraw', [ConnectionRequestController::class, 'withdraw'])->name('requests.withdraw');

// Connections
Route::get('/connections', [ConnectionController::class, 'index'])->name('connections.index');
Route::post('/connections/{connection}/remove', [ConnectionController::class, 'remove'])->name('connections.remove');
Route::get('/connections/{user}/common', [ConnectionController::class, 'common'])->name('connections.common');
