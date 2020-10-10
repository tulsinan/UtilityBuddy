<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilityCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('utility_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('utility_name');
            $table->string('utility_website')->nullable();
            $table->string('utility_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}