<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContactFieldsTable extends Migration
{
    public function up()
    {
        Schema::table('contact_fields', function (Blueprint $table) {
            $table->unsignedBigInteger('about_id')->nullable();
            $table->foreign('about_id', 'about_fk_7124793')->references('id')->on('abouts');
        });
    }
}
