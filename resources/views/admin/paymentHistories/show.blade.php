@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.paymentHistory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payment-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentHistory.fields.id') }}
                        </th>
                        <td>
                            {{ $paymentHistory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentHistory.fields.account_number') }}
                        </th>
                        <td>
                            {{ $paymentHistory->account_number->account_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentHistory.fields.invoice_date') }}
                        </th>
                        <td>
                            {{ $paymentHistory->invoice_date->date ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentHistory.fields.invoice_amount') }}
                        </th>
                        <td>
                            {{ $paymentHistory->invoice_amount->amount ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentHistory.fields.gateway_name') }}
                        </th>
                        <td>
                            {{ $paymentHistory->gateway_name->gateway_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentHistory.fields.payment_status') }}
                        </th>
                        <td>
                            {{ App\Models\PaymentHistory::PAYMENT_STATUS_SELECT[$paymentHistory->payment_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentHistory.fields.payment_date') }}
                        </th>
                        <td>
                            {{ $paymentHistory->payment_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payment-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection