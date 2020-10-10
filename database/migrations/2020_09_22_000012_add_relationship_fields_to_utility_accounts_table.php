<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUtilityAccountsTable extends Migration
{
    public function up()
    {
        Schema::table('utility_accounts', function (Blueprint $table) {
            $table->unsignedInteger('utility_name_id');
            $table->foreign('utility_name_id', 'utility_name_fk_2240269')->references('id')->on('utility_categories');
            $table->unsignedInteger('utility_type_id');
            $table->foreign('utility_type_id', 'utility_type_fk_2240375')->references('id')->on('utility_categories');
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2240482')->references('id')->on('users');
        });
    }
}