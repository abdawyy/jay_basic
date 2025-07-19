<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
     // Show the contact page
    public function show()
    {
        return view('contact_us');
    }

    // Handle the contact form submission
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        // Optionally send email or save to database here
        // Example: Log or fake email sending
        \Log::info('Contact form submitted', $validated);

        return redirect()->route('contact.show')->with('success', 'Message sent successfully!');
    }
}
