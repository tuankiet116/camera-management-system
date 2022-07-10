<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Http\Services\MemberService;

class MemberController extends Controller
{
    private $memberService;

    public function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }

    public function list()
    {
        $members = $this->memberService->getMembers();
        return view('users.member.list', compact('members'));
    }

    public function add()
    {
        return view('users.member.add');
    }

    public function store(MemberRequest $request)
    {
        $data = $request->validated();
        $this->memberService->createMember($data);
    }
}
