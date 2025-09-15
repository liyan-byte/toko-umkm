<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function resend(Request $request)
    {
        $user = Auth::guard('seller')->user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('seller.dashboard')
                ->with('success', 'Email sudah terverifikasi.');
        }

        $user->sendEmailVerificationNotification();

        return back()->with('success', 'Email verifikasi berhasil dikirim ulang.');
    }
}
