<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_en');
            $table->string('title_ar');
            $table->longText('description_en');
            $table->longText('description_ar')->nullable();
            $table->longText('key_words_en')->nullable();
            $table->longText('key_words_ar');
            $table->string('phone');
            $table->string('email');
            $table->string('website');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
