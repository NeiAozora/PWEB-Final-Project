<?php

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class AuthHelper
{
    /**
     * Create a session token and store it in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return string The session token
     */
    public static function createSessionToken($request, $user)
    {
        $sessionToken = bin2hex(random_bytes(32)); // Generate a random token

        DB::table('sessions')->insert([
            'id' => $sessionToken,
            'user_id' => $user->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'payload' => json_encode([]), // Optional data
            'last_activity' => time(),
        ]);

        // Set the token as a cookie
        Cookie::queue('key_session', $sessionToken, 120); // 120 minutes
        return $sessionToken;
    }

    /**
     * Verify the session token from the cookie.
     *
     * @param string|null $sessionToken
     * @return bool
     */
    public static function verifySessionToken($sessionToken)
    {
        if (!$sessionToken) {
            return false;
        }

        $session = DB::table('sessions')->where('id', $sessionToken)->first();
        return $session !== null; // Return true if session exists, false otherwise
    }

}
