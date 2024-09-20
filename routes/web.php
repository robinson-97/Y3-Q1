<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/views/contact', function () {
    return view('contact');
});

Route::get('/views/nieuws', function () {
    return view('nieuws');
});

Route::get('/views/faq', function () {
    return view('faq');
});

Route::get('/views/about', function () {
    return view('about');
});

Route::get('/views/webshop', function () {
    return view('about');
});

Route::get('/views/aanvraag', function () {
    return view('aanvraag');
});

Route::get('/webshop', [WebshopController::class, 'index']);
