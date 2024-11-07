<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afspraak;
use Illuminate\Support\Facades\Auth;

class AfspraakController extends Controller
{
    // Zorg ervoor dat alleen ingelogde gebruikers toegang hebben tot de afspraakpagina
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Weergave van het formulier om een afspraak te maken
    public function create()
    {
        return view('afspraak'); // Retourneer de view voor het maken van een afspraak
    }

    // Verwerken en opslaan van de afspraak
    public function store(Request $request)
    {
        // Valideer de inkomende gegevens
        $request->validate([
            'datum' => 'required|date', // Datum is verplicht en moet een geldige datum zijn
            'product' => 'required|string|max:50', // Productnaam is verplicht en mag maximaal 50 tekens bevatten
            'help_request' => 'required|string|max:200', // Hulpverzoek is verplicht en mag maximaal 200 tekens bevatten
            'phone' => 'required|string|max:10', // Telefoonnummer is verplicht en mag maximaal 10 tekens bevatten
            'opmerkingen' => 'nullable|string', // Opmerkingen zijn optioneel
        ]);

        // Maak een nieuwe afspraak aan in de database
        Afspraak::create([
            'user_id' => Auth::id(), // ID van de ingelogde gebruiker
            'email' => Auth::user()->email, // Email van de ingelogde gebruiker
            'product' => $request->input('product'), // Product waarvoor de afspraak wordt gemaakt
            'help_request' => $request->input('help_request'), // Hulpverzoek
            'phone' => $request->input('phone'), // Telefoonnummer
            'datum' => $request->input('datum'), // Datum en tijd van de afspraak
            'opmerkingen' => $request->input('opmerkingen'), // Eventuele opmerkingen
        ]);

        // Stuur de gebruiker terug naar het formulier met een succesbericht
        return redirect()->route('afspraak.create')->with('success', 'Afspraak succesvol ingepland!');
    }
}
