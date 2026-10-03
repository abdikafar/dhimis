<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    public function run(): void
    {
        // Image URLs are real Unsplash CDN images (hotlinking is allowed).
        $q = '?w=600&q=80&auto=format&fit=crop';

        $discounts = [
            ['store' => 'Ossob',             'item' => 'Latte',          'price' => 4.00,  'percent_off' => 25, 'category' => 'Coffee',      'image_url' => "https://images.unsplash.com/photo-1541167760496-1628856ab772{$q}"],
            ['store' => 'Aaran',             'item' => 'Cappuccino',     'price' => 3.50,  'percent_off' => 10, 'category' => 'Coffee',      'image_url' => "https://images.unsplash.com/photo-1572442388796-11668a67e53d{$q}"],
            ['store' => 'Jubba HyperMarket', 'item' => 'Americano',      'price' => 3.00,  'percent_off' => 5,  'category' => 'Coffee',      'image_url' => "https://images.unsplash.com/photo-1521302080334-4bebac2763a6{$q}"],
            ['store' => 'Ossob',             'item' => 'Fresh Juice',    'price' => 2.50,  'percent_off' => 20, 'category' => 'Drinks',      'image_url' => "https://images.unsplash.com/photo-1600271886742-f049cd451bba{$q}"],
            ['store' => 'Baraka Store',      'item' => 'T-Shirt',        'price' => 12.00, 'percent_off' => 30, 'category' => 'Clothing',    'image_url' => "https://images.unsplash.com/photo-1521572163474-6864f9cf17ab{$q}"],
            ['store' => 'Baraka Store',      'item' => 'Jeans',          'price' => 25.00, 'percent_off' => 15, 'category' => 'Clothing',    'image_url' => "https://images.unsplash.com/photo-1542272604-787c3835535d{$q}"],
            ['store' => 'Mogadishu Mall',    'item' => 'Sneakers',       'price' => 45.00, 'percent_off' => 35, 'category' => 'Clothing',    'image_url' => "https://images.unsplash.com/photo-1542291026-7eec264c27ff{$q}"],
            ['store' => 'Hodan Electronics', 'item' => 'Headphones',     'price' => 40.00, 'percent_off' => 20, 'category' => 'Electronics', 'image_url' => "https://images.unsplash.com/photo-1505740420928-5e560c06d30e{$q}"],
            ['store' => 'Hodan Electronics', 'item' => 'Phone Charger',  'price' => 10.00, 'percent_off' => 50, 'category' => 'Electronics', 'image_url' => "https://images.unsplash.com/photo-1583863788434-e58a36330cf0{$q}"],
            ['store' => 'Hodan Electronics', 'item' => 'Smart Watch',    'price' => 60.00, 'percent_off' => 25, 'category' => 'Electronics', 'image_url' => "https://images.unsplash.com/photo-1523275335684-37898b6baf30{$q}"],
            ['store' => 'Liido Restaurant',  'item' => 'Beef Burger',    'price' => 6.00,  'percent_off' => 15, 'category' => 'Food',        'image_url' => "https://images.unsplash.com/photo-1568901346375-23c9450c58cd{$q}"],
            ['store' => 'Village Restaurant','item' => 'Pizza',          'price' => 9.00,  'percent_off' => 20, 'category' => 'Food',        'image_url' => "https://images.unsplash.com/photo-1513104890138-7c749659a591{$q}"],
            ['store' => 'Jubba HyperMarket', 'item' => 'Rice 5kg',       'price' => 8.00,  'percent_off' => 10, 'category' => 'Groceries',   'image_url' => "https://images.unsplash.com/photo-1586201375761-83865001e31c{$q}"],
            ['store' => 'Banaadir Pharmacy', 'item' => 'Vitamin C',      'price' => 8.00,  'percent_off' => 10, 'category' => 'Health',      'image_url' => "https://images.unsplash.com/photo-1584308666744-24d5c474f2ae{$q}"],
        ];

        foreach ($discounts as $d) {
            Discount::create($d);
        }
    }
}
