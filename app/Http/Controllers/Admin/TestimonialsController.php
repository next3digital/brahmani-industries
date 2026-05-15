<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class TestimonialsController extends Controller
{
    public function index()
    {
        return view('admin.testimonials.index');
    }

    public function massDestroy() {}
    public function storeMedia() {}
    public function storeCKEditorImages() {}
}
