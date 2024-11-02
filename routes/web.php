<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AfspraakController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/views/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/views/nieuws', function () {
    return view('nieuws');
})->name('nieuws');

Route::get('/views/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/views/about', function () {
    return view('about');
})->name('about');

Route::get('/views/webshop', [WebshopController::class, 'index'])->name('webshop');

Route::get('/views/aanvraag', function () {
    return view('aanvraag');
})->name('aanvraag');

Route::get('/views/bedankt', function () {
    return view('bedankt');
})->name('bedankt');

// Authenticatie routes
Auth::routes();

// Gebruikersdashboard/home na inloggen
Route::get('/views/home', [HomeController::class, 'index'])->name('dashboard');

// Afspraak routes
Route::get('/views/afspraak', [AfspraakController::class, 'create'])->name('afspraak.create');
Route::post('/views/afspraak', [AfspraakController::class, 'store'])->name('afspraak.store');
