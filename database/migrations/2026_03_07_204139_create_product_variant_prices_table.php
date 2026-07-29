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
        if (!Schema::hasTable('product_variant_prices')) {
            Schema::create('product_variant_prices', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('product_id');
                $table->unsignedBigInteger('color_id')->nullable();
                $table->unsignedBigInteger('size_id')->nullable();
                $table->decimal('price', 10, 2)->default(0.00);
                $table->integer('stock')->default(0);
                $table->string('sku')->nullable();

                $table->index('product_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variant_prices');
    }
};
