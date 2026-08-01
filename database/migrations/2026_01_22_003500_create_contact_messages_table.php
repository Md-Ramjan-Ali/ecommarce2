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
        if (!Schema::hasTable('contact_messages')) {
            Schema::create('contact_messages', function (Blueprint $table) {
                $table->id();
                $table->string('full_name')->nullable();
                $table->string('mobile', 50)->nullable();
                $table->string('email')->nullable();
                $table->string('subject')->nullable();
                $table->text('details')->nullable();
                $table->tinyInteger('status')->default(0)->comment('0=pending/unread, 1=seen/read');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
