<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Http\Services\MemberService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $result = $this->memberService->createMember($data);
        if ($result === true) {
            return redirect(route('member.list'));
        }
        return redirect()->back()->withErrors(
            [
                'error' => __('user.member.add_member.notice_error')
            ]
        );
    }

    public function edit(int $id)
    {
        $member = $this->memberService->getMember($id);
        $authId = Auth::id();
        return view('users.member.edit', compact('member', 'authId'));
    }

    public function update(UpdateMemberRequest $request, int $id)
    {
        $data = $request->validated();
        $result = $this->memberService->updateMember($data, $id);
        if ($result === true) {
            return redirect()->back()->with('success', 'Updated');
        }
        return redirect()->back()->withErrors('error', false);
    }

    public function delete(int $id)
    {
        
    }

    public function image(int $memberId, $fileName)
    {
        try {
            return response()->file($this->memberService->getImage($fileName));
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
