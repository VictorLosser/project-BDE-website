<?php

use Illuminate\Database\Seeder;

class LikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes-bde')->insert([
            'likeable_id' => 1,
            'likeable_type' => 'event',
            'user_id' => 1
        ]);
        DB::table('likes-bde')->insert([
            'likeable_id' => 1,
            'likeable_type' => 'event',
            'user_id' => 2
        ]);
        DB::table('likes-bde')->insert([
            'likeable_id' => 2,
            'likeable_type' => 'event',
            'user_id' => 1
        ]);
        DB::table('likes-bde')->insert([
            'likeable_id' => 3,
            'likeable_type' => 'event',
            'user_id' => 2
        ]);
        DB::table('likes-bde')->insert([
            'likeable_id' => 1,
            'likeable_type' => 'image',
            'user_id' => 2
        ]);
        DB::table('likes-bde')->insert([
            'likeable_id' => 1,
            'likeable_type' => 'idea',
            'user_id' => 1
        ]);
    }
}
