<?php

namespace App\Http\Services\Inf;

use CURLFile;
use Illuminate\Support\Facades\Log;

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
            if ($res->success== false) {
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

    public function cropImage() {
        
    }
}
