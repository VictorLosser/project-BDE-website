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
            'image_id' => 15,
            'id' => 1,
        ]);
        DB::table('comments-bde')->insert([
            'content' => 'daccord avec toi',
            'image_id' => 15,
            'id' => 8,
        ]);
        DB::table('comments-bde')->insert([
            'content' => 'cette image ne intéresse personne.',
            'image_id' => 16,
            'id' => 8,
        ]);
        DB::table('comments-bde')->insert([
            'content' => 'si moi',
            'image_id' => 16,
            'id' => 1,
        ]);
        DB::table('comments-bde')->insert([
            'content' => 'first',
            'image_id' => 17,
            'id' => 9,
        ]);
        DB::table('comments-bde')->insert([
            'content' => 'oui',
            'image_id' => 18,
            'id' => 10,
        ]);
        DB::table('comments-bde')->insert([
            'content' => 'Arsene',
            'image_id' => 18,
            'id' => 9,
        ]);
        DB::table('comments-bde')->insert([
            'content' => 'cet evenement est interessant',
            'event_id' => 9,
            'id' => 1,
        ]);
        DB::table('comments-bde')->insert([
            'content' => 'cet evenement est pas interessant',
            'event_id' => 10,
            'id' => 8,
        ]);
        DB::table('comments-bde')->insert([
            'content' => 'hahaha pas interessant',
            'event_id' => 13,
            'id' => 9,
        ]);
        DB::table('comments-bde')->insert([
            'content' => 'totalement nul',
            'event_id' => 14,
            'id' => 10,
        ]);
        DB::table('comments-bde')->insert([
            'content' => 'tu es mechant toi',
            'event_id' => 14,
            'id' => 8,
        ]);
    }
}
