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
        if (Schema::hasTable('general_settings')) {
            Schema::table('general_settings', function (Blueprint $table) {
                if (!Schema::hasColumn('general_settings', 'facebook_page_username')) {
                    $table->string('facebook_page_username')->nullable();
                }
                if (!Schema::hasColumn('general_settings', 'top_headline')) {
                    $table->text('top_headline')->nullable();
                }
                if (!Schema::hasColumn('general_settings', 'footer_about_text')) {
                    $table->text('footer_about_text')->nullable();
                }
                if (!Schema::hasColumn('general_settings', 'google_play_link')) {
                    $table->string('google_play_link')->nullable();
                }
                if (!Schema::hasColumn('general_settings', 'app_store_link')) {
                    $table->string('app_store_link')->nullable();
                }
                if (!Schema::hasColumn('general_settings', 'primary_color')) {
                    $table->string('primary_color')->nullable();
                }
                if (!Schema::hasColumn('general_settings', 'secodery_color')) {
                    $table->string('secodery_color')->nullable();
                }
                if (!Schema::hasColumn('general_settings', 'footer_color')) {
                    $table->string('footer_color')->nullable();
                }
                if (!Schema::hasColumn('general_settings', 'copyright_color')) {
                    $table->string('copyright_color')->nullable();
                }
                if (!Schema::hasColumn('general_settings', 'hot_deal_end_date')) {
                    $table->string('hot_deal_end_date')->nullable();
                }
                if (!Schema::hasColumn('general_settings', 'flash_sale_end_date')) {
                    $table->string('flash_sale_end_date')->nullable();
                }
                if (!Schema::hasColumn('general_settings', 'show_all_products')) {
                    $table->tinyInteger('show_all_products')->default(1);
                }
                if (!Schema::hasColumn('general_settings', 'show_category_wise_products')) {
                    $table->tinyInteger('show_category_wise_products')->default(1);
                }
                if (!Schema::hasColumn('general_settings', 'vendor_enabled')) {
                    $table->tinyInteger('vendor_enabled')->default(1);
                }
                if (!Schema::hasColumn('general_settings', 'reseller_enabled')) {
                    $table->tinyInteger('reseller_enabled')->default(1);
                }
                if (!Schema::hasColumn('general_settings', 'reseller_deposit_min')) {
                    $table->decimal('reseller_deposit_min', 12, 2)->default(100);
                }
                if (!Schema::hasColumn('general_settings', 'reseller_deposit_max')) {
                    $table->decimal('reseller_deposit_max', 12, 2)->default(1000000);
                }
                if (!Schema::hasColumn('general_settings', 'reseller_wallet_min_balance')) {
                    $table->decimal('reseller_wallet_min_balance', 12, 2)->default(0);
                }
                if (!Schema::hasColumn('general_settings', 'checkout_note')) {
                    $table->longText('checkout_note')->nullable();
                }
                if (!Schema::hasColumn('general_settings', 'order_policy')) {
                    $table->longText('order_policy')->nullable();
                }
                if (!Schema::hasColumn('general_settings', 'og_baner')) {
                    $table->string('og_baner')->nullable();
                }
                if (!Schema::hasColumn('general_settings', 'fraud_api_key')) {
                    $table->string('fraud_api_key')->nullable();
                }
                if (!Schema::hasColumn('general_settings', 'duplicate_order_api_key')) {
                    $table->string('duplicate_order_api_key')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
