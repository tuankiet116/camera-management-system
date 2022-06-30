<?php

namespace App\Http\Services;

use App\Models\Camera;
use Illuminate\Support\Facades\Auth;

class CameraService
{
    public function all()
    {
        $userId = Auth::id();
        return Camera::where('user_id', $userId)->get();
    }
}
