<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        return view('frontend.auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        // Customize the redirection after successful login if needed
        // For example:
        // if ($user->isAdmin()) {
        //     return redirect()->route('admin.dashboard');
        // }

        return redirect()->intended($this->redirectPath());
    }
}
