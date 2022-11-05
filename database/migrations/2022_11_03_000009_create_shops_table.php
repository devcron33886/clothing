<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name')->nullable();
            $table->string('phone_number_1')->nullable();
            $table->string('phone_number_2');
            $table->string('whatsapp');
            $table->string('email_1');
            $table->longText('email_2')->nullable();
            $table->string('address');
            $table->longText('about')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
