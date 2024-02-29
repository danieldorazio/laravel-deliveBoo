<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Braintree\Gateway;
use Braintree\Test\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request, Gateway $gateway)
    {

        $form_data = $request->all();

        $result = $gateway->transaction()->sale([
            'amount'                   => $form_data["total"],
            'paymentMethodNonce'       => $form_data["payment_method_nonce"],
            'options'                  => [
                'submitForSettlement'  => true
            ]
        ]);

        if ($result->success) {

            $order = new Order();
            $order->payment = $form_data['payment'];
            $order->date = $form_data['date'];
            $order->client_email = $form_data['client_email'];
            $order->client_name = $form_data['client_name'];
            $order->delivery_address = $form_data['delivery_address'];
            $order->delivery_time = $form_data['delivery_time'];
            $order->client_phone = $form_data['client_phone'];
            // $order->fill($form_data);
            $order->save();


            return response()->json([
                'result' => true,
                "message" => $request->all(),
            ]);
        }
    }
}
