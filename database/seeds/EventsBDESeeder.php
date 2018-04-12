<?php

use Illuminate\Database\Seeder;

class EventsBDESeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$this->call([
            TrucSeeder::class,
        ]);*/

        DB::table('events-bde')->insert([
            'user_id' => '1',
            'title' => 'Soirée Pyjama',
            'description' => "Soirée pyjama chez Jawad ! Venez tous on va s'éclater !",
            'date_event' => date('2015-11-13 21:25:00'),
            'price' => 0,
            'recurrence' => 'Evenement unique sans suite.',
        ]);
        DB::table('events-bde')->insert([
            'user_id' => '1',
            'title' => 'Soirée Boom',
            'description' => "Soirée boom chez Jawad ! Avec DJ Kalash, DJ Kamikaze & DJ Tnt. Venez tous on va s'éclater !",
            'date_event' => date('2015-11-13 21:25:00'),
            'price' => 0,
            'recurrence' => 'Evenement unique sans suite.',
        ]);
        DB::table('events-bde')->insert([
            'user_id' => '1',
            'title' => 'Soirée Restauration',
            'description' => "Restaurons nous chez Jawad ! Salade de rocket au menu !",
            'date_event' => date('2015-11-13 21:25:00'),
            'price' => 0,
            'recurrence' => 'Evenement unique sans suite.',
        ]);
        DB::table('events-bde')->insert([
            'user_id' => '1',
            'title' => 'Tournage clip VDO',
            'description' => "Tournage d'un clip vidéo chez Jawad ! #armes #ceintures #ak47 #gows",
            'date_event' => date('2015-11-13 21:25:00'),
            'price' => 0,
            'recurrence' => 'Evenement unique sans suite.',
        ]);
    }
}
