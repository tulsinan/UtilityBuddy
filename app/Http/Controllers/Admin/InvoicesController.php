<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvoiceRequest;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Models\UtilityAccount;
use App\Models\UtilityCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoicesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoices = Invoice::all();

        if ($request->ajax()) {
            $query = Invoice::query();
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            //$table->addColumn('actions', ' ');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'invoices_show';
                $editGate      = 'invoices_edit';
                $deleteGate    = 'invoices_delete';
                $crudRoutePart = 'invoices';

                return view('admin.invoices.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });
        }

        return view('admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $utility_types = UtilityCategory::all()->pluck('utility_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $utility_companynames = UtilityCategory::all()->pluck('utility_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $account_numbers = UtilityAccount::all()->pluck('account_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $property_types = UtilityAccount::all()->pluck('property_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.invoices.create', compact('utility_types', 'utility_companynames', 'account_numbers', 'property_types'));
    }

    public function store(StoreInvoiceRequest $request)
    {
        $invoice = Invoice::create($request->all());

        return redirect()->route('admin.invoices.index');
    }

    public function edit(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $utility_types = UtilityCategory::all()->pluck('utility_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $utility_companynames = UtilityCategory::all()->pluck('utility_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $account_numbers = UtilityAccount::all()->pluck('account_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $property_types = UtilityAccount::all()->pluck('property_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $invoice->load('utility_type', 'utility_companyname', 'account_number', 'property_type', 'created_by');

        return view('admin.invoices.edit', compact('utility_types', 'utility_companynames', 'account_numbers', 'property_types', 'invoice'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->all());

        return redirect()->route('admin.invoices.index');
    }

    public function show(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice->load('utility_type', 'utility_companyname', 'account_number', 'property_type', 'created_by');

        return view('admin.invoices.show', compact('invoice'));
    }

    public function pay(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice->load('utility_type', 'utility_companyname', 'account_number', 'property_type', 'created_by');

        return redirect()->route('admin.invoices.index');
    }

    public function destroy(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceRequest $request)
    {
        Invoice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getInvoiceAmount() 
    {
        if ($this->payment_status == 'Invalid') {
            return false;
        }
        return true;
    }
}