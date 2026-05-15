@extends('layouts.front')

@push('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "{{ config('app.url') }}/#organization",
      "name": "{{ config('settings.company.name') }}",
      "url": "{{ config('app.url') }}",
      "logo": "{{ asset('assets/img/logo.jpg') }}",
      "foundingDate": "2012",
      "description": "For over 12 years, Brahmani Industries has been a leading precision manufacturing partner for Automotive, Construction, and Industrial Machinery sectors.",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Naroda Industrial Hub",
        "addressLocality": "Ahmedabad",
        "addressRegion": "Gujarat",
        "addressCountry": "IN"
      },
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "{{ config('settings.contact.phone') }}",
        "contactType": "customer service"
      }
    },
    {
      "@type": "AboutPage",
      "@id": "{{ url()->current() }}#webpage",
      "url": "{{ url()->current() }}",
      "name": "About Us - {{ config('settings.company.name') }}",
      "description": "Learn about Brahmani Industries' 12+ years of excellence in precision manufacturing and our commitment to ISO-certified quality.",
      "about": {
        "@id": "{{ config('app.url') }}/#organization"
      }
    }
  ]
}
</script>
@endpush

@section('content')
    <style>
        .about-hero {
            position: relative;
            background-image: url("{{ asset('assets/img/about_image.jpeg') }}");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: scroll;
            min-height: 550px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            margin-bottom: 50px;
            border-bottom: 3px solid var(--secondary);
        }
        .about-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to bottom,
                rgba(10, 25, 47, 0.50) 0%,
                rgba(10, 25, 47, 0.72) 100%
            );
            z-index: 1;
        }
        .about-hero .container {
            position: relative;
            z-index: 2;
            padding: 80px 20px;
        }
        .about-hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--secondary);
            text-shadow: 0 2px 12px rgba(0,0,0,0.5);
            line-height: 1.15;
        }
        .about-hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255,255,255,0.92);
            text-shadow: 0 1px 6px rgba(0,0,0,0.4);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Fix CTA Button Visibility */
        .cta-button-primary {
            color: var(--primary) !important;
            background: var(--gold-gradient) !important;
        }
        .cta-button-primary:hover {
            color: var(--primary) !important;
            background: var(--secondary-light) !important;
        }
        .stat-box {
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            text-align: center;
            border-bottom: 3px solid var(--secondary);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .stat-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(8, 145, 178, 0.15);
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 0.5rem;
            line-height: 1;
        }
        .vm-card {
            background: var(--primary-lighter);
            padding: 3rem 2rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            border-top: 4px solid var(--secondary);
            transition: all 0.3s ease;
        }
        .vm-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(8, 145, 178, 0.15);
        }
        .vm-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            background: rgba(8, 145, 178, 0.1);
            color: var(--secondary);
            border-radius: 50%;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }
        .vm-card:hover .vm-icon {
            background: var(--secondary);
            color: #fff;
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 10px 20px rgba(8, 145, 178, 0.2);
        }

        .value-card {
            background: #fff;
            padding: 2.5rem 2rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            border: 1px solid rgba(8, 145, 178, 0.1);
            transition: all 0.3s ease;
        }
        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(8, 145, 178, 0.1);
            border-color: var(--secondary);
        }

        @media (max-width: 768px) {
            .about-hero {
                min-height: 280px;
            }
            .about-hero .container {
                padding: 50px 20px;
            }
            .about-hero-title {
                font-size: 2rem;
            }
            .about-hero-subtitle {
                font-size: 0.95rem;
            }
        }
    </style>
