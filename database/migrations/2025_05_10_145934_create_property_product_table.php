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
        Schema::create('property_product', function (Blueprint $table) {
            $table->id();
            $table->ForeignId('property_id')->constrained('properties')->onDelete('cascade')->onUpdate('cascade');
            $table->ForeignId('product_id')->constrained('products')->onDelete('cascade')->onUpdate('cascade');
            $table->string('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_product');
    }
};
