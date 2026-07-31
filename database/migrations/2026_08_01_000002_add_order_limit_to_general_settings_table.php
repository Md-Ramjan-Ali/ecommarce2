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
        if (Schema::hasTable('general_settings')) {
            Schema::table('general_settings', function (Blueprint $table) {
                if (!Schema::hasColumn('general_settings', 'order_limit_time')) {
                    $table->integer('order_limit_time')->default(48)->nullable()->after('status');
                }
                if (!Schema::hasColumn('general_settings', 'order_limit_qty')) {
                    $table->integer('order_limit_qty')->default(2)->nullable()->after('order_limit_time');
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
        if (Schema::hasTable('general_settings')) {
            Schema::table('general_settings', function (Blueprint $table) {
                if (Schema::hasColumn('general_settings', 'order_limit_time')) {
                    $table->dropColumn('order_limit_time');
                }
                if (Schema::hasColumn('general_settings', 'order_limit_qty')) {
                    $table->dropColumn('order_limit_qty');
                }
            });
        }
    }
};
