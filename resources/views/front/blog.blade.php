@extends('layouts.front')

@push('schema')
@if($blogs->count() > 0)
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Blog",
  "name": "Our Blog - {{ config('settings.company.name') }}",
  "description": "Read the latest industry insights, news, and expert articles from {{ config('settings.company.name') }}.",
  "url": "{{ url()->current() }}",
  "blogPost": [
    @foreach($blogs as $index => $blog)
    {
      "@type": "BlogPosting",
      "headline": "{{ $blog->title }}",
      "url": "{{ route('blog', $blog->slug) }}",
      "datePublished": "{{ $blog->created_at->toIso8601String() }}",
      "dateModified": "{{ $blog->updated_at->toIso8601String() }}",
      "author": {
        "@type": "Organization",
        "name": "{{ config('settings.company.name') }}"
      },
      "image": "{{ $blog->main_image && $blog->main_image->getUrl() ? $blog->main_image->getUrl() : asset('assets/img/news/04.jpg') }}"
    }{{ !$loop->last ? ',' : '' }}
    @endforeach
  ]
}
</script>
@endif
@endpush

@section('content')
    <style>
        .blog-hero {
            position: relative;
            background-image: url('{{ asset('assets/img/blog_banner.jpeg') }}');
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
        .blog-hero::before {
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
        .blog-hero .container {
            position: relative;
            z-index: 2;
            padding: 80px 20px;
        }
        .blog-hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--secondary);
            text-shadow: 0 2px 12px rgba(0,0,0,0.5);
            line-height: 1.15;
        }
        .blog-hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255,255,255,0.92);
            text-shadow: 0 1px 6px rgba(0,0,0,0.4);
            max-width: 600px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .blog-hero {
                min-height: 280px;
            }
            .blog-hero .container {
                padding: 50px 20px;
            }
            .blog-hero-title {
                font-size: 2rem;
            }
            .blog-hero-subtitle {
                font-size: 0.95rem;
            }
        }
    </style>
    <!-- Blog Hero Section -->
    <section class="blog-hero">
        <div class="container">
            <h1 class="blog-hero-title">Our Blog</h1>
            <p class="blog-hero-subtitle">Industry Insights, News & Expert Articles</p>
        </div>
    </section>

    <!-- Blog Content Section -->
    <section class="blog-content-section">
        <div class="container">
            <div class="blog-layout">
                <!-- Main Blog Content -->
                <div class="blog-main">
                    @if($blogs->count() > 0)
                        <!-- Featured Post (First Blog) -->
                        @php
                            $featuredBlog = $blogs->first();
                        @endphp
                        <div class="featured-post">
                            <div class="featured-post-image">
                                @if ($featuredBlog->main_image && $featuredBlog->main_image->getUrl())
                                    <img src="{{ $featuredBlog->main_image->getUrl() }}" alt="{{ $featuredBlog->title }}">
                                @else
                                    <img src="{{ asset('assets/img/hero-banner.png') }}" alt="{{ $featuredBlog->title }}">
                                @endif
                                <span class="featured-badge">Featured</span>
                            </div>
                            <div class="featured-post-content">
                                <div class="post-meta">
                                    <span class="post-category">Featured Article</span>
                                    <span class="post-date">
                                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                                        </svg>
                                        {{ $featuredBlog->created_at->format('F d, Y') }}
                                    </span>
                                </div>
                                <h2 class="featured-post-title">
                                    <a href="{{ route('blog', $featuredBlog->slug) }}" title="{{ $featuredBlog->title }}">{{ $featuredBlog->title }}</a>
                                </h2>
                                <p class="featured-post-excerpt">
                                    {{ Str::limit(strip_tags($featuredBlog->description ?? $featuredBlog->meta_description), 200) }}
                                </p>
                                <a href="{{ route('blog', $featuredBlog->slug) }}" title="{{ $featuredBlog->title }}" class="read-more-btn">
                                    Read More
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Blog Grid -->
                        <div class="blog-grid">
                            @foreach ($blogs->skip(1) as $blog)
                            <article class="blog-card">
                                <div class="blog-card-image">
                                    @if ($blog->main_image && $blog->main_image->getUrl())
                                        <img src="{{ $blog->main_image->getUrl() }}" alt="{{ $blog->title }}">
                                    @else
                                        <img src="{{ asset('assets/img/news/04.jpg') }}" alt="{{ $blog->title }}">
                                    @endif
                                    <span class="blog-category-badge">Article</span>
                                </div>
                                <div class="blog-card-content">
                                    <div class="blog-meta">
                                        <span class="blog-date">
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                                            </svg>
                                            {{ $blog->created_at->format('M d, Y') }}
                                        </span>
                                        <span class="blog-read-time">5 min read</span>
                                    </div>
                                    <h3 class="blog-card-title">
                                        <a href="{{ route('blog', $blog->slug) }}" title="{{ $blog->title }}">{{ $blog->title }}</a>
                                    </h3>
                                    <p class="blog-card-excerpt">
                                        {{ Str::limit(strip_tags($blog->description ?? $blog->meta_description), 120) }}
                                    </p>
                                    <a href="{{ route('blog', $blog->slug) }}" title="{{ $blog->title }}" class="blog-read-more">Read Article →</a>
                                </div>
                            </article>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        @if ($blogs->hasPages())
                        <div class="blog-pagination">
                            @if ($blogs->onFirstPage())
                                <a href="#" class="pagination-btn disabled">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                                    </svg>
                                    Previous
                                </a>
                            @else
                                <a href="{{ $blogs->previousPageUrl() }}" class="pagination-btn">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                                    </svg>
                                    Previous
                                </a>
                            @endif

                            <div class="pagination-numbers">
                                @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                    <a href="{{ $url }}" class="pagination-number {{ $page == $blogs->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                                @endforeach
                            </div>

                            @if ($blogs->hasMorePages())
                                <a href="{{ $blogs->nextPageUrl() }}" class="pagination-btn">
                                    Next
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                                    </svg>
                                </a>
                            @else
                                <a href="#" class="pagination-btn disabled">
                                    Next
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                        @endif
                    @else
                        <div class="no-blogs-message">
                            <p>No blog posts available at the moment. Please check back later.</p>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <aside class="blog-sidebar">
                    <!-- Search Widget -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Search Articles</h3>
                        <form class="search-form" method="GET" action="{{ route('blog') }}">
                            <input type="text" name="search" placeholder="Search blog posts..." class="search-input" value="{{ request('search') }}">
                            <button type="submit" class="search-btn">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                                </svg>
                            </button>
                        </form>
                    </div>

                    <!-- Recent Posts Widget -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Recent Posts</h3>
                        <div class="recent-posts-list">
                            @foreach ($latest_blogs as $latestBlog)
                            <div class="recent-post-item">
                                <div class="recent-post-image">
                                    @if ($latestBlog->main_image && $latestBlog->main_image->getUrl())
                                        <img src="{{ $latestBlog->main_image->getUrl() }}" alt="{{ $latestBlog->title }}">
                                    @else
                                        <img src="{{ asset('assets/img/news/04.jpg') }}" alt="{{ $latestBlog->title }}">
                                    @endif
                                </div>
                                <div class="recent-post-content">
                                    <h4><a href="{{ route('blog', $latestBlog->slug) }}" title="{{ $latestBlog->title }}">{{ Str::limit($latestBlog->title, 50) }}</a></h4>
                                    <span class="recent-post-date">{{ $latestBlog->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Tags Widget -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Popular Tags</h3>
                        <div class="tags-cloud">
                            <a href="#" class="tag-item">Precision</a>
                            <a href="#" class="tag-item">Manufacturing</a>
                            <a href="#" class="tag-item">Quality</a>
                            <a href="#" class="tag-item">CNC</a>
                            <a href="#" class="tag-item">Flanges</a>
                            <a href="#" class="tag-item">Bushes</a>
                            <a href="#" class="tag-item">Innovation</a>
                            <a href="#" class="tag-item">Industry 4.0</a>
                            <a href="#" class="tag-item">Automation</a>
                            <a href="#" class="tag-item">Sustainability</a>
                        </div>
                    </div>
                </aside>
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
@endsection
