<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    public function run(): void
    {
        $discounts = [
            ['store' => 'Ossob',             'item' => 'Latte',          'price' => 4.00, 'percent_off' => 25, 'category' => 'Coffee'],
            ['store' => 'Aaran',             'item' => 'Cappuccino',     'price' => 3.50, 'percent_off' => 10, 'category' => 'Coffee'],
            ['store' => 'Jubba HyperMarket', 'item' => 'Americano',      'price' => 3.00, 'percent_off' => 5,  'category' => 'Coffee'],
            ['store' => 'Baraka Store',      'item' => 'T-Shirt',        'price' => 12.00, 'percent_off' => 30, 'category' => 'Clothing'],
            ['store' => 'Baraka Store',      'item' => 'Jeans',          'price' => 25.00, 'percent_off' => 15, 'category' => 'Clothing'],
            ['store' => 'Hodan Electronics', 'item' => 'Headphones',     'price' => 40.00, 'percent_off' => 20, 'category' => 'Electronics'],
            ['store' => 'Hodan Electronics', 'item' => 'Phone Charger',  'price' => 10.00, 'percent_off' => 50, 'category' => 'Electronics'],
            ['store' => 'Banaadir Pharmacy', 'item' => 'Vitamin C',      'price' => 8.00,  'percent_off' => 10, 'category' => 'Health'],
        ];

        foreach ($discounts as $d) {
            Discount::create($d);
        }
    }
}
