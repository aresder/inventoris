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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100)->unique();
            $table->enum('status', ['stock', 'restock'])->default('stock');
            $table->boolean('active')->default(true);
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
