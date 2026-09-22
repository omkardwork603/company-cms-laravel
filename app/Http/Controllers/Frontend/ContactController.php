<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display contact page.
     */
    public function index()
    {
        return view('frontend.contact');
    }


    /**
     * Store contact message.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'subject' => [
                'nullable',
                'string',
                'max:255',
            ],

            'message' => [
                'required',
                'string',
                'max:5000',
            ],
        ]);


        Message::create($validated);


        return redirect()
            ->route('contact')
            ->with(
                'success',
                'Thank you! Your message has been sent successfully.'
            );
    }
}