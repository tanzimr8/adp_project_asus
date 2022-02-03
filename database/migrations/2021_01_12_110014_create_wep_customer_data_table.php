<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWepCustomerDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wep_customer_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('model');
            $table->string('serial'); //fixed length
            $table->string('retailer');
            $table->string('shop');
            $table->date('purchase_date');
            $table->string('invoice');
            $table->string('img_invoice')->default('default.png');
            $table->string('status')->default('None');
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
        Schema::dropIfExists('wep_customer_data');
    }
}
