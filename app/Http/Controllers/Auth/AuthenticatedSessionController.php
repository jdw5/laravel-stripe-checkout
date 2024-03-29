<?php

namespace App\Http\Controllers\Auth;

use App\Models\Cart;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $cart = Cart::bySession()->first();
        
        $request->authenticate();

        // When logging in/out, the session id is regenerated
        $request->session()->regenerate();

        optional($cart)->update([
            'session_id' => session()->getId(),
            'user_id' => auth()->id()
        ]);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $cart = Cart::bySession()->first();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        optional($cart)->update([
            'session_id' => session()->getId(),
        ]);

        return redirect('/');
    }
}
