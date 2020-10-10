@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.utilityAccount.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.utility-accounts.update", [$utilityAccount->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="utility_type_id">{{ trans('cruds.utilityAccount.fields.utility_type') }}</label>
                <select class="form-control select2 {{ $errors->has('utility_type') ? 'is-invalid' : '' }}" name="utility_type_id" id="utility_type_id" required>
                    @foreach($utility_types as $id => $utility_type)
                        <option value="{{ $id }}" {{ (old('utility_type_id') ? old('utility_type_id') : $utilityAccount->utility_type->id ?? '') == $id ? 'selected' : '' }}>{{ $utility_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('utility_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('utility_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.utilityAccount.fields.utility_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="utility_name_id">{{ trans('cruds.utilityAccount.fields.utility_name') }}</label>
                <select class="form-control select2 {{ $errors->has('utility_name') ? 'is-invalid' : '' }}" name="utility_name_id" id="utility_name_id" required>
                    @foreach($utility_names as $id => $utility_name)
                        <option value="{{ $id }}" {{ (old('utility_name_id') ? old('utility_name_id') : $utilityAccount->utility_name->id ?? '') == $id ? 'selected' : '' }}>{{ $utility_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('utility_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('utility_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.utilityAccount.fields.utility_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account_number">{{ trans('cruds.utilityAccount.fields.account_number') }}</label>
                <input class="form-control {{ $errors->has('account_number') ? 'is-invalid' : '' }}" type="number" name="account_number" id="account_number" value="{{ old('account_number', $utilityAccount->account_number) }}" step="1" required>
                @if($errors->has('account_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.utilityAccount.fields.account_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account_name">{{ trans('cruds.utilityAccount.fields.account_name') }}</label>
                <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name', $utilityAccount->account_name) }}" required>
                @if($errors->has('account_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.utilityAccount.fields.account_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account_phone">{{ trans('cruds.utilityAccount.fields.account_phone') }}</label>
                <input class="form-control {{ $errors->has('account_phone') ? 'is-invalid' : '' }}" type="text" name="account_phone" id="account_phone" value="{{ old('account_phone', $utilityAccount->account_phone) }}" required>
                @if($errors->has('account_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.utilityAccount.fields.account_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.utilityAccount.fields.property_type') }}</label>
                <select class="form-control {{ $errors->has('property_type') ? 'is-invalid' : '' }}" name="property_type" id="property_type" required>
                    <option value disabled {{ old('property_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\UtilityAccount::PROPERTY_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('property_type', $utilityAccount->property_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('property_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('property_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.utilityAccount.fields.property_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.utilityAccount.fields.account_status') }}</label>
                <select class="form-control {{ $errors->has('account_status') ? 'is-invalid' : '' }}" name="account_status" id="account_status" required>
                    <option value disabled {{ old('account_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\UtilityAccount::ACCOUNT_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('account_status', $utilityAccount->account_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('account_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.utilityAccount.fields.account_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address_line_1">{{ trans('cruds.utilityAccount.fields.address_line_1') }}</label>
                <input class="form-control {{ $errors->has('address_line_1') ? 'is-invalid' : '' }}" type="text" name="address_line_1" id="address_line_1" value="{{ old('address_line_1', $utilityAccount->address_line_1) }}" required>
                @if($errors->has('address_line_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_line_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.utilityAccount.fields.address_line_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_line_2">{{ trans('cruds.utilityAccount.fields.address_line_2') }}</label>
                <input class="form-control {{ $errors->has('address_line_2') ? 'is-invalid' : '' }}" type="text" name="address_line_2" id="address_line_2" value="{{ old('address_line_2', $utilityAccount->address_line_2) }}">
                @if($errors->has('address_line_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_line_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.utilityAccount.fields.address_line_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="town">{{ trans('cruds.utilityAccount.fields.town') }}</label>
                <input class="form-control {{ $errors->has('town') ? 'is-invalid' : '' }}" type="text" name="town" id="town" value="{{ old('town', $utilityAccount->town) }}" required>
                @if($errors->has('town'))
                    <div class="invalid-feedback">
                        {{ $errors->first('town') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.utilityAccount.fields.town_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city">{{ trans('cruds.utilityAccount.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $utilityAccount->city) }}" required>
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.utilityAccount.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.utilityAccount.fields.state') }}</label>
                <select class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" name="state" id="state" required>
                    <option value disabled {{ old('state', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\UtilityAccount::STATE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('state', $utilityAccount->state) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.utilityAccount.fields.state_helper') }}</span>
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