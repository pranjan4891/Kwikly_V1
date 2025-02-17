<?php

namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VendorDashboardController extends Controller
{
    public function dashboard()
    {
        return view('vendor.dashboard.dashboard');
    }
    public function profile()
    {
        return view('vendor.dashboard.profile');
    }
}