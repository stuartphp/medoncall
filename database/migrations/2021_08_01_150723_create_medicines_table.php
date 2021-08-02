<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('nappi_code',15 );
            $table->string('regno', 50)->nullable();
            $table->char('schedule', 5)->nullable();
            $table->string('generic_name');
            $table->string('product_name');
            $table->text('description')->nullable();
            $table->enum('category', ['General','Herbal','Pharmaceutical', 'Steroids']);
            $table->string('dosage_form', 50)->nullable();
            $table->unsignedSmallInteger('pack_size');
            $table->string('num_packs',50)->nullable();
            $table->unsignedInteger('cost_price'); // sep
            $table->unsignedInteger('cost_per_unit')->nullable();
            $table->unsignedInteger('dispensing_fee')->nullable();
            $table->unsignedInteger('add_on_fee')->default(5000);
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('medicines');
    }
}
