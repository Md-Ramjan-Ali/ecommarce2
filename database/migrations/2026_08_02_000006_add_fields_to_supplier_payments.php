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
        if (Schema::hasTable('supplier_payments')) {
            Schema::table('supplier_payments', function (Blueprint $table) {
                if (!Schema::hasColumn('supplier_payments', 'method')) {
                    $table->string('method', 50)->nullable()->after('payment_date');
                }
                if (!Schema::hasColumn('supplier_payments', 'fund_transaction_id')) {
                    $table->unsignedBigInteger('fund_transaction_id')->nullable()->after('method');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('supplier_payments')) {
            Schema::table('supplier_payments', function (Blueprint $table) {
                if (Schema::hasColumn('supplier_payments', 'method')) {
                    $table->dropColumn('method');
                }
                if (Schema::hasColumn('supplier_payments', 'fund_transaction_id')) {
                    $table->dropColumn('fund_transaction_id');
                }
            });
        }
    }
};
