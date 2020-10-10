<?php

namespace App\Http\Requests;

use App\Models\PaymentHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaymentHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_history_edit');
    }

    public function rules()
    {
        return [
            'account_number_id' => [
                'required',
                'integer',
            ],
            'invoice_date_id'   => [
                'required',
                'integer',
            ],
            'invoice_amount_id' => [
                'required',
                'integer',
            ],
            'gateway_name_id'   => [
                'required',
                'integer',
            ],
            'payment_status'    => [
                'required',
            ],
            'payment_date'      => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}