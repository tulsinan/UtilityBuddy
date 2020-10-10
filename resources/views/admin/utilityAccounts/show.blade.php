@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.utilityAccount.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.utility-accounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.id') }}
                        </th>
                        <td>
                            {{ $utilityAccount->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.utility_type') }}
                        </th>
                        <td>
                            {{ $utilityAccount->utility_type->utility_type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.utility_name') }}
                        </th>
                        <td>
                            {{ $utilityAccount->utility_name->utility_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.account_number') }}
                        </th>
                        <td>
                            {{ $utilityAccount->account_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.account_name') }}
                        </th>
                        <td>
                            {{ $utilityAccount->account_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.account_phone') }}
                        </th>
                        <td>
                            {{ $utilityAccount->account_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.property_type') }}
                        </th>
                        <td>
                            {{ App\Models\UtilityAccount::PROPERTY_TYPE_SELECT[$utilityAccount->property_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.account_status') }}
                        </th>
                        <td>
                            {{ App\Models\UtilityAccount::ACCOUNT_STATUS_SELECT[$utilityAccount->account_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.address_line_1') }}
                        </th>
                        <td>
                            {{ $utilityAccount->address_line_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.address_line_2') }}
                        </th>
                        <td>
                            {{ $utilityAccount->address_line_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.town') }}
                        </th>
                        <td>
                            {{ $utilityAccount->town }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.city') }}
                        </th>
                        <td>
                            {{ $utilityAccount->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.state') }}
                        </th>
                        <td>
                            {{ App\Models\UtilityAccount::STATE_SELECT[$utilityAccount->state] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.utility-accounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection