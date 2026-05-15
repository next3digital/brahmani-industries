<?php
return [

    // Captcha Settings
    'captcha_site_key' => '6LfU0mYsAAAAAKeRh6cQy7Fc1WTroCf4Lw1ESHRH',
    'captcha_secret_key' => '6LfU0mYsAAAAAK46raFPqbSINPVcrZBdXvSlSB5J',

    // Company Information
    'company' => [
        'name' => 'Brahmani Industries',
        'name_short' => 'Brahmani',
        'name_highlight' => 'Industries',
        'tagline' => 'Precision Engineering Excellence',
        'description' => 'For over 12 years, we\'ve been delivering precision-engineered manufacturing solutions. Our commitment to quality and innovation sets us apart in the industrial manufacturing world.',
        'founded_year' => '2012',
        'experience_years' => '12',
    ],

    // Contact Information
    'contact' => [
        'email' => 'brahmaniindustries4@gmail.com',
        'phone' => '+91 6359846110',
        'whatsapp' => '+91 6359846110', // WhatsApp number (can be same as phone or different)
        'tel_code' => '+91',
        'address' => '21, Ganga Estate, Naroda, Near Kutch Kadva Patel, Ahmedabad, Gujarat 382330',
        'address_short' => '21, Ganga Estate, Naroda, Near Kutch Kadva Patel, Ahmedabad, Gujarat 382330',
        'city' => 'India',
        'state' => '',
        'country' => 'India',
        'pincode' => '',
    ],

    // Social Media Links (leave empty string '' if not available)
    'social_media' => [
        'facebook' => '',
        'twitter' => '',
        'linkedin' => '',
        'instagram' => '',
        'youtube' => '',
        'whatsapp_link' => '', // Full WhatsApp link like: https://wa.me/911234567890
    ],

    // Navigation Menu
    'navigation' => [
        'main_menu' => [
            [
                'label' => 'Home',
                'route' => 'home',
                'url' => null, // Use route if set, otherwise use url
                'active_on' => ['home'],
            ],
            [
                'label' => 'About',
                'route' => 'about',
                'url' => null,
                'active_on' => ['about'],
            ],
            [
                'label' => 'Products',
                'route' => 'products',
                'url' => null,
                'active_on' => ['products', 'product.details'],
            ],
            [
                'label' => 'Blog',
                'route' => 'blog',
                'url' => null,
                'active_on' => ['blog'],
            ],
            [
                'label' => 'Contact',
                'route' => 'contact',
                'url' => null,
                'active_on' => ['contact'],
            ],
        ],
        'footer_quick_links' => [
            [
                'label' => 'Home',
                'route' => 'home',
                'url' => null,
            ],
            [
                'label' => 'About Us',
                'route' => null,
                'url' => '#about',
            ],
            [
                'label' => 'Products',
                'route' => null,
                'url' => '#products',
            ],
            [
                'label' => 'Blog',
                'route' => 'blog',
                'url' => null,
            ],
            [
                'label' => 'Contact',
                'route' => 'contact',
                'url' => null,
            ],
        ],
    ],

    // Footer Settings
    'footer' => [
        'copyright_text' => date('Y') . ' Brahmani Industries. All rights reserved.',
        'show_privacy_policy' => true,
        'show_terms_of_service' => true,
        'privacy_policy_url' => '/privacy-policy',
        'terms_of_service_url' => '/terms-conditions',
    ],

    // Legacy settings (keeping for backward compatibility)
    'email' => 'brahmaniindustries4@gmail.com',
    'mobile_number' => '+91 6359846110',
    'address' => '21, Ganga Estate, Naroda, Near Kutch Kadva Patel, Ahmedabad, Gujarat 382330',
    'short_address' => '21, Ganga Estate, Naroda, Near Kutch Kadva Patel, Ahmedabad, Gujarat 382330',
    'tel_code' => '+91',
    'email_copy_rights_text' => date('Y') . " © " . config('app.name') . ". ALL Rights Reserved.",

    // Cache Settings
    'cache_data_limit' => [
        'seconds' => 86400, // 1 Day seconds
        'days' => 365,  // 1 Year days
    ],

];
