<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PPHandler;
use App\Models\Invoice;
use App\Models\UtilityAccount;
use App\Models\UtilityCategory;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Http\Request;

class PaypalController extends Controller
{
    protected $provider;
    public function __construct() 
    {
        $this->provider = new ExpressCheckout();
    }
    public function getExpressCheckout(Request $request, $id)
    {
        $id = $id;
        $invData = $this->invoiceData($id);

        $provider = new ExpressCheckout();
        $response = $provider->setExpressCheckout($invData, true);

        return redirect($response['paypal_link']);        
    }

    private function invoiceData($invID)
    {
        $inv = Invoice::find($invID);
        $invoiceData = [];
        $invoiceData['items'] = [
            [
                'name' => 'test name',
                'price' => $inv['amount'],
                'desc' => 'test desc',
                'qty' => 1
            ]
        ];

        $invoiceData['invoice_id'] = uniqid();
        $invoiceData['invoice_description'] = "test invoice description";
        $invoiceData['return_url'] = route('paypal.success', $invID);
        $invoiceData['cancel_url'] = route('paypal.cancel');

        $invoiceData['total'] = $inv['amount'];

        $invoiceData['shipping_discount'] = 0;

        return $invoiceData;

    }
    public function cancelPage()
    {
        dd('Payment Failed');
    }
    public function getExpressCheckoutSuccess(Request $request, $invID)
    {

        $token = $request->get('token');
        $payerId = $request->get('PayerID');
        $provider = new ExpressCheckout();
        $invoiceData = $this->invoiceData($invID);

        $response = $provider->getExpressCheckoutDetails($token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            // Perform transaction on PayPal
            $payment_status = $provider->doExpressCheckoutPayment($invoiceData, $token, $payerId);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

            if(in_array($status, ['Completed','Processed'])) {
                $inv2 = Invoice::find($invID);
                $inv2->payment_status = "pay_success";
                $inv2->save();

                //send mail
                //Mail::to($order->user->email)->send(new OrderPaid($order));

                return redirect()->route('admin.invoices.index', $invID)->withMessage('Payment Successful!');
            }

        }
        return redirect()->route('admin.invoices.show', $invID)->withError('Payment unsuccessful!');
    }
}
