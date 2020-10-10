<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilityAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('utility_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_number');
            $table->string('account_name');
            $table->string('account_phone');
            $table->string('property_type');
            $table->string('account_status');
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('town');
            $table->string('city');
            $table->string('state');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}