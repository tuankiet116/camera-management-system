<?php

namespace App\Http\Services;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class MemberService
{
    public function getMembers()
    {
        $userId = Auth::id();
        return Member::where('user_id', $userId)->get();
    }
}
