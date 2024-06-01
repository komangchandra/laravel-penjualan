<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $products = Product::take(3)->get();
        $profile = Profile::take(1)->get();
        return view('client.landingpage', compact('products', 'profile'));
    }

    public function about()
    {
        $profile = Profile::take(1)->get();
        return view('client.about', compact( 'profile'));
    }
}
