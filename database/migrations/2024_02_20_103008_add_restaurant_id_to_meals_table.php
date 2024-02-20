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
        Schema::table('meals', function (Blueprint $table) {
            // Inserimento nuovo campo
            $table->unsignedBigInteger('restaurant_id')->nullable()->after('id');

            // Inserimento FK al campo inserito
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meals', function (Blueprint $table) {
            // Drop del vincolo applicato alla chiave esterna
            $table->dropForeign('meals_restaurant_id_foreign');

            // Drop della colonna
            $table->dropColumn('restaurant_id');
        });
    }
};
