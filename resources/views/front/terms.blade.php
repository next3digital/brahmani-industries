@extends('layouts.front')

@section('content')
    <!-- Banner Section -->
    <section class="page-banner">
        <div class="container">
            <div class="page-banner-content">
                <h1 class="page-title">Terms & Conditions</h1>
                <p class="page-subtitle">Last Updated: {{ date('F d, Y') }}</p>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="terms-section section-padding">
        <div class="container">
            <div class="privacy-content">
                <div class="privacy-block">
                    <h2>1. Agreement to Terms</h2>
                    <p>These Terms and Conditions constitute a legally binding agreement made between you, whether personally or on behalf of an entity ("you") and Brahmani Industries ("we," "us," or "our"), concerning your access to and use of the website as well as any other media form, media channel, mobile website or mobile application related, linked, or otherwise connected thereto (collectively, the "Site").</p>
                    <p>You agree that by accessing the Site, you have read, understood, and agree to be bound by all of these Terms and Conditions. If you do not agree with all of these Terms and Conditions, then you are expressly prohibited from using the Site and you must discontinue use immediately.</p>
                </div>

                <div class="privacy-block">
                    <h2>2. Intellectual Property Rights</h2>
                    <p>Unless otherwise indicated, the Site is our proprietary property and all source code, databases, functionality, software, website designs, audio, video, text, photographs, and graphics on the Site (collectively, the "Content") and the trademarks, service marks, and logos contained therein (the "Marks") are owned or controlled by us or licensed to us, and are protected by copyright and trademark laws and various other intellectual property rights and unfair competition laws.</p>
                </div>

                <div class="privacy-block">
                    <h2>3. User Representations</h2>
                    <p>By using the Site, you represent and warrant that:</p>
                    <ul>
                        <li>All registration information you submit will be true, accurate, current, and complete.</li>
                        <li>You will maintain the accuracy of such information and promptly update such registration information as necessary.</li>
                        <li>You have the legal capacity and you agree to comply with these Terms and Conditions.</li>
                        <li>You will not access the Site through automated or non-human means, whether through a bot, script or otherwise.</li>
                        <li>You will not use the Site for any illegal or unauthorized purpose.</li>
                    </ul>
                </div>

                <div class="privacy-block">
                    <h2>4. Prohibited Activities</h2>
                    <p>You may not access or use the Site for any purpose other than that for which we make the Site available. The Site may not be used in connection with any commercial endeavors except those that are specifically endorsed or approved by us.</p>
                </div>

                <div class="privacy-block">
                    <h2>5. Governing Law</h2>
                    <p>These Terms and Conditions and your use of the Site are governed by and construed in accordance with the laws of India applicable to agreements made and to be entirely performed within India, without regard to its conflict of law principles.</p>
                </div>

                <div class="privacy-block">
                    <h2>6. Modifications and Interruptions</h2>
                    <p>We reserve the right to change, modify, or remove the contents of the Site at any time or for any reason at our sole discretion without notice. However, we have no obligation to update any information on our Site. We also reserve the right to modify or discontinue all or part of the Site without notice at any time.</p>
                </div>

                <div class="privacy-block">
                    <h2>7. Contact Us</h2>
                    <p>In order to resolve a complaint regarding the Site or to receive further information regarding use of the Site, please contact us at:</p>
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
