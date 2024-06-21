<?php

use App\Livewire\Backend\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.pages.home');
})->name('home');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::get('about', function () {
            return view('backend.pages.about');
        })->name('about');
        Route::get('users', Users::class)->middleware('role:admin')->name('users');
    });
});
