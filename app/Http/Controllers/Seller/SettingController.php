<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        $user = Auth::guard('seller')->user(); // pastikan guard seller
        return view('website.seller.setting.index', compact('user'));
    }

    public function update(Request $request)
{
    // Ambil seller yang sedang login
    $seller = Auth::guard('seller')->user();

    if (!$seller) {
        return redirect()->back()->with('error', 'Data seller tidak ditemukan.');
    }

    // Validasi
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
    ]);

    // Update foto profil
    if ($request->hasFile('profile_picture')) {
        $file = $request->file('profile_picture');
        $profilePath = $file->move('uploads/profile', time().'_'.$file->getClientOriginalName());
        $seller->profile_picture = $profilePath;
    }

    // Update cover toko
    if ($request->hasFile('cover')) {
        $file = $request->file('cover');
        $coverPath = $file->move('uploads/cover', time().'_'.$file->getClientOriginalName());
        $seller->cover = $coverPath;
    }

    // Update field lain
    $seller->name = $request->name;
    $seller->email = $request->email;
    $seller->save();

    return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
}
}
