@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.paymentGateway.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payment-gateways.update", [$paymentGateway->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="gateway_name">{{ trans('cruds.paymentGateway.fields.gateway_name') }}</label>
                <input class="form-control {{ $errors->has('gateway_name') ? 'is-invalid' : '' }}" type="text" name="gateway_name" id="gateway_name" value="{{ old('gateway_name', $paymentGateway->gateway_name) }}" required>
                @if($errors->has('gateway_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gateway_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentGateway.fields.gateway_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gateway_address">{{ trans('cruds.paymentGateway.fields.gateway_address') }}</label>
                <input class="form-control {{ $errors->has('gateway_address') ? 'is-invalid' : '' }}" type="text" name="gateway_address" id="gateway_address" value="{{ old('gateway_address', $paymentGateway->gateway_address) }}" required>
                @if($errors->has('gateway_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gateway_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paymentGateway.fields.gateway_address_helper') }}</span>
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