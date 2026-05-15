@extends('layouts.front')

@section('content')
    <!-- Banner Section -->
    <section class="page-banner">
        <div class="container">
            <div class="page-banner-content">
                <h1 class="page-title">Privacy Policy</h1>
                <p class="page-subtitle">Last Updated: {{ date('F d, Y') }}</p>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="privacy-section section-padding">
        <div class="container">
            <div class="privacy-content">
                <div class="privacy-block">
                    <h2>1. Introduction</h2>
                    <p>Welcome to Brahmani Industries ("we," "our," or "us"). We respect your privacy and are committed to protecting your personal data. This privacy policy will inform you as to how we look after your personal data when you visit our website (regardless of where you visit it from) and tell you about your privacy rights and how the law protects you.</p>
                </div>

                <div class="privacy-block">
                    <h2>2. Information We Collect</h2>
                    <p>We may collect, use, store and transfer different kinds of personal data about you which we have grouped together follows:</p>
                    <ul>
                        <li><strong>Identity Data:</strong> includes first name, last name, username or similar identifier.</li>
                        <li><strong>Contact Data:</strong> includes billing address, delivery address, email address and telephone numbers.</li>
                        <li><strong>Technical Data:</strong> includes internet protocol (IP) address, your login data, browser type and version, time zone setting and location, browser plug-in types and versions, operating system and platform and other technology on the devices you use to access this website.</li>
                        <li><strong>Usage Data:</strong> includes information about how you use our website, products and services.</li>
                    </ul>
                </div>

                <div class="privacy-block">
                    <h2>3. How We Use Your Personal Data</h2>
                    <p>We will only use your personal data when the law allows us to. Most commonly, we will use your personal data in the following circumstances:</p>
                    <ul>
                        <li>Where we need to perform the contract we are about to enter into or have entered into with you.</li>
                        <li>Where it is necessary for our legitimate interests (or those of a third party) and your interests and fundamental rights do not override those interests.</li>
                        <li>Where we need to comply with a legal or regulatory obligation.</li>
                    </ul>
                </div>

                <div class="privacy-block">
                    <h2>4. Data Security</h2>
                    <p>We have put in place appropriate security measures to prevent your personal data from being accidentally lost, used or accessed in an unauthorized way, altered or disclosed. In addition, we limit access to your personal data to those employees, agents, contractors and other third parties who have a business need to know.</p>
                </div>

                <div class="privacy-block">
                    <h2>5. Data Retention</h2>
                    <p>We will only retain your personal data for as long as necessary to fulfill the purposes we collected it for, including for the purposes of satisfying any legal, accounting, or reporting requirements.</p>
                </div>

                <div class="privacy-block">
                    <h2>6. Your Legal Rights</h2>
                    <p>Under certain circumstances, you have rights under data protection laws in relation to your personal data, including the right to request access, correction, erasure, restriction, transfer, to object to processing, to portability of data and (where the lawful ground of processing is consent) to withdraw consent.</p>
                </div>

                <div class="privacy-block">
                    <h2>7. Contact Us</h2>
                    <p>If you have any questions about this privacy policy or our privacy practices, please contact us at:</p>
                    <div class="contact-info-box">
                        <p><strong>Brahmani Industries</strong></p>
                        <p>Email: info@brahmaniindustries.com</p>
                        <p>Phone: +91 123 456 7890</p>
                        <p>Address: GIDC, Industrial Estate, Jamnagar, Gujarat - 361004, India</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .page-banner {
            background-color: var(--primary);
            padding: 80px 0;
            text-align: center;
            margin-bottom: 0;
            border-bottom: 2px solid var(--secondary);
        }
        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 10px;
        }
        .page-subtitle {
            font-size: 1.1rem;
            color: var(--text-muted);
        }
        .section-padding {
            padding: 40px 0;
            background-color: var(--primary-light);
        }
        .privacy-content {
            max-width: 900px;
            margin: 0 auto;
            background: var(--primary-lighter);
            padding: 40px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            border-radius: 8px;
            border: 1px solid rgba(212, 175, 55, 0.1);
        }
        .privacy-block {
            margin-bottom: 30px;
        }
        .privacy-block h2 {
            font-size: 1.5rem;
            color: var(--secondary);
            margin-bottom: 15px;
            font-weight: 600;
            border-bottom: 2px solid rgba(212, 175, 55, 0.2);
            padding-bottom: 10px;
        }
        .privacy-block p {
            color: var(--text-muted);
            line-height: 1.8;
            margin-bottom: 15px;
        }
        .privacy-block ul {
            padding-left: 20px;
            margin-bottom: 15px;
        }
        .privacy-block li {
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 8px;
            list-style-type: disc;
        }
        .contact-info-box {
            background: var(--primary-light);
            padding: 20px;
            border-radius: 5px;
            border-left: 4px solid var(--secondary);
        }
        .contact-info-box p {
            margin-bottom: 5px;
        }
        @media (max-width: 768px) {
            .privacy-content {
                padding: 20px;
            }
            .page-title {
                font-size: 2rem;
            }
        }
    </style>
@endsection
