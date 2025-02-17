<?php

namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function list()
    {
        return view('vendor.dashboard.product.list');
    }
    public function add()
    {
        return view('vendor.dashboard.product.add');
    }
    public function edit()
    {
        return view('vendor.dashboard.product.edit');
    }
}