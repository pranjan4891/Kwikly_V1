<?php

namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function categories()
    {
        return view('vendor.dashboard.category.categories');
    }
    public function subcategories()
    {
        return view('vendor.dashboard.category.subcategories');
    }
}