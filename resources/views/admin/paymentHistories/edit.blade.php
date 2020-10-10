@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.paymentHistory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payment-histories.update", [$paymentHistory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="account_number_id">{{ trans('cruds.paymentHistory.fields.account_number') }}</label>
                <select class="form-control select2 {{ $errors->has('account_number') ? 'is-invalid' : '' }}" name="account_number_id" id="account_number_id" required>
                    @foreach($account_numbers as $id => $account_number)
                        <option value="{{ $id }}" {{ (old('account_number_id') ? old('account_number_id') : $paymentHistory->account_number->id ?? '') == $id ? 'selected' : '' }}>{{ $account_number }}</option>
                    @endforeach
                </select>
                @if($errors->has('account_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentHistory.fields.account_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="invoice_date_id">{{ trans('cruds.paymentHistory.fields.invoice_date') }}</label>
                <select class="form-control select2 {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}" name="invoice_date_id" id="invoice_date_id" required>
                    @foreach($invoice_dates as $id => $invoice_date)
                        <option value="{{ $id }}" {{ (old('invoice_date_id') ? old('invoice_date_id') : $paymentHistory->invoice_date->id ?? '') == $id ? 'selected' : '' }}>{{ $invoice_date }}</option>
                    @endforeach
                </select>
                @if($errors->has('invoice_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentHistory.fields.invoice_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="invoice_amount_id">{{ trans('cruds.paymentHistory.fields.invoice_amount') }}</label>
                <select class="form-control select2 {{ $errors->has('invoice_amount') ? 'is-invalid' : '' }}" name="invoice_amount_id" id="invoice_amount_id" required>
                    @foreach($invoice_amounts as $id => $invoice_amount)
                        <option value="{{ $id }}" {{ (old('invoice_amount_id') ? old('invoice_amount_id') : $paymentHistory->invoice_amount->id ?? '') == $id ? 'selected' : '' }}>{{ $invoice_amount }}</option>
                    @endforeach
                </select>
                @if($errors->has('invoice_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentHistory.fields.invoice_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gateway_name_id">{{ trans('cruds.paymentHistory.fields.gateway_name') }}</label>
                <select class="form-control select2 {{ $errors->has('gateway_name') ? 'is-invalid' : '' }}" name="gateway_name_id" id="gateway_name_id" required>
                    @foreach($gateway_names as $id => $gateway_name)
                        <option value="{{ $id }}" {{ (old('gateway_name_id') ? old('gateway_name_id') : $paymentHistory->gateway_name->id ?? '') == $id ? 'selected' : '' }}>{{ $gateway_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('gateway_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gateway_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentHistory.fields.gateway_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.paymentHistory.fields.payment_status') }}</label>
                <select class="form-control {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" name="payment_status" id="payment_status" required>
                    <option value disabled {{ old('payment_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PaymentHistory::PAYMENT_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_status', $paymentHistory->payment_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentHistory.fields.payment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_date">{{ trans('cruds.paymentHistory.fields.payment_date') }}</label>
                <input class="form-control date {{ $errors->has('payment_date') ? 'is-invalid' : '' }}" type="text" name="payment_date" id="payment_date" value="{{ old('payment_date', $paymentHistory->payment_date) }}">
                @if($errors->has('payment_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentHistory.fields.payment_date_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection