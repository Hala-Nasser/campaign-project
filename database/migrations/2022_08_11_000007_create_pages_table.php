<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('description_en');
            $table->longText('description_ar')->nullable();
            $table->string('title_en');
            $table->string('title_ar');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
