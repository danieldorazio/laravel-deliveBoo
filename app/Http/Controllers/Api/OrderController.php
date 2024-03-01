<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\newOrder;
use App\Mail\newUserOrder;
use App\Models\Meal;
use App\Models\Meal_order;
use App\Models\Order;
use App\Models\User;
use Braintree\Gateway;
use Braintree\Test\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

            // $lastOrder = DB::table('orders')->orderBy('id', 'desc')->first();

            // $restaurantUser = User::w


            Mail::to($form_data['client_email'])->send(new newOrder($order));
            // Mail::to(Auth::user()->email)->send(new newUserOrder($order));


            // ricevo un array di piatti devo spacchettarli, devo prendere l'id dellordine appena creato con $oreder->id si puo fare

            $cart = json_decode($form_data['cart'], true);
            $cartPrimo = $cart[0]['id'];

            foreach ($cart as $meal) {

                $meal_order = new Meal_order();
                $meal_order->meal_id = $meal['id'];
                $meal_order->order_id = $order->id;
                $meal_order->quantity = $meal['quantity'];
                $meal_order->save();
            }



            return response()->json([
                'result' => true,
                // "message" =>  Auth::user($cart[0]['restaurant_id'])->email,
            ]);
        }
    }
}
