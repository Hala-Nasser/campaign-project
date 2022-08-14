<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('job_title_en');
            $table->string('job_title_ar');
            $table->longText('description_en');
            $table->longText('description_ar');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
