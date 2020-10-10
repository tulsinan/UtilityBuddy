<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->decimal('amount', 15, 2);
            $table->longText('description')->nullable();
            $table->string('payment_status');
            $table->date('date_due');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}