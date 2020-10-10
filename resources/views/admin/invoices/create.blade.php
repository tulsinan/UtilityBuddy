@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.invoice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.invoices.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="utility_type_id">{{ trans('cruds.invoice.fields.utility_type') }}</label>
                <select class="form-control select2 {{ $errors->has('utility_type') ? 'is-invalid' : '' }}" name="utility_type_id" id="utility_type_id" required>
                    @foreach($utility_types as $id => $utility_type)
                        <option value="{{ $id }}" {{ old('utility_type_id') == $id ? 'selected' : '' }}>{{ $utility_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('utility_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('utility_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.utility_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="utility_companyname_id">{{ trans('cruds.invoice.fields.utility_companyname') }}</label>
                <select class="form-control select2 {{ $errors->has('utility_companyname') ? 'is-invalid' : '' }}" name="utility_companyname_id" id="utility_companyname_id" required>
                    @foreach($utility_companynames as $id => $utility_companyname)
                        <option value="{{ $id }}" {{ old('utility_companyname_id') == $id ? 'selected' : '' }}>{{ $utility_companyname }}</option>
                    @endforeach
                </select>
                @if($errors->has('utility_companyname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('utility_companyname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.utility_companyname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account_number_id">{{ trans('cruds.invoice.fields.account_number') }}</label>
                <select class="form-control select2 {{ $errors->has('account_number') ? 'is-invalid' : '' }}" name="account_number_id" id="account_number_id" required>
                    @foreach($account_numbers as $id => $account_number)
                        <option value="{{ $id }}" {{ old('account_number_id') == $id ? 'selected' : '' }}>{{ $account_number }}</option>
                    @endforeach
                </select>
                @if($errors->has('account_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.account_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="property_type_id">{{ trans('cruds.invoice.fields.property_type') }}</label>
                <select class="form-control select2 {{ $errors->has('property_type') ? 'is-invalid' : '' }}" name="property_type_id" id="property_type_id" required>
                    @foreach($property_types as $id => $property_type)
                        <option value="{{ $id }}" {{ old('property_type_id') == $id ? 'selected' : '' }}>{{ $property_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('property_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('property_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.property_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.invoice.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_due">{{ trans('cruds.invoice.fields.date_due') }}</label>
                <input class="form-control date {{ $errors->has('date_due') ? 'is-invalid' : '' }}" type="text" name="date_due" id="date_due" value="{{ old('date_due') }}" required>
                @if($errors->has('date_due'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_due') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.date_due_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.invoice.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.invoice.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.invoice.fields.payment_status') }}</label>
                <select class="form-control {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" name="payment_status" id="payment_status" required>
                    <option value disabled {{ old('payment_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Invoice::PAYMENT_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.payment_status_helper') }}</span>
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