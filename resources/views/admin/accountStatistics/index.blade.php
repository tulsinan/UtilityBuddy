@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('cruds.accountStatistic.title') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Invoice">
                <thead>
                    <tr>
                        <th width="1">

                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.utility_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.utility_companyname') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.account_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.property_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.date_due') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.payment_status') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $key => $invoice)
                        <tr data-entry-id="{{ $invoice->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $invoice->id ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->utility_type->utility_type ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->utility_companyname->utility_name ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->account_number->account_number ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->property_type->property_type ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->date ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->date_due ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->amount ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->description ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Invoice::PAYMENT_STATUS_SELECT[$invoice->payment_status] ?? '' }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection