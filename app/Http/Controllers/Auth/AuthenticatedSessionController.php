<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'password.required' => 'Mật khẩu là bắt buộc.',
        ]);

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            // Check if the email exists in the database
            $emailExists = User::where('email', $request->email)->exists();
            if (!$emailExists) {
                // Email does not exist
                return redirect()->back()->withErrors([
                    'email' => 'Email không đúng.',
                ])->withInput($request->only('email'));
            } else {
                // Email exists but password is incorrect
                return redirect()->back()->withErrors([
                    'password' => 'Mật khẩu không đúng!',
                ])->withInput($request->only('email'));
            }
        }
        $request->authenticate();

        $request->session()->regenerate();
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $username = $profileData->name;
        $notification = array(
            'message' => 'Xin chào ' . $username . '',
            'alert-type' => 'success'
        );

        $url = '';
        if ($request->user()->role === 'admin') {
            $url = '/admin/dashboard';
        } elseif ($request->user()->role === 'user') {
            $url = '/';
        }

        return redirect()->intended($url)->with($notification);
        // if ($request->user()->role === 'admin') {
        //     return redirect()->intended(RouteServiceProvider::ADMIN);
        // }
        // return redirect()->intended(RouteServiceProvider::HOME);
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
