<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_7211860')->references('id')->on('users');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->foreign('payment_id', 'payment_fk_7570077')->references('id')->on('payment_methods');
            $table->unsignedBigInteger('shipping_id')->nullable();
            $table->foreign('shipping_id', 'shipping_fk_7570078')->references('id')->on('shipping_types');
        });
    }
}
