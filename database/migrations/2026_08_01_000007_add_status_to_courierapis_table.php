<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('courierapis')) {
            Schema::table('courierapis', function (Blueprint $table) {
                if (!Schema::hasColumn('courierapis', 'status')) {
                    $table->tinyInteger('status')->default(1)->nullable()->after('type');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('courierapis')) {
            Schema::table('courierapis', function (Blueprint $table) {
                if (Schema::hasColumn('courierapis', 'status')) {
                    $table->dropColumn('status');
                }
            });
        }
    }
};
