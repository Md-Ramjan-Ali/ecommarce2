<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            ['id' => 1, 'name' => 'Pending', 'slug' => 'pending', 'status' => '1'],
            ['id' => 2, 'name' => 'Processing', 'slug' => 'processing', 'status' => '1'],
            ['id' => 3, 'name' => 'On Delivery', 'slug' => 'on-delivery', 'status' => '1'],
            ['id' => 4, 'name' => 'In Transit', 'slug' => 'in-transit', 'status' => '1'],
            ['id' => 5, 'name' => 'Shipped', 'slug' => 'shipped', 'status' => '1'],
            ['id' => 6, 'name' => 'Completed', 'slug' => 'completed', 'status' => '1'],
            ['id' => 11, 'name' => 'Cancelled', 'slug' => 'cancelled', 'status' => '1'],
        ];

        foreach ($statuses as $s) {
            DB::table('order_statuses')->updateOrInsert(['id' => $s['id']], $s);
        }
    }
}
