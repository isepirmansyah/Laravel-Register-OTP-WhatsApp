<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class OtpVerificationController extends Controller
{
    /**
     * Show the OTP verification form.
     */
    public function show()
    {
        if (!session('user_id_for_verification')) {
            return redirect()->route('register');
        }
        return view('auth.verify-otp');
    }

    /**
     * Verify the OTP.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|min:6|max:6',
        ]);

        $userId = session('user_id_for_verification');

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Sesi Anda telah berakhir, silakan coba lagi.');
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('login')->with('error', 'User tidak ditemukan.');
        }

        if ($user->otp === $request->otp && Carbon::now()->lessThan($user->otp_expires_at)) {
            $user->whatsapp_verified_at = Carbon::now();
            $user->otp = null;
            $user->otp_expires_at = null;
            $user->save();

            session()->forget('user_id_for_verification');

            event(new Registered($user));

            Auth::login($user);
            return redirect()->intended(config('fortify.home', '/dashboard'));
        } else {
            return back()->withErrors(['otp' => 'Kode OTP tidak valid atau telah kedaluwarsa.']);
        }
    }
}