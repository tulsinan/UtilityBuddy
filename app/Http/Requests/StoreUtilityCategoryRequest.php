<?php

namespace App\Http\Requests;

use App\Models\UtilityCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUtilityCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('utility_category_create');
    }

    public function rules()
    {
        return [
            'utility_type'    => [
                'required',
            ],
            'utility_name'    => [
                'string',
                'required',
            ],
            'utility_website' => [
                'string',
                'nullable',
            ],
        ];
    }
}