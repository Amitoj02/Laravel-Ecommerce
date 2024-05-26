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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();

            $table->string('item_code')->unique()->nullable();
            $table->string('item_name')->nullable();
            $table->string('image')->nullable();
            $table->string('report_id')->unique()->nullable();

            $table->string('gender')->nullable();
            $table->double('gross_weight')->nullable();
            $table->double('net_weight')->nullable();
            $table->string('karat')->nullable();
            $table->string('diamond_quality')->nullable();
            $table->decimal('diamond_weight')->nullable();
            $table->double('diamond_pcs')->nullable();
            $table->string('color_stone')->nullable();
            $table->boolean('in_stock')->default(true);

            $table->longText('others')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
