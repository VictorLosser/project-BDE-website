<?php

use Illuminate\Database\Seeder;

class ParticipatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participates-bde')->insert([
            'event_id' => 1,
            'user_id' => 1
        ]);
        DB::table('participates-bde')->insert([
            'event_id' => 1,
            'user_id' => 2
        ]);
        DB::table('participates-bde')->insert([
            'event_id' => 1,
            'user_id' => 3
        ]);
        DB::table('participates-bde')->insert([
            'event_id' => 1,
            'user_id' => 4
        ]);
        DB::table('participates-bde')->insert([
            'event_id' => 2,
            'user_id' => 3
        ]);
        DB::table('participates-bde')->insert([
            'event_id' => 3,
            'user_id' => 2
        ]);
    }
}
