<?php

namespace App\Http\Services;

use App\Http\Services\Inf\DetectFaceService;
use App\Models\ImageMember;
use App\Models\Member;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

    public function getMember(int $id)
    {
        return Member::where('id', $id)->with('getImages')->first();
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
            $arr_sizes = array_map(function ($res) {
                return $res->faces[0];
            }, $resp);
            $filenames = $this->detectFaceService->cropImage($images, $arr_sizes, $member->id);
            foreach ($filenames as $src) {
                $this->createMemberImage(array(
                    'member_id' => $member->id,
                    'image_src' => $src
                ));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error create member', array('e' => $e));
            return false;
        }
        DB::commit();
        return true;
    }

    public function updateMember($data, $id)
    {
        try {
            $member = Member::find($id);
            $member->fill($data);
            $member->save();
            return true;
        } catch (\Exception $e) {
            Log::error('Error while updating member', array('e' => $e));
            return false;
        }
    }

    public function getImage($filename)
    {
        try {
            return Storage::path('member/' . $filename);
        } catch (\Exception $e) {
            return null;
        }
    }

    private function createMemberImage($data)
    {
        return ImageMember::create($data);
    }
}
