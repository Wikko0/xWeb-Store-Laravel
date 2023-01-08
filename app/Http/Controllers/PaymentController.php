<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Omnipay\Common\Http\Exception;
use Omnipay\Omnipay;
Use App\Models\Payment;


class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(false);

    }


    public function charge(Request $request)
    {

         try{
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }else {
                return $response->getMessage();
            }

         } catch(Exception $e) {
return $e->getMessage();
         }
        }


    public function success(Request $request)
    {
        if ($request->paymentId && $request->PayerID) {

            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->PayerID,
                'transactionReference' => $request->paymentId
            ));
            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr_body = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr_body['id'];
                $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr_body['state'];
                $payment->save();

                return redirect()->back()->withSuccess('Payment is successful. You will receive an email with a link to download the website! Check your Email!');
            } else {

                return $response->getMessage();

            }
        } else {
            return redirect()->back()->withErrors('Transaction is declined');
        }
    }

    public function error()
    {
        return redirect()->back()->withErrors('User cancelled the payment');
    }
}
