<?php

namespace App\Http\Services;

use App\Http\Services\Inf\DetectFaceService;
use App\Models\Member;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberService
{
    private $detectFaceService;

    public function __construct(DetectFaceService $detectFaceService)
    {
        $this->detectFaceService = $detectFaceService;
    }

    public function getMembers()
    {
        $userId = Auth::id();
        return Member::where('user_id', $userId)->get();
    }

    public function createMember($data)
    {
        $dataCreate = [
            "user_id" => Auth::id(),
            "name" => $data["name"]
        ];
        $images = Arr::except($data, 'name');

        DB::beginTransaction();
        $member = Member::create($dataCreate);
        try {
            $resp = $this->detectFaceService->detectApi($images);
            $this->detectFaceService->cropImage();
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
        DB::commit();
    }
}
