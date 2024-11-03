<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afspraak;
use Illuminate\Support\Facades\Auth;

class AfspraakController extends Controller
{
    public function create()
    {
        return view('afspraak'); // Returns the view for creating an appointment
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'datum' => 'required|date',
            'product' => 'required|string|max:50', // Product input validation
            'help_request' => 'required|string|max:200', // Help request input validation
            'phone' => 'required|string|max:10', // Phone number validation
            'opmerkingen' => 'nullable|string', // Optional remarks
        ]);

        // Create a new appointment
        Afspraak::create([
            'user_id' => Auth::id(), // Current logged-in user's ID
            'email' => Auth::user()->email, // Get the email of the logged-in user
            'product' => $request->input('product'), // Get product from the request
            'help_request' => $request->input('help_request'), // Get help request from the request
            'phone' => $request->input('phone'), // Get phone from the request
            'datum' => $request->input('datum'), // Get date from the request
            'opmerkingen' => $request->input('opmerkingen'), // Get remarks from the request
        ]);

        // Redirect back to the create appointment view with a success message
        return redirect()->route('afspraak.create')->with('success', 'Afspraak succesvol ingepland!');
    }
}
