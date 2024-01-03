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

            $table->double('price');
            $table->boolean('on_discount')->default(0);
            $table->integer('discount')->default(0);
            $table->double('discount_old_price')->default(0);

            $table->integer('quantity')->default(0);
            $table->string('product_code')->unique();
            $table->boolean('instore_available')->default(1);
            $table->boolean('online_available')->default(1);
            $table->boolean('visible')->default(1);

            $table->timestamps();
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
