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
        $user = Auth::guard('seller')->user();

        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|max:255',
            'whatsapp'  => 'nullable|string|max:20',
            'nama_toko' => 'nullable|string|max:255',
            'alamat_toko' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // kalau ada upload file baru
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/profile'), $filename);
            $user->profile_picture = 'uploads/profile/'.$filename;
        }

        // update field lain
        $user->name = $request->name;
        $user->email = $request->email;
        $user->whatsapp = $request->whatsapp;
        $user->nama_toko = $request->nama_toko;
        $user->alamat_toko = $request->alamat_toko;
        $user->save();

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
