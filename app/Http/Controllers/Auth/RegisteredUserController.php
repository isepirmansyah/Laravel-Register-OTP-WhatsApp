<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone_number' => ['required', 'string', 'unique:' . User::class, 'min:10', 'max:15'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $otp = rand(100000, 999999);
        $otp_expires_at = Carbon::now()->addMinutes(5);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'otp' => $otp,
            'otp_expires_at' => $otp_expires_at,
        ]);

        $this->sendOtp($request->phone_number, $otp);
        $request->session()->put('user_id_for_verification', $user->id);
        return redirect()->route('otp.verification');
    }

    /**
     * Send OTP to user's WhatsApp number.
     */
    private function sendOtp(string $receiver, string $otp)
    {
        $apiKey = config('app.moonwa_api_key', env('MOONWA_API_KEY'));
        $apiUrl = config('app.moonwa_api_url', env('MOONWA_API_URL'));

        $message = "Kode OTP Anda adalah: " . $otp . ". Jangan berikan kode ini kepada siapapun.";

        Http::post($apiUrl, [
            'api_key' => $apiKey,
            'receiver' => $receiver,
            'data' => [
                'message' => $message,
            ],
        ]);
    }
}