<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_list = config('db_orders');

        foreach ($order_list as $order) {
            $new_order = new Order();
            $new_order->fill($order);
            $new_order->save();
        }
    }
}
