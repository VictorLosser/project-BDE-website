<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product-category-bde')->insert([
            'category_name' => 'Vêtements'
        ]);
        DB::table('product-category-bde')->insert([
            'category_name' => 'Accessoires'
        ]);
        DB::table('product-category-bde')->insert([
            'category_name' => 'Vaisselle'
        ]);
    }
}
