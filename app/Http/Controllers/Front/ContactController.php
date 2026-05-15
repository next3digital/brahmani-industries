<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display the contact page
     */
    public function index()
    {
        $meta = [
            'title' => 'Contact Us - Brahmani Industries',
            'description' => 'Get in touch with Brahmani Industries for precision manufacturing services. Contact us for quotes, technical specifications, and inquiries.',
            'keywords' => 'contact brahmani industries, precision manufacturing contact, manufacturing inquiry, get quote'
        ];

        return view('front.contact', compact('meta'));
    }

    /**
     * Handle contact form submission
     */
    public function submit(\App\Http\Requests\Front\InquiryRequest $request)
    {
        try {
            // Send email
            Mail::to(config('settings.contact.email'))->send(new \App\Mail\InquiryMail($request->validated()));
            
            return redirect()->route('contact.thankyou')->with('success', 'Thank you for contacting us. We will get back to you shortly.');
        } catch (\Exception $e) {
            \Log::error('Contact form submission failed: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            return redirect()->back()->with('error', 'Sorry, there was an error sending your message. Please try again later.')->withInput();
        }
    }

    /**
     * Display the thank you page
     */
    public function thankYou()
    {
        $meta = [
            'title' => 'Thank You - Brahmani Industries',
            'description' => 'Thank you for contacting Brahmani Industries.',
            'keywords' => 'thank you, contact success'
        ];

        return view('front.thankyou', compact('meta'));
    }
}
