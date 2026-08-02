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
        if (!Schema::hasTable('sms_gateways')) {
            Schema::create('sms_gateways', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->string('url')->nullable();
                $table->string('api_key')->nullable();
                $table->string('serderid')->nullable();
                $table->string('senderid')->nullable();
                $table->tinyInteger('status')->default(0);
                $table->tinyInteger('order')->default(0);
                $table->tinyInteger('forget_pass')->default(0);
                $table->tinyInteger('password_g')->default(0);
                $table->string('admin_phone')->nullable();
                $table->timestamps();
            });
        } else {
            Schema::table('sms_gateways', function (Blueprint $table) {
                if (!Schema::hasColumn('sms_gateways', 'title')) {
                    $table->string('title')->nullable();
                }
                if (!Schema::hasColumn('sms_gateways', 'order')) {
                    $table->tinyInteger('order')->default(0);
                }
                if (!Schema::hasColumn('sms_gateways', 'forget_pass')) {
                    $table->tinyInteger('forget_pass')->default(0);
                }
                if (!Schema::hasColumn('sms_gateways', 'password_g')) {
                    $table->tinyInteger('password_g')->default(0);
                }
                if (!Schema::hasColumn('sms_gateways', 'admin_phone')) {
                    $table->string('admin_phone')->nullable();
                }
                if (!Schema::hasColumn('sms_gateways', 'senderid')) {
                    $table->string('senderid')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_gateways');
    }
};
