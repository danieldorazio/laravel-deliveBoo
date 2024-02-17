<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('payment');
            $table->date('date');
            $table->string('client_email');
            $table->string('client_name');
            $table->string('delivery_address');
            $table->dateTime('delivery_time');
            $table->decimal('delivery_total_price');
            $table->string('status_delivery');
            $table->char('client_phone',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
