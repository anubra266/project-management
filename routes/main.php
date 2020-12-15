<?php

use Inertia\Inertia;


$router->get('/', function () {
    return Inertia::render('Welcome');
});

$router->get('/home', function () {
    return Inertia::render('Profile');
})
    ->name('home')
    ->middleware(['auth', 'verified']);
