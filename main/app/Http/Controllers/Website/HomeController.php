<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        return view('vendor.vendor-signup');
    }
    public function store()
    {
        return view('vendor.vendor-signin');
    }
    public function explorestore()
    {
        return view('vendor.vendor-signin');
    }
    public function department()
    {
        return view('vendor.vendor-signin');
    }
    public function product()
    {
        return view('vendor.vendor-signin');
    }
    public function privacyPolicy()
    {
        return view('vendor.vendor-signin');
    }
    public function termsConditions()
    {
        return view('vendor.vendor-signin');
    }
    public function returnPolicy()
    {
        return view('vendor.vendor-signin');
    }
    public function aboutUs()
    {
        return view('vendor.vendor-signin');
    }
    public function contactUs()
    {
        return view('vendor.vendor-signin');
    }


    
}