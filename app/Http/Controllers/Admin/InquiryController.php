<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class InquiryController extends Controller
{
    public function index()
    {
        return view('admin.inquiries.index');
    }

    public function massDestroy() {}
}
