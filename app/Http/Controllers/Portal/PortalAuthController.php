<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortalAuthController extends Controller
{
    public function showLogin()
    {
        return view('portal.login');
    }

    public function login(Request $request)
    {
        $request->validate(['password' => 'required|string']);

        if ($request->input('password') === config('portal.password')) {
            $request->session()->put('portal_authed', true);

            return redirect()->route('portal.index');
        }

        return back()->withErrors(['password' => 'Wrong password.']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('portal_authed');

        return redirect()->route('portal.login');
    }
}
