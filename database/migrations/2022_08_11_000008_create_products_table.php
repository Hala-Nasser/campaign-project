<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_en');
            $table->string('title_ar');
            $table->decimal('price', 15, 2);
            $table->float('discount_percentage', 15, 2);
            $table->longText('description_en');
            $table->longText('description_ar');
            $table->string('link');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
