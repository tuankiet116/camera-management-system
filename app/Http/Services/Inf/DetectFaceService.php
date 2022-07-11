<?php

namespace App\Http\Services\Inf;

use CURLFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DetectFaceService
{
    public function detectApi($images)
    {
        $resps = [];
        foreach ($images as $image) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => config('app.api_detect'),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('image' => new CURLFile($image)),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            array_push($resps, json_decode($response));
        }

        foreach ($resps as $res) {
            if ($res->success == false) {
                Log::error('Face Detection Error', $resps);
                throw new \Exception('Face Detection Error');
            }
            if ($res->num_faces > 1) {
                Log::error('Face Detection Face Not Fit', $resps);
                throw new \Exception('Face Detection Face Not Fit');
            }
        }
        return $resps;
    }

    public function cropImage($images, $sizes, $specify_name = null)
    {
        $filenames = [];
        $specify_name = $specify_name ?? strtotime(now());
        try {
            $filenames = array_map(function ($image, $size, $key) use ($specify_name) {
                $rectangle = $this->makeRectangle($size);
                $filename = Auth::id() . '_' . $specify_name . '_' . $key . '.png';
                $image->storeAs('member', $filename);
                if ($image->getClientMimeType() == 'image/png') {
                    $imageGD = imagecreatefrompng(Storage::path('member/' . $filename));    
                } else {
                    $imageGD = imagecreatefromjpeg(Storage::path('member/' . $filename));
                }
                $imageCrop = imagecrop($imageGD, $rectangle);
                imagepng($imageCrop, Storage::path('member/' . $filename));
                return $filename;
            }, $images, $sizes, array_keys($images));
        } catch (\Exception $e) {
            dd($e);
            Log::error('Error while croping image', array('e' => $e));
        }
        return $filenames;
    }

    private function makeRectangle($size) {
        return array(
            'x' => $size[0],
            'y' => $size[1],
            'width' => $size[2] - $size[0],
            'height' => $size[3] - $size[1]
        );
    }
}
