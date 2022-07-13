<?php

namespace App\Jobs;

use App\Http\Services\Inf\DetectFaceService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FaceDetectJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(DetectFaceService $detect, $images, $id)
    {
        $resp = $detect->detectApi($images);
        $arr_sizes = array_map(function ($res) {
            return $res->faces[0];
        }, $resp);
        $filenames = $detect->cropImage($images, $arr_sizes, $id);
        return $filenames;
    }
}
