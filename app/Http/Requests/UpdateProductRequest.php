<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'image' => [
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
            'price' => [
                'required',
            ],
            'discount_percentage' => [
                'numeric',
                'required',
            ],
            'description_en' => [
                'required',
            ],
            'description_ar' => [
                'required',
            ],
            'link' => [
                'string',
                'required',
            ],
        ];
    }
}
