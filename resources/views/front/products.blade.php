@extends('layouts.front')

@push('schema')
@if($products->count() > 0)
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "name": "Our Products - {{ config('settings.company.name') }}",
  "description": "Browse our precision-engineered components and manufacturing products.",
  "url": "{{ url()->current() }}",
  "itemListElement": [
    @foreach($products as $index => $product)
    {
      "@type": "ListItem",
      "position": {{ $index + 1 }},
      "item": {
        "@type": "Product",
        "url": "{{ route('product.details', $product->slug) }}",
        "name": "{{ $product->name }}",
        "image": "{{ $product->getFirstMediaUrl('main_image') ? $product->getFirstMediaUrl('main_image') : asset('assets/img/placeholder-product.jpg') }}",
        "description": "{{ strip_tags($product->short_description) }}"
      }
    }{{ !$loop->last ? ',' : '' }}
    @endforeach
  ]
}
</script>
@endif

<!-- FAQ Schema for AEO (Answer Engine Optimization) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What industries do your products serve?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our precision-engineered products serve Automotive, Construction, Industrial Machinery, Agriculture, and Electrical sectors."
      }
    },
    {
      "@type": "Question",
      "name": "Are your products ISO certified?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, all products manufactured by Brahmani Industries strictly adhere to our ISO 9001:2015 certified Quality Management System."
      }
    },
    {
      "@type": "Question",
      "name": "Do you offer custom manufacturing?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Absolutely. We specialize in custom solutions with micro-meter tolerances (down to 0.001mm) tailored to your exact blueprints."
      }
    }
  ]
}
</script>
@endpush

