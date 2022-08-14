<?php

namespace App\Http\Requests;

use App\Models\ContactField;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContactFieldRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_field_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'value' => [
                'string',
                'required',
            ],
            'about_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
