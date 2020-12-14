<?php

use Inertia\Inertia;


$router->get('/', function () {
    return Inertia::render('Welcome');
});

$router->get('/home', function () {
    return view('home');
    return Inertia::render('Welcome');
})
    ->name('home')
    ->middleware(['auth', 'verified']);


    