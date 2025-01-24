<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submitForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $name = $validatedData['name'];
        $email = $validatedData['email'];
        $phone = $validatedData['phone'];
        $subject = $validatedData['subject'];
        $message = $validatedData['message'];


        // Save the data to the database
        Contact::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message,
        ]);


        Mail::to($email)->send(new ContactFormSubmitted(
            $name,
        ));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function submitFormAjax(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save the data to the database
        $contact = Contact::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'subject' => $validatedData['subject'],
            'message' => $validatedData['message'],
        ]);

        // Send email (if needed)
        Mail::to($validatedData['email'])->send(new ContactFormSubmitted(
            $validatedData['name'],
        ));

        // Return JSON response for AJAX
        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent successfully!',
            'contact' => $contact,
        ]);
    }
}
