<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $seller = auth('seller')->user();
        return view('website.seller.profile.index', compact('seller'));
    }

    public function update(Request $request)
    {
        $seller = auth('seller')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $seller->name = $request->name;

        // kalau ada upload cover baru
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $coverPath = $file->move('uploads/cover', time().'_'.$file->getClientOriginalName());
            $seller->cover = $coverPath;
        }

        $seller->save();

        return redirect()->route('seller.profile')->with('success', 'Profil berhasil diperbarui');
    }
}
