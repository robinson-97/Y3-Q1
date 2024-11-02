<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afspraak;
use Illuminate\Support\Facades\Auth;

class AfspraakController extends Controller
{
    public function create()
    {
        return view('afspraak');
    }

    public function store(Request $request)
    {
        $request->validate([
            'datum' => 'required|date',
            'opmerkingen' => 'nullable|string',
        ]);

        Afspraak::create([
            'user_id' => Auth::id(), // Huidige ingelogde gebruiker
            'datum' => $request->datum,
            'opmerkingen' => $request->opmerkingen,
        ]);

        return redirect()->route('afspraak.create')->with('success', 'Afspraak succesvol ingepland!');
    }
}
