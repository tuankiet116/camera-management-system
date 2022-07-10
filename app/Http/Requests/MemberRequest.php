<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        return [
            'name' => 'required',
            'image_front_1' => 'required|mimetypes:' . IMAGES_MIME_TYPE,
            'image_front_2' => 'required|mimetypes:' . IMAGES_MIME_TYPE,
            'image_front_3' => 'required|mimetypes:' . IMAGES_MIME_TYPE,
            'image_right_1' => 'required|mimetypes:' . IMAGES_MIME_TYPE,
            'image_right_2' => 'required|mimetypes:' . IMAGES_MIME_TYPE,
            'image_right_3' => 'required|mimetypes:' . IMAGES_MIME_TYPE,
            'image_left_1' => 'required|mimetypes:' . IMAGES_MIME_TYPE,
            'image_left_2' => 'required|mimetypes:' . IMAGES_MIME_TYPE,
            'image_left_3' => 'required|mimetypes:' . IMAGES_MIME_TYPE,
        ];
    }
}
