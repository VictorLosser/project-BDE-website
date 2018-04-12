<?php

use Illuminate\Database\Seeder;

class ContainProductBDESeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contain-product-bde')->insert([
            'quantity' => 2,
            'product_id' => 1,
            'order_id' => 1
        ]);
        DB::table('contain-product-bde')->insert([
            'quantity' => 5,
            'product_id' => 2,
            'order_id' => 2
        ]);
        DB::table('contain-product-bde')->insert([
            'quantity' => 1,
            'product_id' => 3,
            'order_id' => 2
        ]);
        DB::table('contain-product-bde')->insert([
            'quantity' => 1,
            'product_id' => 4,
            'order_id' => 3
        ]);
        DB::table('contain-product-bde')->insert([
            'quantity' => 4,
            'product_id' => 5,
            'order_id' => 3
        ]);
        DB::table('contain-product-bde')->insert([
            'quantity' => 3,
            'product_id' => 6,
            'order_id' => 3
        ]);
    }
}
