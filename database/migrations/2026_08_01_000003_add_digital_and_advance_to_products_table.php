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
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                if (!Schema::hasColumn('products', 'is_digital')) {
                    $table->tinyInteger('is_digital')->default(0)->nullable()->after('status');
                }
                if (!Schema::hasColumn('products', 'advance_amount')) {
                    $table->decimal('advance_amount', 10, 2)->default(0)->nullable()->after('is_digital');
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
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                if (Schema::hasColumn('products', 'is_digital')) {
                    $table->dropColumn('is_digital');
                }
                if (Schema::hasColumn('products', 'advance_amount')) {
                    $table->dropColumn('advance_amount');
                }
            });
        }
    }
};
