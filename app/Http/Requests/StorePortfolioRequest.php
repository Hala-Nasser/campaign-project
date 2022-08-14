<?php

namespace App\Http\Requests;

use App\Models\Portfolio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePortfolioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('portfolio_create');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
