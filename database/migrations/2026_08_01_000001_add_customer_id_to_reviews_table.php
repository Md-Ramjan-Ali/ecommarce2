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
        if (Schema::hasTable('reviews') && !Schema::hasColumn('reviews', 'customer_id')) {
            Schema::table('reviews', function (Blueprint $table) {
                $table->integer('customer_id')->nullable()->after('product_id');
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
        if (Schema::hasTable('reviews') && Schema::hasColumn('reviews', 'customer_id')) {
            Schema::table('reviews', function (Blueprint $table) {
                $table->dropColumn('customer_id');
            });
        }
    }
};
