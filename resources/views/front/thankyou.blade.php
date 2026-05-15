@extends('layouts.front')

@section('content')
<div class="thank-you-section" style="padding: 80px 0; text-align: center;">
    <div class="container">
        <div class="thank-you-wrapper" style="max-width: 600px; margin: 0 auto; padding: 40px; background: var(--primary-lighter); border-radius: 15px; box-shadow: 0 5px 25px rgba(0,0,0,0.3); border: 1px solid rgba(212, 175, 55, 0.1);">
            <div class="success-icon" style="margin-bottom: 20px;">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" fill="#28a745"/>
                </svg>
            </div>
            <h1 style="color: var(--secondary); margin-bottom: 15px; font-size: 2.5rem;">Thank You!</h1>
            <p style="color: var(--text-muted); font-size: 1.1rem; line-height: 1.6; margin-bottom: 30px;">
                Your message has been sent successfully. We will get back to you shortly.
            </p>
            <a href="{{ route('home') }}" class="btn-primary" style="display: inline-block; padding: 12px 30px; background: var(--gold-gradient); color: var(--primary); text-decoration: none; border-radius: 50px; font-weight: 600; transition: all 0.3s; box-shadow: var(--gold-glow);">
                Back to Home
            </a>
        </div>
    </div>
</div>
@endsection
