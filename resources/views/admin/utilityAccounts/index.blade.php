@extends('layouts.admin')
@section('content')
@can('utility_account_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.utility-accounts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.utilityAccount.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.utilityAccount.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-UtilityAccount">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.utility_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.utility_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.account_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.account_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.account_phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.property_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.account_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.address_line_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.address_line_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.town') }}
                        </th>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.utilityAccount.fields.state') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($utilityAccounts as $key => $utilityAccount)
                        <tr data-entry-id="{{ $utilityAccount->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $utilityAccount->id ?? '' }}
                            </td>
                            <td>
                                {{ $utilityAccount->utility_type->utility_type ?? '' }}
                            </td>
                            <td>
                                {{ $utilityAccount->utility_name->utility_name ?? '' }}
                            </td>
                            <td>
                                {{ $utilityAccount->account_number ?? '' }}
                            </td>
                            <td>
                                {{ $utilityAccount->account_name ?? '' }}
                            </td>
                            <td>
                                {{ $utilityAccount->account_phone ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\UtilityAccount::PROPERTY_TYPE_SELECT[$utilityAccount->property_type] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\UtilityAccount::ACCOUNT_STATUS_SELECT[$utilityAccount->account_status] ?? '' }}
                            </td>
                            <td>
                                {{ $utilityAccount->address_line_1 ?? '' }}
                            </td>
                            <td>
                                {{ $utilityAccount->address_line_2 ?? '' }}
                            </td>
                            <td>
                                {{ $utilityAccount->town ?? '' }}
                            </td>
                            <td>
                                {{ $utilityAccount->city ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\UtilityAccount::STATE_SELECT[$utilityAccount->state] ?? '' }}
                            </td>
                            <td>
                                @can('utility_account_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.utility-accounts.show', $utilityAccount->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('utility_account_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.utility-accounts.edit', $utilityAccount->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('utility_account_delete')
                                    <form action="{{ route('admin.utility-accounts.destroy', $utilityAccount->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('utility_account_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.utility-accounts.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-UtilityAccount:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection