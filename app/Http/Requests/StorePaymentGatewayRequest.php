<?php

namespace App\Http\Requests;

use App\Models\PaymentGateway;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentGatewayRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_gateway_create');
    }

    public function rules()
    {
        return [
            'gateway_name'    => [
                'string',
                'required',
            ],
            'gateway_address' => [
                'string',
                'required',
            ],
        ];
    }
}