<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AfspraakController extends Controller
{
    public function index()
    {
        // Hier kun je eventuele logica voor de afsprakenpagina toevoegen
        return view('afspraak');
    }
}
