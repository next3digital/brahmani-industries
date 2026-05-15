<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AssetManagementController extends Controller
{
    public function index()
    {
        return view('admin.assetManagements.index');
    }

    public function massDestroy() {}
    public function storeMedia() {}
    public function storeCKEditorImages() {}
}