@section('content')
    <style>
        .products-hero {
            position: relative;
            background-image: url("{{ asset('assets/img/product_banner.jpeg') }}");
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
        .products-hero::before {
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
        .products-hero .container {
            position: relative;
            z-index: 2;
            padding: 80px 20px;
        }
        .products-hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--secondary);
            text-shadow: 0 2px 12px rgba(0,0,0,0.5);
            line-height: 1.15;
        }
        .products-hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255,255,255,0.92);
            text-shadow: 0 1px 6px rgba(0,0,0,0.4);
            max-width: 600px;
            margin: 0 auto;
        }
        @media (max-width: 768px) {
            .products-hero {
                min-height: 280px;
            }
            .products-hero .container {
                padding: 50px 20px;
            }
            .products-hero-title {
                font-size: 2rem;
            }
            .products-hero-subtitle {
                font-size: 0.95rem;
            }
        }
        
        /* Force Product Grid to 3 Columns instead of 4 */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }
        @media (min-width: 992px) {
            .products-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
    </style>

<main id="main-content">
    <!-- Products Hero Section -->
    <section class="products-hero">
        <div class="container">
            <h1 class="products-hero-title">Our Products</h1>
            <p class="products-hero-subtitle">Precision-Engineered Components for Industrial Excellence</p>
        </div>
    </section>

    <!-- Products Introduction -->
    <section class="products-intro-section">
        <div class="container">
            <div class="intro-content">
                <h2 class="section-title">Quality Products, Precision Crafted</h2>
                <p class="intro-text">
                    At Brahmani Industries, we manufacture a comprehensive range of precision-engineered components designed to meet the demanding requirements of modern industry. Each product is crafted with meticulous attention to detail, ensuring superior quality, durability, and performance.
                </p>
            </div>
        </div>
    </section>

    <!-- Category Filter -->
    @if($categories->count() > 0)
    <section class="category-filter-section">
        <div class="container">
            <div class="category-filter">
                <a href="{{ route('products') }}" class="filter-btn {{ !request('category') ? 'active' : '' }}">All Products</a>
                @foreach($categories as $category)
                    <a href="{{ route('products', ['category' => $category->id]) }}" class="filter-btn {{ request('category') == $category->id ? 'active' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Products Grid Section -->
    <section class="products-grid-section">
        <div class="container">
            @if($products->count() > 0)
                <div class="products-grid">
                    @foreach($products as $product)
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                @if($product->is_featured)
                                    <span class="product-badge">FEATURED</span>
                                @endif
                                @if($product->getFirstMedia('main_image'))
                                    <img src="{{ $product->getFirstMedia('main_image')->getUrl('preview') }}" alt="{{ $product->name }}" class="product-image">
                                @else
                                    <img src="{{ asset('assets/img/placeholder-product.jpg') }}" alt="{{ $product->name }}" class="product-image">
                                @endif
                                <div class="product-overlay">
                                    <a href="{{ route('product.details', $product->slug) }}" class="product-btn">
                                        View Details
                                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
                                    </a>
                                </div>
                            </div>
                            <div class="product-info">
                                @if($product->productCategory)
                                    <span class="product-category-label">{{ $product->productCategory->name }}</span>
                                @endif
                                <h3 class="product-name">
                                    <a href="{{ route('product.details', $product->slug) }}" style="color: inherit; text-decoration: none;">{{ $product->name }}</a>
                                </h3>
                                <p class="product-description">{{ Str::limit($product->short_description, 80) }}</p>
                                
                                <div class="product-card-footer">
                                    <a href="{{ route('product.details', $product->slug) }}" class="view-details-link">
                                        Read More
                                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="pagination-wrapper">
                    {{ $products->links() }}
                </div>
            @else
                <div class="no-products">
                    <p>No products found. Please check back later.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Engineering Excellence (GEO Features Section) -->
    <section class="geo-features-section" style="padding: 6rem 0; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: var(--text-light); text-align: center; border-top: 3px solid var(--secondary);">
        <div class="container">
            <h2 class="section-title" style="color: #fff !important; margin-bottom: 3rem;">Engineering Excellence</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 2.5rem;">
                
                <div style="background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(10px); padding: 2.5rem; border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.05); text-align: center; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--secondary)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='rgba(255, 255, 255, 0.05)';">
                    <div style="color: var(--secondary); margin-bottom: 1.5rem;">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24"><path d="M23 12l-2.44-2.78.34-3.68-3.61-.82-1.89-3.18L12 3 8.6 1.54 6.71 4.72l-3.61.81.34 3.68L1 12l2.44 2.78-.34 3.69 3.61.82 1.89 3.18L12 21l3.4 1.46 1.89-3.18 3.61-.82-.34-3.68L23 12zm-13 5l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                    </div>
                    <h3 style="font-size: 1.4rem; color: #fff; margin-bottom: 1rem;">100% Quality Certified</h3>
                    <p style="color: #cbd5e1; line-height: 1.6; font-size: 0.95rem;">ISO 9001:2015 compliant processes with rigorous stage-wise inspection.</p>
                </div>

                <div style="background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(10px); padding: 2.5rem; border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.05); text-align: center; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--secondary)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='rgba(255, 255, 255, 0.05)';">
                    <div style="color: var(--secondary); margin-bottom: 1.5rem;">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24"><path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/></svg>
                    </div>
                    <h3 style="font-size: 1.4rem; color: #fff; margin-bottom: 1rem;">0.001mm Tolerance</h3>
                    <p style="color: #cbd5e1; line-height: 1.6; font-size: 0.95rem;">State-of-the-art CNC machining ensuring micro-meter dimensional accuracy.</p>
                </div>

                <div style="background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(10px); padding: 2.5rem; border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.05); text-align: center; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--secondary)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='rgba(255, 255, 255, 0.05)';">
                    <div style="color: var(--secondary); margin-bottom: 1.5rem;">
                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                    </div>
                    <h3 style="font-size: 1.4rem; color: #fff; margin-bottom: 1rem;">Custom Blueprints</h3>
                    <p style="color: #cbd5e1; line-height: 1.6; font-size: 0.95rem;">Agile manufacturing lines capable of exact material and alloy sourcing to specification.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-home-section">
        <div class="container">
            <div class="section-header-center">
                <span class="section-label">Common Questions</span>
                <h2 class="section-title-home">Frequently Asked Questions</h2>
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
    <section class="products-cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Need a Custom Solution?</h2>
                <p class="cta-text">
                    Can't find what you're looking for? We specialize in custom manufacturing solutions tailored to your exact specifications. Contact us today to discuss your requirements.
                </p>
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="cta-button-primary">Request a Quote</a>
                    <a href="{{ route('about') }}" class="cta-button-secondary">Learn More About Us</a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
