<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return Inertia::render('Welcome');
    return view('welcome');
});

Route::view('home', 'home')
	->name('home')
	->middleware(['auth', 'verified']);
