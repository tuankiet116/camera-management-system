<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;

class UserAuthService
{
    public function login($data)
    {
        try {
            return Auth::attempt($data);
        } catch (\Exception $e) {
            abort(403);
        }
    }

    public function logout()
    {
        return Auth::logout();
    }
}
