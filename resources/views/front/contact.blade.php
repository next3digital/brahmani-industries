@extends('layouts.front')

@push('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ContactPage",
  "name": "Contact Us - {{ config('settings.company.name') }}",
  "description": "Contact {{ config('settings.company.name') }}. Get in touch with us for manufacturing and engineering solutions.",
  "url": "{{ url()->current() }}",
  "mainEntity": {
    "@type": "LocalBusiness",
    "name": "{{ config('settings.company.name') }}",
    "image": "{{ asset('assets/img/logo.jpg') }}",
    "telephone": "{{ config('settings.contact.phone') }}",
    "email": "{{ config('settings.contact.email') }}",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "{{ config('settings.contact.address') }}",
      "addressLocality": "{{ config('settings.contact.city') }}",
      "addressRegion": "{{ config('settings.contact.state') }}",
      "postalCode": "{{ config('settings.contact.pincode') }}",
      "addressCountry": "{{ config('settings.contact.country') }}"
    }
  }
}
</script>
@endpush

@section('content')
    <style>
        .contact-hero {
            background-image: url('{{ asset('assets/img/contact_us.png') }}');
            background-size: cover;
            background-position: center;
            margin-top: 0;
            padding: 160px 0 100px;
            text-align: center;
            color: white;
        }
        .contact-hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #000;
        }
        .contact-hero-subtitle {
            font-size: 1.2rem;
            color: #000;
        }

        @media (max-width: 768px) {
            .contact-hero {
                padding: 80px 0;
            }
            .contact-hero-title {
                font-size: 2.5rem;
            }
        }
    </style>
    <!-- Contact Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <h1 class="contact-hero-title">Get in Touch</h1>
            <p class="contact-hero-subtitle">We're here to help with your precision manufacturing needs</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-wrapper">
                <!-- Contact Information -->
                <div class="contact-info-left">
                    <h2 class="section-title-left">Contact Information</h2>
                    <p class="contact-intro">
                        Have questions about our precision manufacturing services? Our team is ready to assist you with quotes, technical specifications, and any inquiries you may have.
                    </p>

                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                            </div>
                            <div class="contact-text">
                                <h3>Address</h3>
                                <p>21, Ganga Estate, Naroda, Near Kutch Kadva Patel, Ahmedabad, Gujarat 382330</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                </svg>
                            </div>
                            <div class="contact-text">
                                <h3>Phone</h3>
                                <p>
                                    @php $phones = explode(',', config('settings.contact.phone')); @endphp
                                    @foreach($phones as $phone)
                                        <a href="tel:{{ trim(str_replace(' ', '', $phone)) }}">{{ trim($phone) }}</a>@if(!$loop->last), @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                            </div>
                            <div class="contact-text">
                                <h3>Email</h3>
                                <p><a href="mailto:{{ config('settings.contact.email') }}">{{ config('settings.contact.email') }}</a></p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                                </svg>
                            </div>
                            <div class="contact-text">
                                <h3>Business Hours</h3>
                                <p>Monday - Friday: 9:00 AM - 6:00 PM</p>
                                <p>Saturday: 9:00 AM - 2:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="contact-social">
                        <h3>Follow Us</h3>
                        <div class="social-links-contact">
                            <a href="https://www.facebook.com/profile.php?id=61570712753505" class="social-link-contact" aria-label="Facebook">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/in/brahmani-industries/" class="social-link-contact" aria-label="LinkedIn">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <a href="https://x.com/_bm_industries?s=21" class="social-link-contact" aria-label="Twitter">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/brahmaniindustries" class="social-link-contact" aria-label="Instagram">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form Section -->
                <div class="contact-form-section">
                    <h2 class="section-title-left">Send Us a Message</h2>
                    <p class="form-intro">Fill out the form below and we'll get back to you as soon as possible.</p>

                    <form action="{{ route('contact.submit') }}" method="POST" class="contact-form" id="contactForm">
                        @csrf
                        <input type="hidden" name="page_url" value="{{ url()->current() }}">
                        <input type="hidden" name="bot" value="bot">
                        <input type="hidden" name="bot_capture" value="">

                        <div class="form-row">
                            <div class="form-group">
                                <label for="name" class="form-label">
                                    Full Name <span class="required">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="form-input @error('name') is-invalid @enderror"
                                    placeholder="Enter your full name"
                                    value="{{ old('name') }}"
                                    required
                                >
                                @error('name')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="mobile" class="form-label">
                                    Mobile Number <span class="required">*</span>
                                </label>
                                <input
                                    type="tel"
                                    id="mobile"
                                    name="mobile"
                                    class="form-input @error('mobile') is-invalid @enderror"
                                    placeholder="Enter your mobile number"
                                    value="{{ old('mobile') }}"
                                    pattern="[0-9]{10}"
                                    required
                                >
                                @error('mobile')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="email" class="form-label">
                                    Email Address <span class="required">*</span>
                                </label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-input @error('email') is-invalid @enderror"
                                    placeholder="Enter your email address"
                                    value="{{ old('email') }}"
                                    required
                                >
                                @error('email')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="subject" class="form-label">
                                    Subject <span class="required">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="subject"
                                    name="subject"
                                    class="form-input @error('subject') is-invalid @enderror"
                                    placeholder="Enter subject"
                                    value="{{ old('subject') }}"
                                    required
                                    maxlength="100"
                                >
                                @error('subject')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-label">
                                Message <span class="required">*</span>
                            </label>
                            <textarea
                                id="description"
                                name="description"
                                class="form-textarea @error('description') is-invalid @enderror"
                                placeholder="Enter your message here..."
                                rows="6"
                                required
                                maxlength="2000"
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-12 wow fadeInUp" data-wow-delay=".2s">
                        <div class="g-recaptcha" data-sitekey="{{ config('settings.captcha_site_key') }}"></div>
                        <div><input type="hidden" name="hiddenRecaptcha" id="hiddenRecaptcha"></div>
                        @if ($errors->has('g-recaptcha-response'))
                            <div class="text-danger">
                                {{ $errors->first('g-recaptcha-response') }}
                            </div>
                        @endif
                    </div>

                        <div class="form-actions">
                            <input type="hidden" name="bot" value="bot">
                                <input type="hidden" name="bot_capture" value="">
                            <button type="submit" class="btn-submit">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" style="margin-right: 8px;">
                                    <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                                </svg>
                                Send Message
                            </button>
                        </div>
                    </form>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-error">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                <!-- Map Section -->
                <div class="contact-map">
                    <h2 class="section-title-left">Find Us</h2>
                    <div class="map-container">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d82811.38091127964!2d72.64333306921888!3d23.085726373444263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e81d76624a105%3A0x83db40bca838ea49!2sBrahmani%20industries!5e1!3m2!1sen!2sin!4v1775644077132!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </section>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="{{ asset('assets/js/jquery-validation.js') }}"></script>
    @endpush
@endsection
