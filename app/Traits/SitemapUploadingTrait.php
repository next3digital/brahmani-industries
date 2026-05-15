<?php

namespace App\Traits;

use App\Models\Blog;

trait SitemapUploadingTrait
{
    /**
     * Generate sitemap for blog posts
     */
    public function generateBlogPostSitemap()
    {
        try {
            $blogs = Blog::orderBy('updated_at', 'desc')->get();
            
            $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
            
            foreach ($blogs as $blog) {
                $sitemap .= '  <url>' . "\n";
                $sitemap .= '    <loc>' . route('blog', $blog->slug) . '</loc>' . "\n";
                $sitemap .= '    <lastmod>' . $blog->updated_at->toAtomString() . '</lastmod>' . "\n";
                $sitemap .= '    <changefreq>weekly</changefreq>' . "\n";
                $sitemap .= '    <priority>0.8</priority>' . "\n";
                $sitemap .= '  </url>' . "\n";
            }
            
            $sitemap .= '</urlset>';
            
            // Save sitemap to public directory
            $sitemapPath = public_path('blog-sitemap.xml');
            file_put_contents($sitemapPath, $sitemap);
            
            return true;
        } catch (\Exception $e) {
            // Log error but don't break the application
            \Log::error('Failed to generate blog sitemap: ' . $e->getMessage());
            return false;
        }
    }
}
