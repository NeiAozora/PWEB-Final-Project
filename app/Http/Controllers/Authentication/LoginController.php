<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(Request $request){
        return view("auth.login");
    }
    public function authenticate(Request $request)
    {
        // Validate the login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Regenerate the session to prevent session fixation
            $request->session()->regenerate();

            // Generate a custom session key (key_session)
            $keySession = bin2hex(random_bytes(32));

            // Store this custom session key in the database if needed
            DB::table('sessions')->insert([
                'id' => $keySession,
                'user_id' => Auth::id(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
                'payload' => json_encode([]), // Store any extra data in JSON format if needed
                'last_activity' => time(),
            ]);

            // Set the custom session key as a secure cookie
            Cookie::queue('key_session', $keySession, 60); // Cookie expires in 60 minutes

            // Redirect user to intended page (e.g., dashboard)
            return redirect()->intended('dashboard');
        }

        // If login fails, return back with error message
        return back()->withErrors(['login_error' => 'Email atau password salah'])->withInput();
    }
}
