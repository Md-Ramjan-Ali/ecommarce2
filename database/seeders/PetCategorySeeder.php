<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;

class PetCategorySeeder extends Seeder
{
    public function run()
    {
        $categoriesData = [
            [
                'name' => 'CATS',
                'slug' => 'cats',
                'subcategories' => [
                    [
                        'subcategoryName' => 'CAT FOOD',
                        'slug' => 'cat-food',
                        'childcategories' => [
                            ['childcategoryName' => 'Dry Cat Food', 'slug' => 'dry-cat-food'],
                            ['childcategoryName' => 'Wet Cat Food', 'slug' => 'wet-cat-food'],
                            ['childcategoryName' => 'Kitten Food', 'slug' => 'kitten-food'],
                            ['childcategoryName' => 'Premium Cat Food', 'slug' => 'premium-cat-food'],
                            ['childcategoryName' => 'Cat Treats', 'slug' => 'cat-treats'],
                        ]
                    ],
                    [
                        'subcategoryName' => 'CAT LITTER',
                        'slug' => 'cat-litter',
                        'childcategories' => [
                            ['childcategoryName' => 'Clumping Cat Litter', 'slug' => 'clumping-cat-litter'],
                            ['childcategoryName' => 'Cat Litter Box & Scoop', 'slug' => 'cat-litter-box-scoop'],
                            ['childcategoryName' => 'Litter Freshener & Odor Control', 'slug' => 'litter-freshener-odor-control'],
                        ]
                    ],
                    [
                        'subcategoryName' => 'CAT CARE & HEALTH',
                        'slug' => 'cat-care-health',
                        'childcategories' => [
                            ['childcategoryName' => 'Cat Grooming', 'slug' => 'cat-grooming'],
                            ['childcategoryName' => 'Cat Shampoo', 'slug' => 'cat-shampoo'],
                        ]
                    ]
                ]
            ],
            [
                'name' => 'DOGS',
                'slug' => 'dogs',
                'subcategories' => [
                    [
                        'subcategoryName' => 'Dog Food',
                        'slug' => 'dog-food',
                        'childcategories' => []
                    ]
                ]
            ],
            [
                'name' => 'BIRDS',
                'slug' => 'birds',
                'subcategories' => [
                    [
                        'subcategoryName' => 'Bird Food',
                        'slug' => 'bird-food',
                        'childcategories' => []
                    ],
                    [
                        'subcategoryName' => 'Bird Hand Feeding Formula',
                        'slug' => 'bird-hand-feeding-formula',
                        'childcategories' => []
                    ],
                    [
                        'subcategoryName' => 'Bird Vitamin & Supplement',
                        'slug' => 'bird-vitamin-supplement',
                        'childcategories' => []
                    ]
                ]
            ],
            [
                'name' => 'RABBIT',
                'slug' => 'rabbit',
                'subcategories' => [
                    [
                        'subcategoryName' => 'Rabbit Food',
                        'slug' => 'rabbit-food',
                        'childcategories' => []
                    ]
                ]
            ],
            [
                'name' => 'Fish & Aquatics',
                'slug' => 'fish-aquatics',
                'subcategories' => []
            ]
        ];

        foreach ($categoriesData as $catItem) {
            $category = Category::updateOrCreate(
                ['slug' => $catItem['slug']],
                [
                    'name'       => $catItem['name'],
                    'status'     => 1,
                    'front_view' => 1,
                    'parent_id'  => 0,
                ]
            );

            foreach ($catItem['subcategories'] as $subItem) {
                $subcategory = Subcategory::updateOrCreate(
                    [
                        'category_id' => $category->id,
                        'slug'        => $subItem['slug'],
                    ],
                    [
                        'subcategoryName' => $subItem['subcategoryName'],
                        'status'          => 1,
                    ]
                );

                foreach ($subItem['childcategories'] as $childItem) {
                    Childcategory::updateOrCreate(
                        [
                            'subcategory_id' => $subcategory->id,
                            'slug'           => $childItem['slug'],
                        ],
                        [
                            'childcategoryName' => $childItem['childcategoryName'],
                            'status'            => 1,
                        ]
                    );
                }
            }
        }
    }
}
