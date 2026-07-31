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
        if (Schema::hasTable('order_details')) {
            Schema::table('order_details', function (Blueprint $table) {
                if (!Schema::hasColumn('order_details', 'product_color')) {
                    $table->string('product_color')->nullable()->after('qty');
                }
                if (!Schema::hasColumn('order_details', 'product_size')) {
                    $table->string('product_size')->nullable()->after('product_color');
                }
                if (!Schema::hasColumn('order_details', 'variant_price_id')) {
                    $table->integer('variant_price_id')->nullable()->after('product_size');
                }
                if (!Schema::hasColumn('order_details', 'product_discount')) {
                    $table->decimal('product_discount', 10, 2)->default(0)->nullable()->after('variant_price_id');
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
        if (Schema::hasTable('order_details')) {
            Schema::table('order_details', function (Blueprint $table) {
                $cols = ['product_color', 'product_size', 'variant_price_id', 'product_discount'];
                foreach ($cols as $c) {
                    if (Schema::hasColumn('order_details', $c)) {
                        $table->dropColumn($c);
                    }
                }
            });
        }
    }
};
