<?php

namespace App\Http\Requests;

use App\Models\UtilityCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUtilityCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('utility_category_edit');
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