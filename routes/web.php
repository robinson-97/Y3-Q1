<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController; // Houd deze import
use App\Http\Controllers\WebshopController;
use App\Http\Controllers\HomeController; // Vergeet deze niet te importeren
use Illuminate\Support\Facades\Auth; // Vergeet deze niet te importeren

/*
|--------------------------------------------------------------------------|
| Web Routes                                                              |
|--------------------------------------------------------------------------|
*/

// Homepagina
Route::get('/', function () {
    return view('home');
})->name('home');

// Contactpagina
Route::get('/views/contact', function () {
    return view('contact');
})->name('contact');

// Nieuws pagina
Route::get('/views/nieuws', function () {
    return view('nieuws');
})->name('nieuws');

// FAQ pagina
Route::get('/views/faq', function () {
    return view('faq');
})->name('faq');

// About pagina
Route::get('/views/about', function () {
    return view('about');
})->name('about');

// Webshop pagina
Route::get('/views/webshop', [WebshopController::class, 'index'])->name('webshop');

// Aanvraag pagina
Route::get('/views/aanvraag', function () {
    return view('aanvraag');
})->name('aanvraag');

// Bedankt pagina
Route::get('/views/bedankt', function () {
    return view('bedankt');
})->name('bedankt');

// Afspraken pagina - Alleen toegankelijk voor ingelogde gebruikers
Route::get('/views/afspraak', [AppointmentController::class, 'index'])->middleware('auth')->name('afspraak');

// Route voor het opslaan van afspraken
Route::post('/save-appointment', [AppointmentController::class, 'store'])->name('save.appointment'); // Zorg ervoor dat deze overeenkomt met de store-methode in AppointmentController

// Authenticatie routes (Laravel standaard)
Auth::routes();

// Gebruikersdashboard/home na inloggen
Route::get('/home', [HomeController::class, 'index'])->name('dashboard'); // Gebruik GET in plaats van POST
