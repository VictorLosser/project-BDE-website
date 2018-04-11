<?php

use Illuminate\Database\Seeder;

class LikeImageBDESeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('like-image-bde')->insert([
            'image_id' => 16,
            'id' => 8
        ]);
        DB::table('like-image-bde')->insert([
            'image_id' => 15,
            'id' => 8
        ]);
        DB::table('like-image-bde')->insert([
            'image_id' => 17,
            'id' => 8
        ]);
        DB::table('like-image-bde')->insert([
            'image_id' => 18,
            'id' => 9
        ]);
        DB::table('like-image-bde')->insert([
            'image_id' => 17,
            'id' => 9
        ]);
        DB::table('like-image-bde')->insert([
            'image_id' => 22,
            'id' => 1
        ]);
        DB::table('like-image-bde')->insert([
            'image_id' => 22,
            'id' => 9
        ]);
        DB::table('like-image-bde')->insert([
            'image_id' => 22,
            'id' => 10
        ]);
    }
}
