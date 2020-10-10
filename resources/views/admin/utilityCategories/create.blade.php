@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.utilityCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.utility-categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.utilityCategory.fields.utility_type') }}</label>
                <select class="form-control {{ $errors->has('utility_type') ? 'is-invalid' : '' }}" name="utility_type" id="utility_type" required>
                    <option value disabled {{ old('utility_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\UtilityCategory::UTILITY_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('utility_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('utility_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('utility_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.utilityCategory.fields.utility_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="utility_name">{{ trans('cruds.utilityCategory.fields.utility_name') }}</label>
                <input class="form-control {{ $errors->has('utility_name') ? 'is-invalid' : '' }}" type="text" name="utility_name" id="utility_name" value="{{ old('utility_name', '') }}" required>
                @if($errors->has('utility_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('utility_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.utilityCategory.fields.utility_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="utility_website">{{ trans('cruds.utilityCategory.fields.utility_website') }}</label>
                <input class="form-control {{ $errors->has('utility_website') ? 'is-invalid' : '' }}" type="text" name="utility_website" id="utility_website" value="{{ old('utility_website', '') }}">
                @if($errors->has('utility_website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('utility_website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.utilityCategory.fields.utility_website_helper') }}</span>
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