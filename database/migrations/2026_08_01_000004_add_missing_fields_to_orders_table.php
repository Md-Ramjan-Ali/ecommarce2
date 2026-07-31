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
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                if (!Schema::hasColumn('orders', 'note')) {
                    $table->text('note')->nullable()->after('order_status');
                }
                if (!Schema::hasColumn('orders', 'order_note')) {
                    $table->text('order_note')->nullable()->after('note');
                }
                if (!Schema::hasColumn('orders', 'payment_status')) {
                    $table->string('payment_status', 55)->default('pending')->nullable()->after('order_note');
                }
                if (!Schema::hasColumn('orders', 'coupon_code')) {
                    $table->string('coupon_code', 100)->nullable()->after('payment_status');
                }
                if (!Schema::hasColumn('orders', 'ip_address')) {
                    $table->string('ip_address', 50)->nullable()->after('coupon_code');
                }
                if (!Schema::hasColumn('orders', 'admin_id')) {
                    $table->integer('admin_id')->nullable()->after('ip_address');
                }
                if (!Schema::hasColumn('orders', 'vendor_id')) {
                    $table->integer('vendor_id')->nullable()->after('admin_id');
                }
                if (!Schema::hasColumn('orders', 'advance_amount')) {
                    $table->decimal('advance_amount', 10, 2)->default(0)->nullable()->after('vendor_id');
                }
                if (!Schema::hasColumn('orders', 'due_amount')) {
                    $table->decimal('due_amount', 10, 2)->default(0)->nullable()->after('advance_amount');
                }
                if (!Schema::hasColumn('orders', 'area')) {
                    $table->string('area')->nullable()->after('due_amount');
                }
                if (!Schema::hasColumn('orders', 'payment_method')) {
                    $table->string('payment_method', 50)->nullable()->after('area');
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
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                $columns = ['note', 'order_note', 'payment_status', 'coupon_code', 'ip_address', 'admin_id', 'vendor_id', 'advance_amount', 'due_amount', 'area', 'payment_method'];
                foreach ($columns as $col) {
                    if (Schema::hasColumn('orders', $col)) {
                        $table->dropColumn($col);
                    }
                }
            });
        }
    }
};
