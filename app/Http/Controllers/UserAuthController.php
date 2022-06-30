<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthRequest;
use App\Http\Services\UserAuthService;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    private $authService;

    public function __construct(UserAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function loginView()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('users.login');
    }

    public function login(UserAuthRequest $request)
    {
        $data = $request->validated();
        $result = $this->authService->login($data);
        if ($result) {
            return redirect()->route('home');
        }
        return redirect()->back()
            ->withInput()->withErrors(['login' => __('auth.login_failed')]);
    }
}
