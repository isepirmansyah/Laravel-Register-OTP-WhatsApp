<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckWhatsappVerified
{
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->user() && !$request->user()->whatsapp_verified_at) {
            auth()->logout();
            return redirect()->route('login')->with('error', 'Akun Anda belum diverifikasi. Silakan cek WhatsApp atau daftar ulang.');
        }

        return $next($request);
    }
}