<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('order_number');
            $table->foreignId('user_id')->constrained();
            $table->text('delivery_address');
            $table->unsignedInteger('total_items')->nullable();
            $table->unsignedInteger('total_excl')->nullable();
            $table->unsignedInteger('total_delivery')->nullable();
            $table->unsignedInteger('total_vat')->nullable();
            $table->unsignedInteger('total_due')->nullable();
            $table->unsignedTinyInteger('status');
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
}
