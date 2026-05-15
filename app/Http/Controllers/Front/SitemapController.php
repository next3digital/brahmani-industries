<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

class SitemapController extends Controller
{
    /**
     * Generate a dynamic XML Sitemap for the entire site.
     * Includes static pages + all active products + all blogs.
     */
    public function index()
    {
        // Static pages
        $staticPages = [
            ['url' => route('home'),     'changefreq' => 'weekly',  'priority' => '1.0', 'lastmod' => now()->toDateString()],
            ['url' => route('about'),    'changefreq' => 'monthly', 'priority' => '0.8', 'lastmod' => now()->toDateString()],
            ['url' => route('products'), 'changefreq' => 'weekly',  'priority' => '0.9', 'lastmod' => now()->toDateString()],
            ['url' => route('blog'),     'changefreq' => 'daily',   'priority' => '0.8', 'lastmod' => now()->toDateString()],
            ['url' => route('contact'),  'changefreq' => 'monthly', 'priority' => '0.7', 'lastmod' => now()->toDateString()],
            ['url' => route('privacy'),  'changefreq' => 'yearly',  'priority' => '0.3', 'lastmod' => now()->toDateString()],
            ['url' => route('terms'),    'changefreq' => 'yearly',  'priority' => '0.3', 'lastmod' => now()->toDateString()],
        ];

        // All active products
        $products = Product::active()
            ->select('slug', 'updated_at')
            ->ordered()
            ->get();

        // All published blogs
        $blogs = Blog::orderBy('created_at', 'desc')
            ->select('slug', 'updated_at')
            ->get();

        return response()->view('sitemap.index', compact('staticPages', 'products', 'blogs'))
            ->header('Content-Type', 'application/xml');
    }
}
