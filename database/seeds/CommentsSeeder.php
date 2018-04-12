<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments-bde')->insert([
            'content' => 'wow super interessant',
            'commentable_id' => 1,
            'commentable_type' => 'event',
            'user_id' => 1
        ]);
        DB::table('comments-bde')->insert([
            'content' => 'wow super interessant',
            'commentable_id' => 2,
            'commentable_type' => 'event',
            'user_id' => 1
        ]);
        DB::table('comments-bde')->insert([
            'content' => 'wow super interessant',
            'commentable_id' => 1,
            'commentable_type' => 'image',
            'user_id' => 1
        ]);
        DB::table('comments-bde')->insert([
            'content' => 'wow super interessant',
            'commentable_id' => 2,
            'commentable_type' => 'image',
            'user_id' => 1
        ]);
        DB::table('comments-bde')->insert([
            'content' => 'wow super interessant',
            'commentable_id' => 3,
            'commentable_type' => 'event',
            'user_id' => 1
        ]);
    }
}
