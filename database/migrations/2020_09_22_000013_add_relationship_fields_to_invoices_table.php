<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInvoicesTable extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedInteger('utility_type_id');
            $table->foreign('utility_type_id', 'utility_type_fk_2240470')->references('id')->on('utility_categories');
            $table->unsignedInteger('utility_companyname_id');
            $table->foreign('utility_companyname_id', 'utility_companyname_fk_2240471')->references('id')->on('utility_categories');
            $table->unsignedInteger('account_number_id');
            $table->foreign('account_number_id', 'account_number_fk_2240472')->references('id')->on('utility_accounts');
            $table->unsignedInteger('property_type_id');
            $table->foreign('property_type_id', 'property_type_fk_2240473')->references('id')->on('utility_accounts');
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2240481')->references('id')->on('users');
        });
    }
}