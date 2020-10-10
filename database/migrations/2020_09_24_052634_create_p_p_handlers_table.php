<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePPHandlersTable extends Migration
{
    public function up()
    {
        Schema::create('p_p_handlers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->double('price', 2);
            $table->string('payment_status')->nullable();
            $table->string('recurring_id')->nullable();
            $table->timestamps();
       });
    }
}
