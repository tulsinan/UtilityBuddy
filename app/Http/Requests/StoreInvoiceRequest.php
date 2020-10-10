<?php

namespace App\Http\Requests;

use App\Models\Invoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_create');
    }

    public function rules()
    {
        return [
            'utility_type_id'        => [
                'required',
                'integer',
            ],
            'utility_companyname_id' => [
                'required',
                'integer',
            ],
            'account_number_id'      => [
                'required',
                'integer',
            ],
            'property_type_id'       => [
                'required',
                'integer',
            ],
            'date'                   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'date_due'               => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'amount'                 => [
                'required',
            ],
            'payment_status'         => [
                'required',
            ],
        ];
    }
}