<?php

namespace App\Http\Requests;

use App\Models\Partner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePartnerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('partner_create');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
            'name_en' => [
                'string',
                'required',
            ],
            'name_ar' => [
                'string',
                'required',
            ],
            'job_title_en' => [
                'string',
                'required',
            ],
            'job_title_ar' => [
                'string',
                'required',
            ],
            'description_en' => [
                'required',
            ],
            'description_ar' => [
                'required',
            ],
        ];
    }
}
