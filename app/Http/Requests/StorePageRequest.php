<?php

namespace App\Http\Requests;

use App\Models\Page;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('page_create');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
            'description_en' => [
                'required',
            ],
            'title_en' => [
                'string',
                'required',
            ],
            'title_ar' => [
                'string',
                'required',
            ],
        ];
    }
}
