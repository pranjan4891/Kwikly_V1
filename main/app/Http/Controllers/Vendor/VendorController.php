<?php

namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VendorController extends Controller
{
    public function index()
    {
        return view('vendor.vendor-signup');
    }
    public function signIn()
    {
        return view('vendor.vendor-signin');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors,email',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8',
            'place_name' => 'required|string',
            'pin_code' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Save the vendor data to the database
        // Example:
        // Vendor::create($request->all());

        // Flash a success message
        Session::flash('thank_msg', 'Thank you for registering!');

        return redirect()->route('vendor.index');
    }
}