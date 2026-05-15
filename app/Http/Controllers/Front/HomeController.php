<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $data['meta_title'] = 'Precision Mfg. Solutions | Brahmani Industries Ahmedabad, GJ';
        $data['meta_description'] = 'Top precision engineering & manufacturing company in Ahmedabad, Gujarat. 12+ years of CNC machining excellence delivering industrial solutions across India.';
        $data['meta_keywords'] = 'precision manufacturing Ahmedabad, CNC machined parts Gujarat, industrial components supplier India, flanges manufacturer, bushes manufacturer, custom engineering solutions';
        $data['og_image'] = asset('assets/img/hero-banner.png');
        $data['og_type'] = 'website';

        // Fetch latest 3 blogs for homepage
        $latest_blogs = \App\Models\Blog::orderBy('created_at', 'desc')->take(3)->get();

        // Fetch featured products for homepage
        $featured_products = \App\Models\Product::active()->featured()->ordered()->take(6)->get();

        return view('front.home', compact('data', 'latest_blogs', 'featured_products'));
    }

    public function about()
    {
        $data['meta_title'] = 'About Brahmani Industries | Top Precision Mfg in Gujarat';
        $data['meta_description'] = 'Learn about Brahmani Industries, Gujarat\'s leading precision manufacturing experts. Discover our commitment to quality CNC engineering and custom solutions.';
        $data['meta_keywords'] = 'about Brahmani Industries, precision manufacturing company Gujarat, CNC machining Ahmedabad, ISO 9001 certified manufacturer, industrial solutions India';
        $data['og_image'] = asset('assets/img/about.png');
        return view('front.about', compact('data'));
    }

    public function products(Request $request)
    {
        $data['meta_title'] = 'Precision Engineered Components & Flanges Supplier in Gujarat';
        $data['meta_description'] = 'Browse high-quality precision manufacturing products, flanges, & bushes from Ahmedabad\'s trusted industrial supplier. Request a custom quote today.';
        $data['meta_keywords'] = 'precision components, flanges supplier Gujarat, CNC machined parts, industrial bushes, custom fasteners Ahmedabad, manufacturing products India';
        $data['og_image'] = asset('assets/img/hero-banner.png');

        // Fetch all active categories
        $categories = \App\Models\ProductCategory::active()->orderBy('name')->get();

        // Build products query
        $query = \App\Models\Product::active()->with('productCategory')->ordered();

        // Filter by category if provided
        if ($request->has('category') && !empty($request->category)) {
            $query->where('product_category_id', $request->category);
        }

        $products = $query->paginate(12);

        return view('front.products', compact('data', 'products', 'categories'));
    }

    public function productDetails($slug)
    {
        // Fetch product by slug
        $product = \App\Models\Product::where('slug', $slug)
            ->active()
            ->with('productCategory')
            ->firstOrFail();

        // Use product meta or fallback to defaults
        $data['meta_title'] = $product->meta_title ?: $product->name . ' | Precision Component - Brahmani Industries';
        $data['meta_description'] = $product->meta_description ?: Str::limit(strip_tags($product->short_description ?? ''), 160);
        $data['meta_keywords'] = $product->name . ', precision manufacturing, CNC component, industrial part, Brahmani Industries, ' . ($product->productCategory ? $product->productCategory->name : 'engineering');
        $data['og_image'] = $product->getFirstMediaUrl('main_image') ?: asset('assets/img/hero-banner.png');
        $data['og_type'] = 'product';

        // Fetch related products from same category
        $related_products = \App\Models\Product::active()
            ->where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->ordered()
            ->take(4)
            ->get();

        return view('front.products-details', compact('data', 'product', 'related_products'));
    }

    public function blog(Request $request, $slug = null)
    {
        if (isset($slug) && !empty($slug)) {
            // Show blog details
            $blog_details = \App\Models\Blog::where('slug', $slug)->orderBy('created_at', 'desc')->first();

            if (!$blog_details) {
                abort(404);
            }

            $latest_blogs = \App\Models\Blog::orderBy('created_at', 'desc')->take(3)->get();

            $data['meta_title'] = $blog_details->meta_title ?: $blog_details->title . ' | Brahmani Industries Blog';
            $data['meta_description'] = $blog_details->meta_description ?: Str::limit(strip_tags($blog_details->description ?? ''), 160);
            $data['meta_keywords'] = $blog_details->title . ', precision manufacturing blog, CNC machining insights, industrial engineering, Brahmani Industries';
            $data['og_type'] = 'article';
            $data['og_image'] = ($blog_details->main_image && $blog_details->main_image->getUrl()) ? $blog_details->main_image->getUrl() : asset('assets/img/hero-banner.png');

            return view('front.blog-details', compact('blog_details', 'data', 'latest_blogs'));
        } else {
            // Show blog listing
            $query = \App\Models\Blog::query();

            // Search functionality
            if ($request->has('search') && !empty($request->search)) {
                $searchTerm = $request->search;
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('title', 'like', "%{$searchTerm}%")
                      ->orWhere('description', 'like', "%{$searchTerm}%");
                });
            }

            $blogs = $query->orderBy('id', 'DESC')->paginate(6);

            // Append search query to pagination links
            if ($request->has('search')) {
                $blogs->appends(['search' => $request->search]);
            }

            $latest_blogs = \App\Models\Blog::orderBy('created_at', 'desc')->take(3)->get();

            $data['meta_title'] = 'Precision Manufacturing News & Insights | Gujarat Blogs';
            $data['meta_description'] = 'Stay updated with Brahmani Industries\' blog on CNC machining, precision component manufacturing trends, and industrial engineering updates from Gujarat.';
            $data['meta_keywords'] = 'precision manufacturing blog, CNC machining news, industrial engineering insights, Gujarat manufacturing, Brahmani Industries news';
            $data['og_image'] = asset('assets/img/blog.jpg');

            return view('front.blog', compact('data', 'blogs', 'latest_blogs'));
        }
    }

    public function blogDetails()
    {
        $data['meta_title'] = 'Future of Precision Engineering in Gujarat | Our Insights';
        $data['meta_description'] = 'Read expert insights on the future of industrial manufacturing and precision engineering in Ahmedabad, Gujarat. Discover AI-driven CNC innovations.';
        $data['meta_keywords'] = 'precision engineering future, CNC innovation, industrial manufacturing Gujarat, AI manufacturing';
        return view('front.blog-details', compact('data'));
    }

    public function contact()
    {
        $data['meta_title'] = 'Contact Brahmani Industries | Precision Mfg in Ahmedabad';
        $data['meta_description'] = 'Get a custom engineering quote! Contact Brahmani Industries in Ahmedabad, Gujarat for premium CNC components and precision manufacturing solutions.';
        $data['meta_keywords'] = 'contact Brahmani Industries, precision manufacturing quote, CNC components Ahmedabad, engineering inquiry Gujarat';
        $data['og_image'] = asset('assets/img/contact_us.png');
        return view('front.contact', compact('data'));
    }

    public function privacy()
    {
        $data['meta_title'] = 'Privacy Policy | Brahmani Industries Gujarat';
        $data['meta_description'] = 'Read our Privacy Policy to understand how Brahmani Industries collects, uses, and protects your personal information.';
        $data['meta_robots'] = 'noindex, follow';
        return view('front.privacy', compact('data'));
    }

    public function terms()
    {
        $data['meta_title'] = 'Terms and Conditions | Brahmani Industries Gujarat';
        $data['meta_description'] = 'Read our Terms and Conditions for using the Brahmani Industries website and services.';
        $data['meta_robots'] = 'noindex, follow';
        return view('front.terms', compact('data'));
    }
}
