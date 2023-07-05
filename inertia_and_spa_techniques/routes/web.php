<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy']);

Route::middleware('auth:sanctum')->group(function ()
{

    Route::get('/', [HomeController::class, 'index']);

    Route::controller(UserController::class)->group(function ()
    {
        Route::get('/users', 'index');
        Route::get('/users/create', 'create')->can('create', 'App\Models\User');
        Route::post('/users', 'store');
        Route::get('/users/{user}', 'show');
    });



    Route::get('/settings', [SettingsController::class, 'index']);
});
