<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    {{-- ===== Static Pages ===== --}}
    @foreach($staticPages as $page)
    <url>
        <loc>{{ $page['url'] }}</loc>
        <changefreq>{{ $page['changefreq'] }}</changefreq>
        <priority>{{ $page['priority'] }}</priority>
        <lastmod>{{ $page['lastmod'] }}</lastmod>
    </url>
    @endforeach

    {{-- ===== Products ===== --}}
    @foreach($products as $product)
    <url>
        <loc>{{ route('product.details', $product->slug) }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
        <lastmod>{{ $product->updated_at->toDateString() }}</lastmod>
    </url>
    @endforeach

    {{-- ===== Blog Posts ===== --}}
    @foreach($blogs as $blog)
    <url>
        <loc>{{ route('blog', $blog->slug) }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
        <lastmod>{{ $blog->updated_at->toDateString() }}</lastmod>
    </url>
    @endforeach

</urlset>
