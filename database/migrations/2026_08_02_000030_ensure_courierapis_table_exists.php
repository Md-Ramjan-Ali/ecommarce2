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
        if (!Schema::hasTable('courierapis')) {
            Schema::create('courierapis', function (Blueprint $table) {
                $table->id();
                $table->string('type')->nullable();
                $table->text('url')->nullable();
                $table->string('api_key')->nullable();
                $table->string('secret_key')->nullable();
                $table->text('token')->nullable();
                $table->string('username')->nullable();
                $table->string('password')->nullable();
                $table->string('client_id')->nullable();
                $table->string('client_secret')->nullable();
                $table->text('webhook_url')->nullable();
                $table->tinyInteger('status')->default(0);
                $table->timestamps();
            });
        } else {
            Schema::table('courierapis', function (Blueprint $table) {
                if (!Schema::hasColumn('courierapis', 'type')) {
                    $table->string('type')->nullable();
                }
                if (!Schema::hasColumn('courierapis', 'url')) {
                    $table->text('url')->nullable();
                }
                if (!Schema::hasColumn('courierapis', 'api_key')) {
                    $table->string('api_key')->nullable();
                }
                if (!Schema::hasColumn('courierapis', 'secret_key')) {
                    $table->string('secret_key')->nullable();
                }
                if (!Schema::hasColumn('courierapis', 'token')) {
                    $table->text('token')->nullable();
                }
                if (!Schema::hasColumn('courierapis', 'username')) {
                    $table->string('username')->nullable();
                }
                if (!Schema::hasColumn('courierapis', 'password')) {
                    $table->string('password')->nullable();
                }
                if (!Schema::hasColumn('courierapis', 'client_id')) {
                    $table->string('client_id')->nullable();
                }
                if (!Schema::hasColumn('courierapis', 'client_secret')) {
                    $table->string('client_secret')->nullable();
                }
                if (!Schema::hasColumn('courierapis', 'webhook_url')) {
                    $table->text('webhook_url')->nullable();
                }
                if (!Schema::hasColumn('courierapis', 'status')) {
                    $table->tinyInteger('status')->default(0);
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courierapis');
    }
};
