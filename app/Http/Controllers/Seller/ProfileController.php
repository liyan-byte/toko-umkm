<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $seller = auth('seller')->user(); // ambil data seller yang login
        return view('website.seller.profile', compact('seller'));
    }
}
