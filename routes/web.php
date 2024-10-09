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

Route::get('/views/aanvraag', function () {
    return view('aanvraag');
});


Route::get('/views/afspraak', function () {
    return view('afspraak');
});

Route::get('/views/bedankt', function () {
    return view('bedankt');
});

Route::get('/bedankt', function () {
    return view('bedankt');
});





Route::get('/afspraak', function () {
    return view('afspraak');
});


Route::get('/afspraak', [AfspraakController::class, 'index'])->name('afspraak');

use App\Http\Controllers\AfspraakController;

Route::get('/afspraak', [AfspraakController::class, 'index'])->name('afspraak');


