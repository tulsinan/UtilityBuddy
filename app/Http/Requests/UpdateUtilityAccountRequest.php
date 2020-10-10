<?php

namespace App\Http\Requests;

use App\Models\UtilityAccount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUtilityAccountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('utility_account_edit');
    }

    public function rules()
    {
        return [
            'utility_type_id' => [
                'required',
                'integer',
            ],
            'utility_name_id' => [
                'required',
                'integer',
            ],
            'account_number'  => [
                'string',
                'required',
            ],
            'account_name'    => [
                'string',
                'required',
            ],
            'account_phone'   => [
                'string',
                'required',
            ],
            'property_type'   => [
                'required',
            ],
            'account_status'  => [
                'required',
            ],
            'address_line_1'  => [
                'string',
                'required',
            ],
            'address_line_2'  => [
                'string',
                'nullable',
            ],
            'town'            => [
                'string',
                'required',
            ],
            'city'            => [
                'string',
                'required',
            ],
            'state'           => [
                'required',
            ],
        ];
    }
}