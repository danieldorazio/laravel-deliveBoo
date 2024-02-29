<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Braintree\Gateway;
use Braintree\Test\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request, Gateway $gateway) {
        
        $form_data = $request->all();

        $result = $gateway->transaction()->sale([
            'amount'                   => $form_data["total"], 
            'paymentMethodNonce'       =>$form_data["payment_method_nonce"],
            'options'                  => [
                'submitForSettlement'  => true
            ]
            ]);

            if($result->success) {
                return response()->json([
                    'result' => true,
                    "message" => $request->all(),
                ]);


                $order = new Order();
                $order->fill($form_data);
                $order->save();
            }
    }
}
