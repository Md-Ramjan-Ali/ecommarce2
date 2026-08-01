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
        if (Schema::hasTable('campaigns')) {
            Schema::table('campaigns', function (Blueprint $table) {
                if (!Schema::hasColumn('campaigns', 'banner')) {
                    $table->string('banner', 255)->nullable();
                }
                if (!Schema::hasColumn('campaigns', 'banner_title')) {
                    $table->string('banner_title', 255)->nullable();
                }
                if (!Schema::hasColumn('campaigns', 'deadline')) {
                    $table->timestamp('deadline')->nullable();
                }
                if (!Schema::hasColumn('campaigns', 'product_id')) {
                    $table->unsignedBigInteger('product_id')->nullable();
                }
                if (!Schema::hasColumn('campaigns', 'video')) {
                    $table->string('video', 255)->nullable();
                }
                if (!Schema::hasColumn('campaigns', 'top_title_1')) {
                    $table->string('top_title_1', 255)->nullable();
                }
                if (!Schema::hasColumn('campaigns', 'top_title_2')) {
                    $table->string('top_title_2', 255)->nullable();
                }
                if (!Schema::hasColumn('campaigns', 'heading_1')) {
                    $table->string('heading_1', 255)->nullable();
                }
                if (!Schema::hasColumn('campaigns', 'feature_1')) {
                    $table->string('feature_1', 255)->nullable();
                }
                if (!Schema::hasColumn('campaigns', 'feature_2')) {
                    $table->string('feature_2', 255)->nullable();
                }
                if (!Schema::hasColumn('campaigns', 'heading_2')) {
                    $table->string('heading_2', 255)->nullable();
                }
                if (!Schema::hasColumn('campaigns', 'heading_3')) {
                    $table->string('heading_3', 255)->nullable();
                }
                if (!Schema::hasColumn('campaigns', 'heading_4')) {
                    $table->string('heading_4', 255)->nullable();
                }
                if (!Schema::hasColumn('campaigns', 'note')) {
                    $table->text('note')->nullable();
                }
                if (!Schema::hasColumn('campaigns', 'billing_details')) {
                    $table->text('billing_details')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('campaigns')) {
            Schema::table('campaigns', function (Blueprint $table) {
                $columns = [
                    'banner', 'banner_title', 'deadline', 'product_id', 'video',
                    'top_title_1', 'top_title_2', 'heading_1', 'feature_1', 'feature_2',
                    'heading_2', 'heading_3', 'heading_4', 'note', 'billing_details'
                ];
                foreach ($columns as $col) {
                    if (Schema::hasColumn('campaigns', $col)) {
                        $table->dropColumn($col);
                    }
                }
            });
        }
    }
};
