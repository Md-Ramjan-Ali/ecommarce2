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
        Schema::create('fund_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('direction', 20)->default('in'); // in|out
            $table->string('source', 50)->nullable();
            $table->unsignedBigInteger('source_id')->nullable();
            $table->decimal('amount', 14, 2);
            $table->text('note')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_transactions');
    }
};
