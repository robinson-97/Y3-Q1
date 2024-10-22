<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; // Voeg deze regel toe om het Appointment model te importeren

class AppointmentController extends Controller
{
    public function index()
    {
        // Hier kun je eventuele logica voor de afsprakenpagina toevoegen
        return view('afspraak');
    }

    public function store(Request $request)
    {
        // Valideer de gegevens
        $request->validate([
            'date' => 'required|date',
            'description' => 'required|string',
        ]);

        // Opslaan in de database
        try {
            $appointment = new Appointment();
            $appointment->user_id = auth()->user()->id; // Of een andere manier om de gebruiker te identificeren
            $appointment->appointment_date = $request->date;
            $appointment->description = $request->description;
            $appointment->save();

            return redirect()->back()->with('success', 'Afspraak succesvol opgeslagen!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Er is iets misgegaan. Probeer het opnieuw.');
        }
    }
}
