<?php

use Illuminate\Database\Seeder;

class LikeIdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('like-idea-bde')->insert([
            'id' => 1,
            'idea_box_id' => 1,
        ]);
        DB::table('like-idea-bde')->insert([
            'id' => 8,
            'idea_box_id' => 2,
        ]);
        DB::table('like-idea-bde')->insert([
            'id' => 10,
            'idea_box_id' => 3,
        ]);
    }
}
