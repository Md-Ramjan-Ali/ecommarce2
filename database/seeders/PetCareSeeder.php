<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GeneralSetting;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\BannerCategory;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PetCareSeeder extends Seeder
{
    /**
     * Run the database seeds for Pet Care store.
     *
     * @return void
     */
    public function run()
    {
        // 1. Update General Settings for Pet Care Shop
        $setting = GeneralSetting::first();
        if (!$setting) {
            $setting = new GeneralSetting();
        }

        $setting->name = 'Piku Pet Shop';
        $setting->dark_logo = 'public/uploads/settings/piku_logo.png';
        $setting->white_logo = 'public/uploads/settings/piku_logo.png';
        $setting->favicon = 'public/uploads/settings/piku_logo.png';
        $setting->primary_color = '#1877f2';
        $setting->secodery_color = '#115dbf';
        $setting->vendor_enabled = 0;
        $setting->reseller_enabled = 0;
        $setting->status = 1;
        $setting->save();

        // 1a. Seed SEO Settings
        DB::table('seo_settings')->updateOrInsert(
            ['id' => 1],
            [
                'meta_title' => 'Piku Pet Shop',
                'meta_tags' => 'pet, care, cat, dog, food, supplies',
                'meta_description' => 'Piku Pet Shop - Premium Pet Care & Pet Supplies E-Commerce Website',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // 1b. Seed Contact Info
        Contact::firstOrCreate(
            ['id' => 1],
            [
                'hotline' => '01700000000',
                'hotmail' => 'info@pikupetshop.com',
                'phone' => '01700000000',
                'whatsapp' => '01700000000',
                'email' => 'info@pikupetshop.com',
                'address' => 'Dhaka, Bangladesh',
                'status' => 1,
            ]
        );

        // 1b. Seed Admin User
        $adminUser = User::where('email', 'admin@gmail.com')->first();
        if (!$adminUser) {
            $adminUser = User::create([
                'name' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'status' => 1,
                'role' => 'admin',
            ]);
            $adminUser->assignRole('admin');
        }

        // 2. Seed Main Pet Categories if they don't exist
        $categories = [
            [
                'name' => 'Cat Care & Health',
                'slug' => 'cat-care-health',
                'status' => 1,
            ],
            [
                'name' => 'Tasty Treats for Cats',
                'slug' => 'tasty-treats-for-cats',
                'status' => 1,
            ],
            [
                'name' => 'Healthy Wet Food',
                'slug' => 'healthy-wet-food',
                'status' => 1,
            ],
            [
                'name' => 'Premium Dry Cat Food',
                'slug' => 'premium-dry-cat-food',
                'status' => 1,
            ],
            [
                'name' => 'Dog Supplies & Accessories',
                'slug' => 'dog-supplies-accessories',
                'status' => 1,
            ],
        ];

        foreach ($categories as $catData) {
            Category::firstOrCreate(
                ['slug' => $catData['slug']],
                $catData
            );
        }

        // 3. Seed Famous Pet Brands
        $brands = ['Reflex Plus', 'Felicia', 'Bellotta', 'Nekko', 'Purina Friskies', 'Whiskas', 'Royal Canin', 'Me-O'];
        foreach ($brands as $brandName) {
            Brand::firstOrCreate(
                ['slug' => Str::slug($brandName)],
                [
                    'name' => $brandName,
                    'name_bn' => $brandName,
                    'slug' => Str::slug($brandName),
                    'status' => 1,
                ]
            );
        }

        // 4. Seed Default Banner Categories matching Frontend Controller IDs
        $bannerCategories = [
            1  => 'Main Slider Banner (মেইন স্লাইডার)',
            2  => 'Category Top Banner (ক্যাটাগরি ব্যানার)',
            3  => 'Promo Banner (প্রোমো ব্যানার)',
            4  => 'Sidebar Banner (সাইডবার ব্যানার)',
            5  => 'Slider Bottom Ads (স্লাইডারের নিচের ব্যানার)',
            6  => 'Footer Top Ads (ফুটারের ওপরের ব্যানার)',
            7  => 'Campaign Ads (ক্যাম্পেইন ব্যানার)',
            8  => 'Reviews Banner (রিভিউ ব্যানার)',
            9  => 'Hot Deals Banner (হট ডিল ব্যানার)',
            10 => 'Homepage Ads 1 (হোমপেজ ব্যানার ১)',
            11 => 'Homepage Ads 2 (হোমপেজ ব্যানার ২)',
        ];
        foreach ($bannerCategories as $id => $bCatName) {
            BannerCategory::updateOrCreate(
                ['id' => $id],
                ['name' => $bCatName, 'status' => 1]
            );
        }

        $this->command->info('Pet Care Seeder completed successfully!');
    }
}
