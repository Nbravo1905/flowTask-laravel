<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::livewire('/dashboard', 'pages::home.dashboard')->name('dashboard')->middleware('auth');

Route::livewire('/login', 'pages::auth.login')->name('login')->middleware('guest');
Route::livewire('/registro', 'pages::auth.register')->name('register')->middleware('guest');
Route::livewire('/profile', 'pages::profile.edit')->name('profile')->middleware('auth');