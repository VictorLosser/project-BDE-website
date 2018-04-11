<?php

use Illuminate\Database\Seeder;

class LikeEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('like-event-bde')->insert([
            'id' => 1,
            'event_id' => 9,
        ]);
        DB::table('like-event-bde')->insert([
            'id' => 8,
            'event_id' => 9,
        ]);
        DB::table('like-event-bde')->insert([
            'id' => 9,
            'event_id' => 9,
        ]);
        DB::table('like-event-bde')->insert([
            'id' => 10,
            'event_id' => 9,
        ]);
        DB::table('like-event-bde')->insert([
            'id' => 8,
            'event_id' => 10,
        ]);
        DB::table('like-event-bde')->insert([
            'id' => 9,
            'event_id' =>10,
        ]);
        DB::table('like-event-bde')->insert([
            'id' => 1,
            'event_id' => 13,
        ]);
        DB::table('like-event-bde')->insert([
            'id' => 10,
            'event_id' => 14,
        ]);
        DB::table('like-event-bde')->insert([
            'id' => 9,
            'event_id' => 13,
        ]);
    }
}
