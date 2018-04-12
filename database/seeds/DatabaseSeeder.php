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
            CommentsSeeder::class,
            ContainProductBDESeeder::class,
            EventsBDESeeder::class,
            IdeaBoxSeeder::class,
            ImageBDESeeder::class,
            LikesSeeder::class,
            OrdersBDESeeder::class,
            ProductCategorySeeder::class,
            ProductsBDESeeder::class
        ]);
    }
}
