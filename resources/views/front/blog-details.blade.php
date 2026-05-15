@extends('layouts.front')

@push('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ url()->current() }}"
  },
  "headline": "{{ $blog_details->title }}",
  "description": "{{ Str::limit(strip_tags($blog_details->description ?? $blog_details->meta_description), 160) }}",
  "image": "{{ $blog_details->main_image && $blog_details->main_image->getUrl() ? $blog_details->main_image->getUrl() : asset('assets/img/hero-banner.png') }}",
  "author": {
    "@type": "Organization",
    "name": "{{ config('settings.company.name') }} Team"
  },
  "publisher": {
    "@type": "Organization",
    "name": "{{ config('settings.company.name') }}",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('assets/img/logo.jpg') }}"
    }
  },
  "datePublished": "{{ $blog_details->created_at->toIso8601String() }}",
  "dateModified": "{{ $blog_details->updated_at->toIso8601String() }}",
  "url": "{{ url()->current() }}",
  "keywords": "precision manufacturing, CNC machining, industrial components, Brahmani Industries"
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
      "name": "Blog",
      "item": "{{ route('blog') }}"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "{{ Str::limit($blog_details->title, 60) }}",
      "item": "{{ url()->current() }}"
    }
  ]
}
</script>
@endpush

@push('head_meta')
<meta property="og:type" content="article">
<meta property="og:image" content="{{ $blog_details->main_image && $blog_details->main_image->getUrl() ? $blog_details->main_image->getUrl() : asset('assets/img/hero-banner.png') }}">
<meta property="article:published_time" content="{{ $blog_details->created_at->toIso8601String() }}">
<meta property="article:modified_time" content="{{ $blog_details->updated_at->toIso8601String() }}">
@endpush

