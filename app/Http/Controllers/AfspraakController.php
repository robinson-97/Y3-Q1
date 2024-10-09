<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AfspraakController extends Controller
{
    public function index()
    {
        return view('afspraak'); // Zorg ervoor dat je een 'afspraak.blade.php' bestand hebt in de 'resources/views' map
    }
}

