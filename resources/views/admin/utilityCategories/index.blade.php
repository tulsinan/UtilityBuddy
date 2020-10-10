@extends('layouts.admin')
@section('content')
@can('utility_category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.utility-categories.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.utilityCategory.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.utilityCategory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-UtilityCategory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.utilityCategory.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.utilityCategory.fields.utility_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.utilityCategory.fields.utility_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.utilityCategory.fields.utility_website') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($utilityCategories as $key => $utilityCategory)
                        <tr data-entry-id="{{ $utilityCategory->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $utilityCategory->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\UtilityCategory::UTILITY_TYPE_SELECT[$utilityCategory->utility_type] ?? '' }}
                            </td>
                            <td>
                                {{ $utilityCategory->utility_name ?? '' }}
                            </td>
                            <td>
                                {{ $utilityCategory->utility_website ?? '' }}
                            </td>
                            <td>
                                @can('utility_category_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.utility-categories.show', $utilityCategory->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('utility_category_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.utility-categories.edit', $utilityCategory->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('utility_category_delete')
                                    <form action="{{ route('admin.utility-categories.destroy', $utilityCategory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('utility_category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.utility-categories.massDestroy') }}",
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
  let table = $('.datatable-UtilityCategory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection