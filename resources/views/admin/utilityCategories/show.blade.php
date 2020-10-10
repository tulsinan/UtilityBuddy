@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.utilityCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.utility-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $utilityCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityCategory.fields.utility_type') }}
                        </th>
                        <td>
                            {{ App\Models\UtilityCategory::UTILITY_TYPE_SELECT[$utilityCategory->utility_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityCategory.fields.utility_name') }}
                        </th>
                        <td>
                            {{ $utilityCategory->utility_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityCategory.fields.utility_website') }}
                        </th>
                        <td>
                            {{ $utilityCategory->utility_website }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.utility-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection