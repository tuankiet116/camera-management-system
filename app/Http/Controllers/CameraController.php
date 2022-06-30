<?php

namespace App\Http\Controllers;

use App\Http\Services\CameraService;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    private $cameraService;

    public function __construct(CameraService $cameraService)
    {
        $this->cameraService = $cameraService;
    }

    public function list()
    {
        $data = $this->cameraService->all();
        return view('users.camera.list', compact('data'));
    }

    public function stream(Request $id)
    {
        return view('users.camera.stream');
    }
}
