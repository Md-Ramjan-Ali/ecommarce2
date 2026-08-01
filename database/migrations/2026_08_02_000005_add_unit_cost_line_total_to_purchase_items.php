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
        if (Schema::hasTable('purchase_items')) {
            Schema::table('purchase_items', function (Blueprint $table) {
                if (!Schema::hasColumn('purchase_items', 'unit_cost')) {
                    $table->decimal('unit_cost', 14, 2)->default(0)->after('qty');
                }
                if (!Schema::hasColumn('purchase_items', 'line_total')) {
                    $table->decimal('line_total', 14, 2)->default(0)->after('unit_cost');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('purchase_items')) {
            Schema::table('purchase_items', function (Blueprint $table) {
                if (Schema::hasColumn('purchase_items', 'unit_cost')) {
                    $table->dropColumn('unit_cost');
                }
                if (Schema::hasColumn('purchase_items', 'line_total')) {
                    $table->dropColumn('line_total');
                }
            });
        }
    }
};
