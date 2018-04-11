<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
//            ProductCategorySeeder::class,
//            ProductsBDESeeder::class,
//            ImageBDESeeder::class,
//            OrdersBDESeeder::class,
//            ContainProductBDESeeder::class,
            LikeImageBDESeeder::class
        ]);
    }
}
