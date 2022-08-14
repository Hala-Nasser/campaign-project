<?php

namespace App\Http\Requests;

use App\Models\About;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAboutRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('about_edit');
    }

    public function rules()
    {
        return [
            'title_en' => [
                'string',
                'required',
            ],
            'title_ar' => [
                'string',
                'required',
            ],
            'logo' => [
                'required',
            ],
            'description_en' => [
                'required',
            ],
            'key_words_ar' => [
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'website' => [
                'string',
                'required',
            ],
        ];
    }
}
