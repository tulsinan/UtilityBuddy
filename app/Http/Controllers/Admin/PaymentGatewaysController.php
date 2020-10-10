<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaymentGatewayRequest;
use App\Http\Requests\StorePaymentGatewayRequest;
use App\Http\Requests\UpdatePaymentGatewayRequest;
use App\Models\PaymentGateway;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentGatewaysController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_gateway_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentGateways = PaymentGateway::all();

        return view('admin.paymentGateways.index', compact('paymentGateways'));
    }

    public function create()
    {
        abort_if(Gate::denies('payment_gateway_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentGateways.create');
    }

    public function store(StorePaymentGatewayRequest $request)
    {
        $paymentGateway = PaymentGateway::create($request->all());

        return redirect()->route('admin.payment-gateways.index');
    }

    public function edit(PaymentGateway $paymentGateway)
    {
        abort_if(Gate::denies('payment_gateway_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentGateways.edit', compact('paymentGateway'));
    }

    public function update(UpdatePaymentGatewayRequest $request, PaymentGateway $paymentGateway)
    {
        $paymentGateway->update($request->all());

        return redirect()->route('admin.payment-gateways.index');
    }

    public function show(PaymentGateway $paymentGateway)
    {
        abort_if(Gate::denies('payment_gateway_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentGateways.show', compact('paymentGateway'));
    }

    public function destroy(PaymentGateway $paymentGateway)
    {
        abort_if(Gate::denies('payment_gateway_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentGateway->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentGatewayRequest $request)
    {
        PaymentGateway::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}