@section('content')
    <style>
        .blog-details-hero {
            position: relative;
            background-image: url('{{ asset('assets/img/blog_details.jpeg') }}');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: scroll;
            min-height: 550px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-bottom: 50px;
            border-bottom: 3px solid var(--secondary);
            margin-top: 0;
        }
        .blog-details-hero::before {
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
        .blog-details-hero .container {
            position: relative;
            z-index: 2;
            padding: 80px 20px;
        }
        .blog-details-hero .breadcrumb {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            font-size: 1.1rem;
        }
        .blog-details-hero .breadcrumb a {
            color: #fff;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s ease;
            text-shadow: 0 1px 6px rgba(0,0,0,0.4);
        }
        .blog-details-hero .breadcrumb a:hover {
            color: var(--secondary);
        }
        .blog-details-hero .breadcrumb .separator {
            color: rgba(255, 255, 255, 0.6);
        }
        .blog-details-hero .breadcrumb .separator:last-of-type {
            display: none;
        }
        .blog-details-hero .breadcrumb .current {
            color: var(--secondary);
            font-weight: 700;
            text-shadow: 0 2px 12px rgba(0,0,0,0.5);
            font-size: 2rem;
            display: block;
            width: 100%;
            margin-top: 15px;
        }
        .share-btn {
            color: #ffffff !important;
        }

        /* Ensure the main article image is never cut */
        .article-featured-image {
            margin-bottom: 2rem;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            background-color: #f8f9fa;
        }
        .article-featured-image img {
            width: 100%;
            height: auto;
            max-height: 600px;
            object-fit: contain;
            display: block;
        }

        @media (max-width: 768px) {
            .blog-details-hero {
                min-height: 280px;
            }
            .blog-details-hero .container {
                padding: 50px 20px;
            }
            .blog-details-hero .breadcrumb {
                font-size: 0.95rem;
            }
            .blog-details-hero .breadcrumb .current {
                font-size: 1.5rem;
                margin-top: 10px;
            }
        }
    </style>
    <!-- Blog Details Hero -->
    <section class="blog-details-hero">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span class="separator">/</span>
                <a href="{{ route('blog') }}">Blog</a>
                <span class="separator">/</span>
                <span class="current">{{ Str::limit($blog_details->title, 50) }}</span>
            </div>
        </div>
    </section>

    <!-- Blog Details Content -->
    <section class="blog-details-section">
        <div class="container">
            <div class="blog-details-layout">
                <!-- Main Content -->
                <article class="blog-details-main">
                    <!-- Article Header -->
                    <header class="article-header">
                        <div class="article-meta-top">
                            <span class="article-category">Article</span>
                            <span class="article-date">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                                </svg>
                                {{ $blog_details->created_at->format('F d, Y') }}
                            </span>
                            <span class="article-read-time">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                                </svg>
                                8 min read
                            </span>
                        </div>
                        <h1 class="article-title">{{ $blog_details->title }}</h1>


                    </header>

                    <!-- Featured Image -->
                    <div class="article-featured-image">
                        @if ($blog_details->main_image && $blog_details->main_image->getUrl())
                            <img src="{{ $blog_details->main_image->getUrl() }}" alt="{{ $blog_details->title }}">
                        @else
                            <img src="{{ asset('assets/img/hero-banner.png') }}" alt="{{ $blog_details->title }}">
                        @endif
                    </div>

                    <!-- Article Content -->
                    <div class="article-content">
                        {!! $blog_details->description !!}
                    </div>

                    <!-- Tags -->
                    <div class="article-tags">
                        <h4>Tags:</h4>
                        <div class="tags-list">
                            <a href="#" class="tag-item">Precision Manufacturing</a>
                            <a href="#" class="tag-item">Industry 4.0</a>
                            <a href="#" class="tag-item">AI</a>
                            <a href="#" class="tag-item">Automation</a>
                            <a href="#" class="tag-item">Innovation</a>
                            <a href="#" class="tag-item">Sustainability</a>
                        </div>
                    </div>

                    <!-- Social Share -->
                    <div class="article-share">
                        <h4>Share this article:</h4>
                        <div class="share-buttons">
                            <a href="https://www.facebook.com/profile.php?id=61570712753505" class="share-btn facebook">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                                Facebook
                            </a>
                            <a href="https://x.com/_bm_industries?s=21" class="share-btn twitter">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                                Twitter
                            </a>
                            <a href="https://www.linkedin.com/in/brahmani-industries/" class="share-btn linkedin">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                                LinkedIn
                            </a>
                            <a href="#" class="share-btn whatsapp">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                                WhatsApp
                            </a>
                        </div>
                    </div>



                    <!-- Related Posts UI Enhancement -->
                    <div class="related-posts-section premium-related-section mt-5 pt-4 border-top">
                        <div class="d-flex justify-content-between align-items-center mb-4" style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
                            <h2 class="section-title fw-bold text-dark m-0" style="font-size: 1.8rem; position: relative; padding-bottom: 8px; margin: 0;">
                                Related Articles
                                <span style="position: absolute; bottom: 0; left: 0; width: 60px; height: 3px; background: var(--secondary, #0891b2); border-radius: 2px;"></span>
                            </h2>
                            <a href="{{ route('blog') }}" class="btn btn-outline-secondary btn-sm" style="border-radius: 20px; padding: 6px 20px; font-weight: 500; border: 1px solid #cbd5e1; color: #475569; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='var(--secondary, #0891b2)'; this.style.color='#fff'; this.style.borderColor='var(--secondary, #0891b2)';" onmouseout="this.style.background='transparent'; this.style.color='#475569'; this.style.borderColor='#cbd5e1';">View All</a>
                        </div>

                        <div class="related-posts-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;">
                            @foreach ($latest_blogs->take(3) as $latestBlog)
                            <article class="related-post-card" itemscope itemtype="https://schema.org/BlogPosting" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); transition: all 0.3s ease; background: #fff; height: 100%; display: flex; flex-direction: column; border: 1px solid rgba(0,0,0,0.05);" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)';">
                                <a href="{{ route('blog', $latestBlog->slug) }}" title="{{ $latestBlog->title }}" style="display: block; position: relative; overflow: hidden; aspect-ratio: 16/10;">
                                    @if ($latestBlog->main_image && $latestBlog->main_image->getUrl())
                                        <img itemprop="image" src="{{ $latestBlog->main_image->getUrl() }}" alt="{{ $latestBlog->title }}" loading="lazy" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                    @else
                                        <img itemprop="image" src="{{ asset('assets/img/news/04.jpg') }}" alt="{{ $latestBlog->title }}" loading="lazy" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                    @endif
                                    <span class="related-post-badge" style="position: absolute; top: 12px; left: 12px; background: rgba(8, 145, 178, 0.9); color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; backdrop-filter: blur(4px);">Article</span>
                                </a>

                                <div class="related-post-content" style="padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column;">
                                    <h3 itemprop="headline" style="font-size: 1.25rem; font-weight: 700; line-height: 1.4; margin-bottom: 1rem; color: #1a202c; margin-top: 0;">
                                        <a itemprop="url" href="{{ route('blog', $latestBlog->slug) }}" title="{{ $latestBlog->title }}" style="color: inherit; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='var(--secondary, #0891b2)'" onmouseout="this.style.color='inherit'">{{ Str::limit($latestBlog->title, 60) }}</a>
                                    </h3>

                                    <div class="mt-auto d-flex align-items-center" style="margin-top: auto; border-top: 1px solid #edf2f7; padding-top: 1rem; display: flex; justify-content: space-between;">
                                        <div class="d-flex align-items-center me-auto" style="color: #718096; font-size: 0.85rem; display: flex; align-items: center;">
                                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" style="margin-right: 6px;"><path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/></svg>
                                            <time itemprop="datePublished" datetime="{{ $latestBlog->created_at->format('Y-m-d') }}">{{ $latestBlog->created_at->format('M d, Y') }}</time>
                                        </div>
                                        <a href="{{ route('blog', $latestBlog->slug) }}" style="color: var(--secondary, #0891b2); font-weight: 600; font-size: 0.85rem; text-decoration: none; display: flex; align-items: center; transition: gap 0.3s ease; gap: 0px;" onmouseover="this.style.gap='5px'" onmouseout="this.style.gap='0px'">
                                            Read <span>&rarr;</span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>

                </article>

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

                </aside>
            </div>
        </div>
    </section>
@endsection
