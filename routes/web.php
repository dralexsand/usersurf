<?php

use App\Http\Controllers\StatAuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('stat')->group(function () {
    Route::get('/', function () {
        return view('lara.pages.home');
    });

    Route::get('/page1', function () {
        return view('lara.pages.page1');
    })->name('page1');

    Route::get('/page2', function () {
        return view('lara.pages.page2');
    })->name('page2');

    Route::get('/page3', function () {
        return view('lara.pages.page3');
    })->name('page3');

    Route::get('/page4', function () {
        return view('lara.pages.page4');
    })->name('page4');

    Route::get('/page5', function () {
        return view('lara.pages.page5');
    })->name('page5');

    Route::get('/page6', function () {
        return view('lara.pages.page6');
    })->name('page6');

    Route::get('report', [StatAuthController::class, 'report'])->name('report');

    Route::get('login', [StatAuthController::class, 'index'])->name('login');
    Route::post('custom-login', [StatAuthController::class, 'customLogin'])->name('login.custom');
    Route::get('registration', [StatAuthController::class, 'registration'])->name('register-user');
    Route::post('custom-registration', [StatAuthController::class, 'customRegistration'])->name('register.custom');
    Route::get('signout', [StatAuthController::class, 'signOut'])->name('signout');

});

