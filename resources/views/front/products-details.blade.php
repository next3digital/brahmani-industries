@extends('layouts.front')

@push('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Product",
  "name": "{{ $product->name }}",
  "image": [
    "{{ $product->getFirstMediaUrl('main_image') ? $product->getFirstMediaUrl('main_image') : asset('assets/img/placeholder-product.jpg') }}"
    @foreach($product->getMedia('gallery') as $image)
    , "{{ $image->getUrl('large') }}"
    @endforeach
  ],
  "description": "{{ strip_tags($product->short_description) }}",
  "sku": "{{ $product->sku ?? 'N/A' }}",
  "brand": {
    "@type": "Brand",
    "name": "{{ config('settings.company.name') }}"
  },
  @if($product->productCategory)
  "category": "{{ $product->productCategory->name }}",
  @endif
  "url": "{{ url()->current() }}",
  "offers": {
    "@type": "Offer",
    "availability": "https://schema.org/InStock",
    "priceCurrency": "INR",
    "seller": {
      "@type": "Organization",
      "name": "{{ config('settings.company.name') }}"
    }
  }
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "{{ route('home') }}"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Products",
      "item": "{{ route('products') }}"
    }
    @if($product->productCategory)
    ,{
      "@type": "ListItem",
      "position": 3,
      "name": "{{ $product->productCategory->name }}",
      "item": "{{ route('products', ['category' => $product->productCategory->id]) }}"
    },
    {
      "@type": "ListItem",
      "position": 4,
      "name": "{{ $product->name }}",
      "item": "{{ url()->current() }}"
    }
    @else
    ,{
      "@type": "ListItem",
      "position": 3,
      "name": "{{ $product->name }}",
      "item": "{{ url()->current() }}"
    }
    @endif
  ]
}
</script>
@endpush

@push('head_meta')
<meta property="og:image" content="{{ $product->getFirstMediaUrl('main_image') ? $product->getFirstMediaUrl('main_image') : asset('assets/img/hero-banner.png') }}">
<meta property="og:type" content="product">
@endpush

@section('content')
    <style>
        .product-details-hero {
            position: relative;
            background-image: url("{{ asset('assets/img/product_banner.jpeg') }}");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: scroll;
            min-height: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            margin-bottom: 50px;
            border-bottom: 3px solid var(--secondary);
        }
        .product-details-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to bottom,
                rgba(10, 25, 47, 0.65) 0%,
                rgba(10, 25, 47, 0.85) 100%
            );
            z-index: 1;
        }
        .product-details-hero .container {
            position: relative;
            z-index: 2;
            padding: 80px 20px 20px;
        }
        .product-details-hero .breadcrumb {
            display: inline-flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 12px;
            font-size: 1.15rem;
            padding: 16px 24px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            margin: 0 auto;
        }
        .product-details-hero .breadcrumb a {
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }
        .product-details-hero .breadcrumb a:hover {
            color: var(--secondary-light);
        }
        .product-details-hero .breadcrumb span {
            color: rgba(255, 255, 255, 0.6);
            font-weight: 400;
            display: inline-block;
        }
        .product-details-hero .breadcrumb span:last-child {
            color: var(--secondary-light);
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .product-details-hero {
                min-height: 280px;
            }
            .product-details-hero .breadcrumb {
                font-size: 0.95rem;
                padding: 12px 20px;
                gap: 8px;
            }
        }
    </style>
    <!-- Product Details Hero -->
    <section class="product-details-hero">
        <div class="container">
            <nav class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('products') }}">Products</a>
                <span>/</span>
                @if($product->productCategory)
                    <a href="{{ route('products', ['category' => $product->productCategory->id]) }}">{{ $product->productCategory->name }}</a>
                    <span>/</span>
                @endif
                <span>{{ $product->name }}</span>
            </nav>
        </div>
    </section>

    <!-- Product Details Section -->
    <section class="product-details-section">
        <div class="container">
            <div class="product-details-grid">
                <!-- Product Images -->
                <div class="product-images">
                    <div class="main-image-wrapper">
                        @if($product->getFirstMedia('main_image'))
                            <img src="{{ $product->getFirstMedia('main_image')->getUrl('large') }}" alt="{{ $product->name }}" id="mainProductImage" class="main-product-image">
                        @else
                            <img src="{{ asset('assets/img/placeholder-product.jpg') }}" alt="{{ $product->name }}" id="mainProductImage" class="main-product-image">
                        @endif
                    </div>

                    @if($product->getMedia('gallery')->count() > 0)
                    <div class="gallery-thumbnails">
                        @if($product->getFirstMedia('main_image'))
                            <img src="{{ $product->getFirstMedia('main_image')->getUrl('thumb') }}" alt="{{ $product->name }}" class="thumbnail active" onclick="changeMainImage('{{ $product->getFirstMedia('main_image')->getUrl('large') }}', this)">
                        @endif
                        @foreach($product->getMedia('gallery') as $image)
                            <img src="{{ $image->getUrl('thumb') }}" alt="{{ $product->name }}" class="thumbnail" onclick="changeMainImage('{{ $image->getUrl('large') }}', this)">
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="product-info-details product-info-section">
                    <h1 class="product-detail-title">{{ $product->name }}</h1>

                    @if($product->productCategory)
                        <div class="product-category-badge">
                            <svg fill="currentColor" viewBox="0 0 24 24" width="16" height="16">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                            {{ $product->productCategory->name }}
                        </div>
                    @endif

                    @if($product->short_description)
                        <div class="product-short-desc">
                            <p>{{ $product->short_description }}</p>
                        </div>
                    @endif

                    <div class="product-features">
                        <div class="feature-item">
                            <svg fill="currentColor" viewBox="0 0 24 24" width="24" height="24">
                                <path d="M23 12l-2.44-2.78.34-3.68-3.61-.82-1.89-3.18L12 3 8.6 1.54 6.71 4.72l-3.61.81.34 3.68L1 12l2.44 2.78-.34 3.69 3.61.82 1.89 3.18L12 21l3.4 1.46 1.89-3.18 3.61-.82-.34-3.68L23 12zm-13 5l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/>
                            </svg>
                            <span>Quality Certified</span>
                        </div>
                        <div class="feature-item">
                            <svg fill="currentColor" viewBox="0 0 24 24" width="24" height="24">
                                <path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/>
                            </svg>
                            <span>Precision Engineered</span>
                        </div>
                    </div>

                    <div class="product-actions">
                        <a href="{{ route('contact') }}" class="btn-primary">Request a Quote</a>
                        <a href="{{ route('products') }}" class="btn-secondary">View All Products</a>
                    </div>
                </div>
            </div>

            <!-- Product Description -->
            @if($product->long_description)
                <div class="product-description-section">
                    <h2>Product Description</h2>
                    <div class="product-long-description">
                        {!! $product->long_description !!}
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Related Products -->
    @if($related_products->count() > 0)
    <section class="related-products-section">
        <div class="container">
            <h2 class="section-title">Related Products</h2>
            <div class="products-grid">
                @foreach($related_products as $related)
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            @if($related->getFirstMedia('main_image'))
                                <img src="{{ $related->getFirstMedia('main_image')->getUrl('preview') }}" alt="{{ $related->name }}" class="product-image">
                            @else
                                <img src="{{ asset('assets/img/placeholder-product.jpg') }}" alt="{{ $related->name }}" class="product-image">
                            @endif
                            <div class="product-overlay">
                                <a href="{{ route('product.details', $related->slug) }}" class="product-btn">View Details</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">{{ $related->name }}</h3>
                            <p class="product-description">{{ Str::limit($related->short_description, 60) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <script>
        function changeMainImage(imageUrl, thumbnail) {
            document.getElementById('mainProductImage').src = imageUrl;
            document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
            thumbnail.classList.add('active');
        }
    </script>
@endsection