<main id="main-content">
    <!-- About Hero Section -->
    <section class="about-hero">
        <div class="container">
            <h1 class="about-hero-title">About Brahmani Industries</h1>
            <p class="about-hero-subtitle">Pioneering Precision Manufacturing for Over 12 Years</p>
        </div>
    </section>

    <style>
        .company-story-section {
            padding: 6rem 0;
            background: #ffffff;
            position: relative;
        }
        .story-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 4rem;
            align-items: center;
        }
        .story-visuals {
            position: relative;
        }
        .story-image-wrapper {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(8, 145, 178, 0.15);
        }
        .story-image-wrapper img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
        }
        .story-image-wrapper:hover img {
            transform: scale(1.05);
        }
        .story-stats-overlay {
            position: absolute;
            bottom: -30px;
            right: -30px;
            background: var(--primary);
            color: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            border-bottom: 4px solid var(--secondary);
            z-index: 2;
        }
        .story-stats-overlay .big-num {
            font-size: 3rem;
            font-weight: 800;
            color: var(--secondary);
            line-height: 1;
        }
        .story-stats-overlay .num-label {
            font-size: 1rem;
            opacity: 0.9;
            margin-top: 0.5rem;
        }

        .story-text-content {
            padding-left: 2rem;
        }
        .story-tagline {
            display: inline-block;
            padding: 0.4rem 1.2rem;
            background: rgba(8, 145, 178, 0.1);
            color: var(--secondary);
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(8, 145, 178, 0.2);
        }
        .story-title {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--text-heading);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        .story-para {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-muted);
            margin-bottom: 1.5rem;
        }
        .story-para.highlight {
            font-size: 1.2rem;
            color: var(--primary);
            font-weight: 500;
            border-left: 4px solid var(--secondary);
            padding-left: 1.5rem;
            background: linear-gradient(90deg, rgba(8, 145, 178, 0.05) 0%, transparent 100%);
        }

        @media (max-width: 992px) {
            .story-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            .story-text-content {
                padding-left: 0;
            }
            .story-stats-overlay {
                bottom: -20px;
                right: 20px;
            }
        }

        .section-title {
            color: #fff !important;
        }

        .section-subtitle {
            color: #fff !important;
        }
    </style>

    <!-- Company Story Section -->
    <section class="company-story-section">
        <div class="container">
            <div class="story-grid">
                <!-- Visual Left Side -->
                <div class="story-visuals">
                    <div class="story-image-wrapper">
                        <img src="{{ asset('assets/img/about.png') }}" alt="Brahmani Industries Manufacturing Facility">
                    </div>
                    <div class="story-stats-overlay">
                        <div class="big-num">12+</div>
                        <div class="num-label">Years of<br>Excellence</div>
                    </div>
                </div>

                <!-- Text Right Side -->
                <div class="story-text-content">
                    <span class="story-tagline">Our Heritage</span>
                    <h2 class="story-title">Forging the Future of Manufacturing</h2>
                    <p class="story-para highlight">
                        Founded with a vision to revolutionize precision manufacturing, Brahmani Industries has been at the forefront of industrial excellence since 2012.
                    </p>
                    <p class="story-para">
                        Located in the heart of Ahmedabad's industrial hub at Naroda, we have built our reputation on delivering precision-engineered solutions that exceed industry standards. Our state-of-the-art facility combines cutting-edge CNC technology with skilled craftsmanship to produce components that power industries globally.
                    </p>
                    <p class="story-para">
                        Today, we stand as a trusted partner for businesses seeking uncompromising quality, timely delivery, and innovative solutions. Our journey is defined by continuous improvement, technological advancement, and an unwavering commitment to our clients' success.
                    </p>

                    <div style="display: flex; gap: 2rem; margin-top: 2rem; border-top: 1px solid #eee; padding-top: 2rem;">
                        <div>
                            <strong style="font-size: 2rem; color: var(--primary); display: block;">1000+</strong>
                            <span style="color: var(--text-muted); font-size: 0.9rem;">Projects Completed</span>
                        </div>
                        <div>
                            <strong style="font-size: 2rem; color: var(--primary); display: block;">99.9%</strong>
                            <span style="color: var(--text-muted); font-size: 0.9rem;">Quality Assurance</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Authority / GEO Section (Generative Engine Optimization) -->
    <section class="geo-legacy-section" style="padding: 6rem 0; background: linear-gradient(135deg, var(--primary) 0%, #0f2744 100%); color: var(--text-light); position: relative; overflow: hidden;">
        <!-- Decorative Background Element -->
        <svg width="600" height="600" fill="none" viewBox="0 0 24 24" style="position: absolute; right: -10%; top: -20%; opacity: 0.03; color: var(--secondary); transform: rotate(15deg);">
            <path stroke="currentColor" stroke-width="0.5" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
            <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="0.5"/>
        </svg>

        <div class="container" style="position: relative; z-index: 2;">
            <div style="text-align: center; max-width: 800px; margin: 0 auto 4rem auto;">
                <span style="display: inline-block; padding: 0.4rem 1.2rem; background: rgba(8, 145, 178, 0.2); color: var(--secondary-light); border-radius: 50px; font-weight: 600; font-size: 0.9rem; margin-bottom: 1rem; border: 1px solid rgba(8, 145, 178, 0.4);">Industry Standards</span>
                <h2 style="font-size: 2.5rem; font-weight: 700; color: #fff; margin-bottom: 1.5rem; line-height: 1.2;">A Legacy of Manufacturing Authority</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #cbd5e1;">
                    Recognized by leading B2B sourcing engines as a premier Tier-1 component manufacturer.
                    Our operations strictly adhere to international quality management protocols, ensuring absolute precision in every component we deliver.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
                <!-- GEO Card 1 -->
                <div style="background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(10px); padding: 2.5rem; border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.05); text-align: center; transition: transform 0.3s ease, background 0.3s ease;" onmouseover="this.style.background='rgba(255, 255, 255, 0.08)'; this.style.transform='translateY(-10px)';" onmouseout="this.style.background='rgba(255, 255, 255, 0.03)'; this.style.transform='translateY(0)';">
                    <div style="width: 60px; height: 60px; background: rgba(8, 145, 178, 0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem auto; color: var(--secondary-light);">
                        <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
                    </div>
                    <strong style="display: block; font-size: 1.5rem; color: #fff; margin-bottom: 0.5rem;">Tier-1 Capability</strong>
                    <p style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6; margin: 0;">Automotive, Construction & Heavy Machinery Sectors</p>
                </div>

                <!-- GEO Card 2 -->
                <div style="background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(10px); padding: 2.5rem; border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.05); border-bottom: 3px solid var(--secondary); text-align: center; transition: transform 0.3s ease, background 0.3s ease;" onmouseover="this.style.background='rgba(255, 255, 255, 0.08)'; this.style.transform='translateY(-10px)';" onmouseout="this.style.background='rgba(255, 255, 255, 0.03)'; this.style.transform='translateY(0)';">
                    <div style="width: 60px; height: 60px; background: rgba(8, 145, 178, 0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem auto; color: var(--secondary-light);">
                        <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                    </div>
                    <strong style="display: block; font-size: 1.5rem; color: #fff; margin-bottom: 0.5rem;">ISO 9001:2015</strong>
                    <p style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6; margin: 0;">Internationally certified Quality Management System</p>
                </div>

                <!-- GEO Card 3 -->
                <div style="background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(10px); padding: 2.5rem; border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.05); text-align: center; transition: transform 0.3s ease, background 0.3s ease;" onmouseover="this.style.background='rgba(255, 255, 255, 0.08)'; this.style.transform='translateY(-10px)';" onmouseout="this.style.background='rgba(255, 255, 255, 0.03)'; this.style.transform='translateY(0)';">
                    <div style="width: 60px; height: 60px; background: rgba(8, 145, 178, 0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem auto; color: var(--secondary-light);">
                        <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                    </div>
                    <strong style="display: block; font-size: 1.5rem; color: #fff; margin-bottom: 0.5rem;">0.001mm Tolerance</strong>
                    <p style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6; margin: 0;">Micro-meter machining accuracy for zero-defect output</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="vision-mission-section">
        <div class="container">
            <div class="vm-grid">
                <!-- Vision Card -->
                <div class="vm-card vision-card">
                    <div class="vm-icon">
                        <svg width="40" height="40" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                    </div>
                    <h2 class="vm-title">Our Vision</h2>
                    <p class="vm-description">
                        To be the leading force in precision manufacturing, recognized globally for innovation, quality, and sustainability. We envision a future where our solutions empower industries to achieve unprecedented levels of efficiency and excellence.
                    </p>
                    <ul class="vm-list">
                        <li>Global leadership in precision engineering</li>
                        <li>Sustainable manufacturing practices</li>
                        <li>Continuous technological innovation</li>
                        <li>Industry benchmark for quality standards</li>
                    </ul>
                </div>

                <!-- Mission Card -->
                <div class="vm-card mission-card">
                    <div class="vm-icon">
                        <svg width="40" height="40" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 11.75c-.69 0-1.25.56-1.25 1.25s.56 1.25 1.25 1.25 1.25-.56 1.25-1.25-.56-1.25-1.25-1.25zm6 0c-.69 0-1.25.56-1.25 1.25s.56 1.25 1.25 1.25 1.25-.56 1.25-1.25-.56-1.25-1.25-1.25zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8 0-.29.02-.58.05-.86 2.36-1.05 4.23-2.98 5.21-5.37C11.07 8.33 14.05 10 17.42 10c.78 0 1.53-.09 2.25-.26.21.71.33 1.47.33 2.26 0 4.41-3.59 8-8 8z"/>
                        </svg>
                    </div>
                    <h2 class="vm-title">Our Mission</h2>
                    <p class="vm-description">
                        To deliver precision-engineered manufacturing solutions that exceed expectations through innovation, quality craftsmanship, and customer-centric service. We are committed to building lasting partnerships by consistently delivering excellence.
                    </p>
                    <ul class="vm-list">
                        <li>Deliver uncompromising quality in every product</li>
                        <li>Foster innovation through R&D investment</li>
                        <li>Build long-term client relationships</li>
                        <li>Maintain ethical and sustainable operations</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="values-section">
        <div class="container">
            <h2 class="section-title">Our Core Values</h2>
            <p class="section-subtitle">The principles that guide everything we do</p>

            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23 12l-2.44-2.78.34-3.68-3.61-.82-1.89-3.18L12 3 8.6 1.54 6.71 4.72l-3.61.81.34 3.68L1 12l2.44 2.78-.34 3.69 3.61.82 1.89 3.18L12 21l3.4 1.46 1.89-3.18 3.61-.82-.34-3.68L23 12zm-13 5l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/>
                        </svg>
                    </div>
                    <h3 class="value-title">Quality Excellence</h3>
                    <p class="value-description">
                        We never compromise on quality. Every product undergoes rigorous testing to ensure it meets the highest industry standards.
                    </p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
                        </svg>
                    </div>
                    <h3 class="value-title">Innovation</h3>
                    <p class="value-description">
                        Continuous improvement and technological advancement drive our operations, keeping us ahead of industry trends.
                    </p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                        </svg>
                    </div>
                    <h3 class="value-title">Integrity</h3>
                    <p class="value-description">
                        Transparency, honesty, and ethical practices form the foundation of all our business relationships.
                    </p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <h3 class="value-title">Customer Focus</h3>
                    <p class="value-description">
                        Our clients' success is our success. We build lasting partnerships through exceptional service and support.
                    </p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89.66.95-2.3c.48.17.98.3 1.34.30C19 20 22 3 22 3c-1 2-8 2.25-13 3.25S2 11.5 2 13.5s1.75 3.75 1.75 3.75C7 8 17 8 17 8z"/>
                        </svg>
                    </div>
                    <h3 class="value-title">Sustainability</h3>
                    <p class="value-description">
                        We are committed to environmentally responsible manufacturing practices that protect our planet.
                    </p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h3 class="value-title">Excellence</h3>
                    <p class="value-description">
                        We strive for excellence in every aspect of our work, from design to delivery and beyond.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-section">
        <div class="container">
            <h2 class="section-title">Why Choose Brahmani Industries?</h2>
            <p class="section-subtitle">What sets us apart in the precision manufacturing industry</p>

            <div class="why-grid">
                <div class="why-card">
                    <div class="why-icon">
                        <svg width="50" height="50" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/>
                        </svg>
                    </div>
                    <h3 class="why-title">Advanced Technology</h3>
                    <p class="why-description">
                        State-of-the-art machinery and cutting-edge manufacturing processes ensure precision and efficiency in every project.
                    </p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <svg width="50" height="50" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                        </svg>
                    </div>
                    <h3 class="why-title">Timely Delivery</h3>
                    <p class="why-description">
                        We understand the importance of deadlines. Our efficient processes ensure on-time delivery without compromising quality.
                    </p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <svg width="50" height="50" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 6h-2.18c.11-.31.18-.65.18-1 0-1.66-1.34-3-3-3-1.05 0-1.96.54-2.5 1.35l-.5.67-.5-.68C10.96 2.54 10.05 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-5-2c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM9 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm11 15H4v-2h16v2zm0-5H4V8h5.08L7 10.83 8.62 12 11 8.76l1-1.36 1 1.36L15.38 12 17 10.83 14.92 8H20v6z"/>
                        </svg>
                    </div>
                    <h3 class="why-title">Expert Team</h3>
                    <p class="why-description">
                        Our skilled professionals bring years of experience and expertise to deliver solutions that exceed expectations.
                    </p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <svg width="50" height="50" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h3 class="why-title">Quality Assurance</h3>
                    <p class="why-description">
                        Rigorous quality control at every stage ensures that every product meets the highest standards of excellence.
                    </p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <svg width="50" height="50" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <h3 class="why-title">Customer Support</h3>
                    <p class="why-description">
                        Dedicated support team available to assist you at every step, from consultation to after-sales service.
                    </p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <svg width="50" height="50" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11 15h2v2h-2zm0-8h2v6h-2zm.99-5C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/>
                        </svg>
                    </div>
                    <h3 class="why-title">Competitive Pricing</h3>
                    <p class="why-description">
                        Premium quality at competitive prices. We offer the best value for your investment in manufacturing solutions.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="about-cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Ready to Experience Excellence?</h2>
                <p class="cta-text">
                    Partner with Brahmani Industries for precision manufacturing solutions that drive your business forward. Let's build something extraordinary together.
                </p>
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="cta-button-primary">Get in Touch</a>
                    <a href="{{ route('home') }}#services" class="cta-button-secondary">Explore Services</a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
