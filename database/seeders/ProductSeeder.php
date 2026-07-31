<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Productimage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Seed 8 realistic Pet Shop products.
     *
     * @return void
     */
    public function run()
    {
        $existingImage = DB::table('productimages')->whereNotNull('image')->first()?->image ?? 'public/uploads/product/1785310474-piku_logo.png';

        $productsData = [
            [
                'name'            => 'Whiskas Premium Tuna Adult Cat Food 1.2kg',
                'category_id'     => 6, // CATS
                'purchase_price'  => 950,
                'old_price'       => 1450,
                'new_price'       => 1250,
                'stock'           => 45,
                'description'     => '<p>Whiskas Premium Tuna Adult Cat Food is specially formulated to provide 100% complete and balanced nutrition for your adult cat. Packed with real tuna fish taste and essential omega 3 & 6 fatty acids for a healthy coat.</p>',
                'feature_product' => 1,
                'is_dry_food'     => 1,
                'topsale'         => 1,
                'hot_deal'        => 1,
            ],
            [
                'name'            => 'Drools Chicken & Egg Puppy Dog Food 3kg',
                'category_id'     => 7, // DOGS
                'purchase_price'  => 1400,
                'old_price'       => 2200,
                'new_price'       => 1850,
                'stock'           => 30,
                'description'     => '<p>Drools Chicken & Egg Puppy Dog Food provides complete nutrition with high quality protein from real chicken and digestible eggs. Supports brain development and strong muscle growth for your growing puppy.</p>',
                'feature_product' => 1,
                'is_dry_food'     => 1,
                'is_bestseller'   => 1,
                'topsale'         => 1,
            ],
            [
                'name'            => 'Me-O Creamy Cat Treat Salmon Flavour (4x15g)',
                'category_id'     => 6, // CATS
                'purchase_price'  => 220,
                'old_price'       => 380,
                'new_price'       => 320,
                'stock'           => 100,
                'description'     => '<p>Me-O Creamy Cat Treat is a delicious licking treat for cats. Infused with real salmon flavor, Omega 3, Green Tea extract, and Taurine for healthy eyesight and immune support.</p>',
                'is_treats'       => 1,
                'hot_deal'        => 1,
                'flashsale'       => 1,
                'feature_product' => 1,
            ],
            [
                'name'            => 'SmartHeart Adult Bird Food Mixed Seeds 1kg',
                'category_id'     => 8, // BIRDS
                'purchase_price'  => 380,
                'old_price'       => 650,
                'new_price'       => 550,
                'stock'           => 25,
                'description'     => '<p>SmartHeart Bird Food contains natural seeds, vitamins, and minerals essential for colorful feathers, strong beak development, and healthy digestion for all pet birds.</p>',
                'feature_product' => 1,
                'is_dry_food'     => 1,
            ],
            [
                'name'            => 'Royal Canin Indoor Adult Cat Food 2kg',
                'category_id'     => 6, // CATS
                'purchase_price'  => 2300,
                'old_price'       => 3400,
                'new_price'       => 2950,
                'stock'           => 20,
                'description'     => '<p>Royal Canin Indoor 27 is formulated specifically for adult indoor cats. Contains highly digestible proteins that help reduce stool volume and odor while maintaining ideal body weight.</p>',
                'feature_product' => 1,
                'hot_deal'        => 1,
                'is_bestseller'   => 1,
                'topsale'         => 1,
            ],
            [
                'name'            => 'Pedigree Meat Jerky Roasted Lamb Dog Treats 80g',
                'category_id'     => 7, // DOGS
                'purchase_price'  => 260,
                'old_price'       => 450,
                'new_price'       => 390,
                'stock'           => 60,
                'description'     => '<p>Pedigree Meat Jerky treats are soft, chewy sticks packed with real meat taste. Ideal training treat for rewarding your beloved dog.</p>',
                'is_treats'       => 1,
                'topsale'         => 1,
                'feature_product' => 1,
            ],
            [
                'name'            => 'Opti-Meal Gravy Wet Cat Food Salmon & Tuna 85g',
                'category_id'     => 6, // CATS
                'purchase_price'  => 100,
                'old_price'       => 190,
                'new_price'       => 150,
                'stock'           => 80,
                'description'     => '<p>Opti-Meal Super Premium Wet Cat Food pouches feature tender chunks of real salmon and tuna in delicious gravy. High moisture content promotes urinary tract health.</p>',
                'is_wet_food'     => 1,
                'hot_deal'        => 1,
                'feature_product' => 1,
            ],
            [
                'name'            => 'Bioline Anti-Flea & Flea Tick Pet Shampoo 250ml',
                'category_id'     => 6, // CATS & DOGS
                'purchase_price'  => 480,
                'old_price'       => 850,
                'new_price'       => 690,
                'stock'           => 40,
                'description'     => '<p>Bioline Pet Care Shampoo effectively eliminates fleas, ticks, and mites while leaving your pet\'s coat clean, shiny, and smelling fresh with herbal extracts.</p>',
                'is_pet_care'     => 1,
                'feature_product' => 1,
                'topsale'         => 1,
            ],
        ];

        foreach ($productsData as $index => $item) {
            $productCode = 'PKU-' . str_pad($index + 101, 4, '0', STR_PAD_LEFT);
            $slug        = Str::slug($item['name']) . '-' . strtolower(Str::random(4));

            $product = Product::create([
                'name'            => $item['name'],
                'slug'            => $slug,
                'product_code'    => $productCode,
                'category_id'     => $item['category_id'],
                'purchase_price'  => $item['purchase_price'],
                'old_price'       => $item['old_price'],
                'new_price'       => $item['new_price'],
                'stock'           => $item['stock'],
                'sold'            => rand(5, 30),
                'description'     => $item['description'],
                'feature_product' => $item['feature_product'] ?? 0,
                'topsale'         => $item['topsale'] ?? 0,
                'flashsale'       => $item['flashsale'] ?? 0,
                'is_treats'       => $item['is_treats'] ?? 0,
                'is_wet_food'     => $item['is_wet_food'] ?? 0,
                'is_dry_food'     => $item['is_dry_food'] ?? 0,
                'is_pet_care'     => $item['is_pet_care'] ?? 0,
                'is_bestseller'   => $item['is_bestseller'] ?? 0,
                'status'          => 1,
                'approval_status' => 'approved',
            ]);

            // Assign Image
            Productimage::create([
                'product_id' => $product->id,
                'image'      => $existingImage,
            ]);
        }
    }
}
