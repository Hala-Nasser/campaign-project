<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactFieldsTable extends Migration
{
    public function up()
    {
        Schema::create('contact_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('value');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
