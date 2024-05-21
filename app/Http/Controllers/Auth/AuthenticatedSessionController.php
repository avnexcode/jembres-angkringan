<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // $request->authenticate();

        // $request->session()->regenerate();
        // Alert::success('Berhasil Login', "Selamat Berbelanja");
        // return redirect()->intended(route('dashboard', absolute: false));
        $request->authenticate();

        // Get the authenticated user
        $user = $request->user();

        if ($user->hasRole('admin')) {
            Alert::success('Berhasil Login Sebagai Admin');
            return redirect()->intended(route('dashboard', absolute: false));
        } elseif ($user->hasRole('customer')) {
            Alert::success('Berhasil Login', "Selamat Berbelanja! Jangan Lupa Menghabiskan Uang Anda!");
            return redirect()->intended(route('page.home', absolute: false));
        }

        $request->session()->regenerate();


        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
