<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('introduction');
            $table->longText('description');
            $table->string('banner');
            $table->longText('images');
            $table->string('color');
            $table->string('karat');
            $table->string('gender');
            $table->string('material');
            $table->unsignedBigInteger('type_id');
            $table->string('product_code')->unique();
            $table->boolean('visible')->default(1);

            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
