<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentHistoriesTable extends Migration
{
    public function up()
    {
        Schema::table('payment_histories', function (Blueprint $table) {
            $table->unsignedInteger('account_number_id');
            $table->foreign('account_number_id', 'account_number_fk_2240540')->references('id')->on('utility_accounts');
            $table->unsignedInteger('invoice_date_id');
            $table->foreign('invoice_date_id', 'invoice_date_fk_2240541')->references('id')->on('invoices');
            $table->unsignedInteger('invoice_amount_id');
            $table->foreign('invoice_amount_id', 'invoice_amount_fk_2240542')->references('id')->on('invoices');
            $table->unsignedInteger('gateway_name_id');
            $table->foreign('gateway_name_id', 'gateway_name_fk_2240543')->references('id')->on('payment_gateways');
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2240556')->references('id')->on('users');
        });
    }
}