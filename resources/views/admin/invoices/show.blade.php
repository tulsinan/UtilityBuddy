@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.pay') }} {{ trans('cruds.invoice.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

            <br />

            <div class="row">
                @if($invoice->utility_companyname->utility_name == "Tenaga Nasional Berhad")
                    <div class="col-sm-4 mb-3 mb-md-0">
                        <div class="card border-info">
                            <div class="card-body text-center">
                                <h5 class="card-title">TNB Express Payment</h5>
                                <p class="card-text">We recommend TNB Express Payment as our preferred payment method.</p>
                                <a href="https://myaccount.mytnb.com.my/Payment/QuickPay/Search?caNumber={{ $invoice->account_number->account_number }}" class="btn btn-primary" target="_blank">Pay Now</a>
                            </div>
                        </div>
                    </div>
                @elseif($invoice->utility_companyname->utility_name == "Air Selangor")
                <div class="col-sm-4 mb-3 mb-md-0">
                        <div class="card border-info">
                            <div class="card-body text-center">
                                <h5 class="card-title">Air Selangor Express Payment</h5>
                                <p class="card-text">We recommend Air Selangor Express Payment as our preferred payment method.</p>
                                <a href="#!" class="btn btn-primary" target="_blank">Pay Now</a>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-sm-4">
                    <div class="card border-primary">
                        <div class="card-body text-center">
                            <h5 class="card-title">PayPal</h5>
                            <p class="card-text">If the recommended payment method does not work, we facilitate bill transactions via PayPal.</p>
                            <a href="{{ route('paypal.checkout', $invoice->id) }}" class="btn btn-primary" target="_blank"> Pay Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card border-dark">
                        <div class="card-body text-center">
                            <h5 class="card-title">jomPAY</h5>
                            <p class="card-text">As an alternative, customers can choose to pay their bills via jomPAY.</p>
                            <a href="#!" class="btn btn-primary" target="_blank">Pay Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <hr /> 
            <br />   

            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.id') }}
                        </th>
                        <td>
                            {{ $invoice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.utility_type') }}
                        </th>
                        <td>
                            {{ $invoice->utility_type->utility_type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.utility_companyname') }}
                        </th>
                        <td>
                            {{ $invoice->utility_companyname->utility_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.account_number') }}
                        </th>
                        <td>
                            {{ $invoice->account_number->account_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.property_type') }}
                        </th>
                        <td>
                            {{ $invoice->property_type->property_type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.date') }}
                        </th>
                        <td>
                            {{ $invoice->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.date_due') }}
                        </th>
                        <td>
                            {{ $invoice->date_due }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.amount') }}
                        </th>
                        <td>
                            {{ $invoice->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.description') }}
                        </th>
                        <td>
                            {{ $invoice->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.payment_status') }}
                        </th>
                        <td>
                            {{ App\Models\Invoice::PAYMENT_STATUS_SELECT[$invoice->payment_status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <br />
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection