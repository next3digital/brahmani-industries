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
      "description": "{{ config('settings.company.description') }}",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "{{ config('settings.contact.phone') }}",
        "contactType": "customer service",
        "email": "{{ config('settings.contact.email') }}"
      },
      "sameAs": [
        "{{ config('settings.social_media.facebook') }}",
        "{{ config('settings.social_media.twitter') }}",
        "{{ config('settings.social_media.linkedin') }}",
        "{{ config('settings.social_media.instagram') }}",
        "{{ config('settings.social_media.youtube') }}"
      ]
    },
    {
      "@type": "WebSite",
      "@id": "{{ config('app.url') }}/#website",
      "url": "{{ config('app.url') }}",
      "name": "{{ config('settings.company.name') }}",
      "description": "Precision manufacturing company in Ahmedabad, Gujarat. ISO 9001:2015 certified CNC components, flanges, bushes, and custom engineering solutions.",
      "publisher": {
        "@id": "{{ config('app.url') }}/#organization"
      },
      "potentialAction": {
        "@type": "SearchAction",
        "target": {
          "@type": "EntryPoint",
          "urlTemplate": "{{ config('app.url') }}/blog?search={search_term_string}"
        },
        "query-input": "required name=search_term_string"
      }
    }
  ]
}
</script>

<!-- FAQ Schema for AEO (Answer Engine Optimization) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What industries do you serve?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We serve a wide range of industries including Automotive, Construction, Industrial Machinery, Agriculture, and Electrical sectors. Our precision components are designed to meet the specific requirements of each industry."
      }
    },
    {
      "@type": "Question",
      "name": "Do you offer custom manufacturing solutions?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we specialize in custom manufacturing tailored to your specific needs. Our engineering team works closely with clients to design and produce components that meet exact specifications and performance requirements."
      }
    },
    {
      "@type": "Question",
      "name": "What materials do you work with?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We work with a variety of materials including Stainless Steel, Mild Steel, Brass, Copper, Aluminum, and various alloys. We can advise on the best material selection based on your application."
      }
    },
    {
      "@type": "Question",
      "name": "Are your products ISO certified?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, Brahmani Industries is ISO 9001:2015 certified. We maintain strict quality control processes throughout our manufacturing to ensure every product meets international quality standards."
      }
    },
    {
      "@type": "Question",
      "name": "What is your typical lead time?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Lead times vary depending on the complexity of the project and order volume. Typically, standard orders are processed within 2-4 weeks. We also offer expedited services for urgent requirements."
      }
    },
    {
      "@type": "Question",
      "name": "Do you ship internationally?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we ship our products globally. We have experience in international logistics and ensure that your order is packaged securely and delivered on time, regardless of your location."
      }
    }
  ]
}
</script>
@endpush

@section('content')
<main id="main-content">
    <!-- Hero Section -->
    <section class="hero-home" id="hero" aria-label="Welcome to Brahmani Industries">
        <div class="container">
            <div class="hero-home-content">
                <h1 class="hero-home-title">Brahmani <span>Industries</span></h1>
                <p class="hero-home-subtitle">
                    Precision Engineering Excellence Since 2012
                </p>
                <p class="hero-home-description">
                    For over 12 years, we've been delivering precision-engineered solutions that drive industries forward.
                    Our commitment to quality and innovation sets us apart in the manufacturing world.
                </p>
                <div class="hero-home-buttons">
                    <a href="{{ route('products') }}" class="hero-btn-primary">Explore Products</a>
                    <a href="{{ route('contact') }}" class="hero-btn-secondary">Get a Quote</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-home-section" id="about-us" aria-labelledby="about-heading">
        <div class="container">
            <div class="about-home-grid">
                <div class="about-home-left">
                    <span class="section-label">About Us</span>
                    <h2 id="about-heading" class="section-title-home">Precision Manufacturing Excellence</h2>
                    <p class="about-home-text">
                        With over 12 years of excellence in precision manufacturing, Brahmani Industries has established
                        itself as a trusted partner for industrial solutions. We specialize in manufacturing high-quality
                        components including flanges, bushes, fasteners, and precision-engineered parts.
                    </p>
                    <p class="about-home-text">
                        Our state-of-the-art CNC machinery and commitment to quality ensure that every product meets the
                        highest industry standards. We serve diverse sectors including automotive, construction, and
                        industrial machinery.
                    </p>
                    <div class="about-home-features">
                        <div class="feature-home-item">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                            </svg>
                            <span>Advanced CNC Technology</span>
                        </div>
                        <div class="feature-home-item">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                            </svg>
                            <span>ISO Certified Quality</span>
                        </div>
                        <div class="feature-home-item">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                            </svg>
                            <span>On-Time Delivery</span>
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="btn-home-primary">Learn More About Us</a>
                </div>
                <div class="about-home-right">
                    <div class="about-home-image">
                        <img src="{{ asset('assets/img/hero-banner.png') }}" alt="About Brahmani Industries Precision Manufacturing" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-home-section" id="company-statistics" aria-label="Company Experience and Statistics">
        <div class="container">
            <div class="stats-home-grid">
                <div class="stat-home-card">
                    <div class="stat-home-icon">
                        <svg width="40" height="40" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" />
                        </svg>
                    </div>
                    <h3 class="stat-home-number">12+</h3>
                    <p class="stat-home-label">Years Experience</p>
                </div>
                <div class="stat-home-card">
                    <div class="stat-home-icon">
                        <svg width="40" height="40" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                        </svg>
                    </div>
                    <h3 class="stat-home-number">500+</h3>
                    <p class="stat-home-label">Happy Clients</p>
                </div>
                <div class="stat-home-card">
                    <div class="stat-home-icon">
                        <svg width="40" height="40" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z" />
                        </svg>
                    </div>
                    <h3 class="stat-home-number">1000+</h3>
                    <p class="stat-home-label">Projects Completed</p>
                </div>
                <div class="stat-home-card">
                    <div class="stat-home-icon">
                        <svg width="40" height="40" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                        </svg>
                    </div>
                    <h3 class="stat-home-number">99.9%</h3>
                    <p class="stat-home-label">Quality Assured</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Products Section -->
    <section class="featured-products-home-section" id="featured-products" aria-labelledby="products-heading">
        <div class="container">
            <div class="section-header-center">
                <span class="section-label">Our Products</span>
                <h2 id="products-heading" class="section-title-home">Featured Products</h2>
                <p class="section-subtitle-home">Precision-engineered components for diverse industrial applications</p>
            </div>

            <div class="products-home-grid">
                @forelse($featured_products as $product)
                <!-- Product {{ $loop->iteration }}: {{ $product->name }} -->
                <div class="product-home-card">
                    <div class="product-home-image">
                        @if($product->getFirstMediaUrl('main_image'))
                            <img src="{{ $product->getFirstMediaUrl('main_image') }}" alt="{{ $product->name }} - Precision Component" loading="lazy">
                        @else
                            <img src="{{ asset('assets/img/hero-banner.png') }}" alt="{{ $product->name }} - Precision Component" loading="lazy">
                        @endif
                        <div class="product-overlay">
                            <a href="{{ route('product.details', $product->slug) }}" class="product-overlay-btn">View Details</a>
                        </div>
                        @if($product->is_featured)
                            <span class="product-home-badge popular">Featured</span>
                        @endif
                    </div>
                    <div class="product-home-content">
                        <div class="product-icon">
                            {{-- Use a default icon or add an icon field to the product model if needed. For now, using a generic one --}}
                            <svg width="32" height="32" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                            </svg>
                        </div>
                        <h3 class="product-home-title">{{ $product->name }}</h3>
                        <p class="product-home-desc">
                            {{ Str::limit($product->short_description, 100) }}
                        </p>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>No featured products available at the moment.</p>
                </div>
                @endforelse
            </div>

            <div class="section-cta-center">
                <a href="{{ route('products') }}" class="btn-home-secondary">View All Products</a>
            </div>
        </div>
    </section>

    <!-- Industries We Serve Section (SEO Optimized) -->
    <section class="industries-home-section" id="industries-we-serve" aria-labelledby="industries-heading" style="padding: 5rem 0; background-color: var(--bg-light, #f9fafb);">
        <div class="container">
            <div class="section-header-center">
                <span class="section-label" style="color: #f8fafc;">Target Markets</span>
                <h2 id="industries-heading" class="section-title-home" style="color: white !important;">Industries We Serve</h2>
                <p class="section-subtitle-home" style="color: #fff !important;">Delivering precision manufacturing solutions tailored to the stringent demands of global industries.</p>
            </div>

            <div class="industries-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 3rem;">
                <!-- Automotive -->
                <article class="industry-card" style="background: #fff; padding: 2.5rem 1.5rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center; border-bottom: 4px solid var(--secondary, #0891b2);">
                    <div class="industry-icon" aria-hidden="true" style="margin-bottom: 1.5rem; color: var(--secondary, #0891b2);">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/>
                        </svg>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 1rem; color: var(--text-dark, #1f2937);">Automotive Industry</h3>
                    <p style="color: var(--text-muted, #6b7280); font-size: 0.95rem; line-height: 1.6;">Providing high-precision <strong>CNC turned components</strong>, transmission parts, and custom fasteners designed for modern automotive efficiency and safety.</p>
                </article>

                <!-- Industrial Machinery -->
                <article class="industry-card" style="background: #fff; padding: 2.5rem 1.5rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center; border-bottom: 4px solid var(--secondary, #0891b2);">
                    <div class="industry-icon" aria-hidden="true" style="margin-bottom: 1.5rem; color: var(--secondary, #0891b2);">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.06-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.58-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.58,0.22L2.73,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.06,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.58,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.43-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.58-0.22l1.92-3.32c0.12-0.22,0.07-0.49-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z"/>
                        </svg>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 1rem; color: var(--text-dark, #1f2937);">Heavy Machinery</h3>
                    <p style="color: var(--text-muted, #6b7280); font-size: 0.95rem; line-height: 1.6;">Manufacturing heavy-duty flanges, bushings, and resilient structural parts specifically engineered to withstand extreme industrial operations.</p>
                </article>

                <!-- Construction -->
                <article class="industry-card" style="background: #fff; padding: 2.5rem 1.5rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center; border-bottom: 4px solid var(--secondary, #0891b2);">
                    <div class="industry-icon" aria-hidden="true" style="margin-bottom: 1.5rem; color: var(--secondary, #0891b2);">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 12h3v8h14v-8h3L12 2zm3 10h-6v-2h6v2z"/>
                        </svg>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 1rem; color: var(--text-dark, #1f2937);">Construction</h3>
                    <p style="color: var(--text-muted, #6b7280); font-size: 0.95rem; line-height: 1.6;">Supplying robust <strong>construction fasteners</strong>, steel brackets, and structural fittings that guarantee stability and longevity in commercial projects.</p>
                </article>

                <!-- Electrical & Energy -->
                <article class="industry-card" style="background: #fff; padding: 2.5rem 1.5rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center; border-bottom: 4px solid var(--secondary, #0891b2);">
                    <div class="industry-icon" aria-hidden="true" style="margin-bottom: 1.5rem; color: var(--secondary, #0891b2);">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 2v11h3v9l7-12h-4l4-8z"/>
                        </svg>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 1rem; color: var(--text-dark, #1f2937);">Electrical & Energy</h3>
                    <p style="color: var(--text-muted, #6b7280); font-size: 0.95rem; line-height: 1.6;">Precision machining for conductive components, brass fittings, and specialized parts for the renewable energy and power sectors.</p>
                </article>
            </div>

            <div class="seo-content-summary" style="margin-top: 4rem; padding: 2rem; background: #fff; border-radius: 12px; border: 1px solid rgba(8, 145, 178, 0.1); text-align: center; max-width: 900px; margin-left: auto; margin-right: auto; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                <p style="color: var(--text-muted, #4b5563); font-size: 1rem; line-height: 1.8; margin:0;">
                    As a leading <strong>precision manufacturing company</strong>, Brahmani Industries is committed to producing world-class <strong>CNC machined parts</strong>, <strong>stainless steel flanges</strong>, and <strong>custom industrial fasteners</strong>. Our state-of-the-art manufacturing plant utilizes cutting-edge technology ensuring seamless product delivery aligned strictly with global quality assurance protocols. From conceptual design to high-volume production, we are your trusted manufacturing partner.
                </p>
            </div>
        </div>
    </section>

    <!-- Authority / GEO Section (Generative Engine Optimization) -->
    <section class="geo-authority-section" id="industry-impact" aria-labelledby="geo-heading" style="padding: 5rem 0; background: var(--primary-light); border-top: 1px solid rgba(8, 145, 178, 0.1);">
        <div class="container">
            <div class="geo-content" style="max-width: 900px; margin: 0 auto; text-align: center;">
                <span class="section-label">Industry Impact</span>
                <h2 id="geo-heading" class="section-title-home" style="margin-bottom: 2rem;">Industry Standard Precision & Reliability</h2>

                <div style="background: var(--primary-lighter); padding: 2.5rem; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-left: 4px solid var(--secondary); margin-bottom: 3rem; text-align: left; position: relative;">
                    <svg width="40" height="40" fill="var(--secondary)" opacity="0.1" style="position: absolute; top: 1rem; right: 1rem;" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.714 4.075-8.868 8.983-10.609l.995 2.151c-2.433.917-3.995 3.638-3.995 5.849h3v10h-8.983zm-14.017 0v-7.391c0-5.714 4.075-8.868 8.983-10.609l.995 2.151c-2.433.917-3.995 3.638-3.995 5.849h3v10h-8.983z"/></svg>
                    <blockquote style="font-size: 1.2rem; font-style: italic; color: var(--text-dark); margin: 0; line-height: 1.8;">
                        "In the era of rapid industrialization, precision is not just an asset—it's the core of reliability. Brahmani Industries provides components with micro-meter accuracy, ensuring virtually 0% failure rate in critical infrastructures across automotive and construction sectors."
                    </blockquote>
                </div>

                <div style="display: flex; justify-content: space-around; flex-wrap: wrap; gap: 1.5rem;">
                    <div style="flex: 1; min-width: 220px; background: #fff; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); transition: transform 0.3s ease;">
                        <strong style="display: block; font-size: 2.5rem; color: var(--secondary); font-weight: 700; line-height: 1;">0.001mm</strong>
                        <span style="color: var(--text-muted); font-size: 0.95rem; display: block; margin-top: 0.5rem; font-weight: 500;">Machining Tolerance</span>
                    </div>
                    <div style="flex: 1; min-width: 220px; background: #fff; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); transition: transform 0.3s ease;">
                        <strong style="display: block; font-size: 2.5rem; color: var(--secondary); font-weight: 700; line-height: 1;">100%</strong>
                        <span style="color: var(--text-muted); font-size: 0.95rem; display: block; margin-top: 0.5rem; font-weight: 500;">ISO Compliant Process</span>
                    </div>
                    <div style="flex: 1; min-width: 220px; background: #fff; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); transition: transform 0.3s ease;">
                        <strong style="display: block; font-size: 2.5rem; color: var(--secondary); font-weight: 700; line-height: 1;">24/7</strong>
                        <span style="color: var(--text-muted); font-size: 0.95rem; display: block; margin-top: 0.5rem; font-weight: 500;">Production Capabilities</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-home-section" id="why-choose-us" aria-labelledby="why-choose-heading">
        <div class="container">
            <div class="section-header-center">
                <span class="section-label">Why Choose Us</span>
                <h2 id="why-choose-heading" class="section-title-home">What Sets Us Apart</h2>
                <p class="section-subtitle-home">Commitment to excellence in every aspect of our business</p>
            </div>

            <div class="why-choose-home-grid">
                <div class="why-choose-card">
                    <div class="why-choose-icon">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z" />
                        </svg>
                    </div>
                    <h3>Advanced Technology</h3>
                    <p>State-of-the-art CNC machinery and modern manufacturing processes ensure precision and consistency.
                    </p>
                </div>

                <div class="why-choose-card">
                    <div class="why-choose-icon">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" />
                        </svg>
                    </div>
                    <h3>Quality Assurance</h3>
                    <p>100% quality tested products with rigorous inspection at every stage of manufacturing.</p>
                </div>

                <div class="why-choose-card">
                    <div class="why-choose-icon">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                        </svg>
                    </div>
                    <h3>On-Time Delivery</h3>
                    <p>Efficient production processes and reliable logistics ensure timely delivery of your orders.</p>
                </div>

                <div class="why-choose-card">
                    <div class="why-choose-icon">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                        </svg>
                    </div>
                    <h3>Expert Team</h3>
                    <p>Skilled professionals with years of experience in precision manufacturing and engineering.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Certifications Section -->
    <section class="certifications-home-section" id="certifications" aria-labelledby="certifications-heading">
        <div class="container">
            <div class="section-header-center">
                <span class="section-label">Quality Assurance</span>
                <h2 id="certifications-heading" class="section-title-home">Our Certifications</h2>
                <p class="section-subtitle-home">Committed to international quality standards and industry best practices</p>
            </div>

            <div class="certifications-grid">
                <!-- Certification 1: ISO 9001 -->
                <div class="certification-card">
                    <div class="certification-icon">
                        <svg width="60" height="60" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/>
                        </svg>
                    </div>
                    <h3 class="certification-title">ISO 9001:2015</h3>
                    <p class="certification-desc">Quality Management System certification ensuring consistent product quality and customer satisfaction.</p>
                </div>

                <!-- Certification 2: ISO 14001 -->
                <div class="certification-card">
                    <div class="certification-icon">
                        <svg width="60" height="60" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89.66.95-2.3c.48.17.98.3 1.34.30C19 20 22 3 22 3c-1 2-8 2.25-13 3.25S2 11.5 2 13.5s1.75 3.75 1.75 3.75C7 8 17 8 17 8z"/>
                        </svg>
                    </div>
                    <h3 class="certification-title">ISO 14001:2015</h3>
                    <p class="certification-desc">Environmental Management System certification demonstrating our commitment to sustainable manufacturing.</p>
                </div>

                <!-- Certification 3: CE Marking -->
                <div class="certification-card">
                    <div class="certification-icon">
                        <svg width="60" height="60" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                        </svg>
                    </div>
                    <h3 class="certification-title">CE Marking</h3>
                    <p class="certification-desc">European conformity certification ensuring our products meet EU safety and quality standards.</p>
                </div>

                <!-- Certification 4: OHSAS -->
                <div class="certification-card">
                    <div class="certification-icon">
                        <svg width="60" height="60" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                        </svg>
                    </div>
                    <h3 class="certification-title">OHSAS 18001</h3>
                    <p class="certification-desc">Occupational Health & Safety certification ensuring safe working environment for our team.</p>
                </div>
            </div>

            <div class="certifications-footer">
                <p class="certifications-note">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                    </svg>
                    All certifications are regularly audited and maintained to ensure compliance with the latest industry standards.
                </p>
            </div>
        </div>
    </section>

    <!-- Latest Blog Section -->
    <section class="blog-home-section" id="latest-insights" aria-labelledby="blog-heading">
        <div class="container">
            <div class="section-header-center">
                <span class="section-label">Our Blog</span>
                <h2 id="blog-heading" class="section-title-home">Latest Insights</h2>
                <p class="section-subtitle-home">Stay updated with industry news and manufacturing trends</p>
            </div>

            <div class="blog-home-grid">
                @forelse ($latest_blogs as $blog)
                <!-- Blog Post {{ $loop->iteration }} -->
                <article class="blog-home-card">
                    <div class="blog-home-image">
                        @if ($blog->main_image && $blog->main_image->getUrl())
                            <img src="{{ $blog->main_image->getUrl() }}" alt="{{ $blog->title }}" loading="lazy">
                        @else
                            <img src="{{ asset('assets/img/news/04.jpg') }}" alt="{{ $blog->title }}" loading="lazy">
                        @endif
                        <span class="blog-home-category">Article</span>
                    </div>
                    <div class="blog-home-content">
                        <div class="blog-home-meta">
                            <span class="blog-home-date">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z" />
                                </svg>
                                {{ $blog->created_at->format('M d, Y') }}
                            </span>
                            <span class="blog-home-read-time">{{ ceil(str_word_count(strip_tags($blog->description ?? '')) / 200) }} min read</span>
                        </div>
                        <h3 class="blog-home-title">
                            <a href="{{ route('blog', $blog->slug) }}" title="{{ $blog->title }}">{{ Str::limit($blog->title, 60) }}</a>
                        </h3>
                        <p class="blog-home-excerpt">
                            {{ Str::limit(strip_tags($blog->description ?? $blog->meta_description), 120) }}
                        </p>
                        <a href="{{ route('blog', $blog->slug) }}" title="{{ $blog->title }}" class="blog-home-link">Read More →</a>
                    </div>
                </article>
                @empty
                <!-- No blogs available -->
                <div class="no-blogs-message" style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                    <svg width="64" height="64" fill="currentColor" viewBox="0 0 24 24" style="opacity: 0.3; margin-bottom: 1rem; color: var(--secondary);">
                        <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                    </svg>
                    <h3 style="color: var(--secondary); margin-bottom: 0.5rem;">No Blog Posts Yet</h3>
                    <p style="color: var(--text-muted);">Check back soon for industry insights and updates.</p>
                </div>
                @endforelse
            </div>

            <div class="section-cta-center">
                <a href="{{ route('blog') }}" class="btn-home-secondary">View All Articles</a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <!-- FAQ Section -->
    <section class="faq-home-section" id="frequently-asked-questions" aria-labelledby="faq-heading">
        <div class="container">
            <div class="section-header-center">
                <span class="section-label">Common Questions</span>
                <h2 id="faq-heading" class="section-title-home">Frequently Asked Questions</h2>
                <p class="section-subtitle-home">Find answers to common questions about our manufacturing services</p>
            </div>

            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What industries do you serve?</h3>
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>We serve a wide range of industries including Automotive, Construction, Industrial Machinery, Agriculture, and Electrical sectors. Our precision components are designed to meet the specific requirements of each industry.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Do you offer custom manufacturing solutions?</h3>
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we specialize in custom manufacturing tailored to your specific needs. Our engineering team works closely with clients to design and produce components that meet exact specifications and performance requirements.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What materials do you work with?</h3>
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>We work with a variety of materials including Stainless Steel, Mild Steel, Brass, Copper, Aluminum, and various alloys. We can advise on the best material selection based on your application.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Are your products ISO certified?</h3>
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, Brahmani Industries is ISO 9001:2015 certified. We maintain strict quality control processes throughout our manufacturing to ensure every product meets international quality standards.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What is your typical lead time?</h3>
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Lead times vary depending on the complexity of the project and order volume. Typically, standard orders are processed within 2-4 weeks. We also offer expedited services for urgent requirements.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Do you ship internationally?</h3>
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we ship our products globally. We have experience in international logistics and ensure that your order is packaged securely and delivered on time, regardless of your location.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-home-section" id="contact-cta" aria-labelledby="cta-heading">
        <div class="container">
            <div class="cta-home-content">
                <h2 id="cta-heading" class="cta-home-title">Ready to Start Your Project?</h2>
                <p class="cta-home-text">Let's discuss how Brahmani Industries can provide precision-engineered solutions
                    for your manufacturing needs.</p>
                <div class="cta-home-buttons">
                    <a href="{{ route('contact') }}" class="cta-home-btn-primary">Get a Quote</a>
                    <a href="{{ route('about') }}" class="cta-home-btn-secondary">Learn More</a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
