<?php

use Illuminate\Database\Seeder;

class IdeaBoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('idea-box-bde')->insert([
            'title' => 'Concert de JUL',
            'description' => 'JUL un artiste incontournable du moment pourrait venir faire un concert dans notre école',
            'user_id' => 1,
        ]);
        DB::table('idea-box-bde')->insert([
            'title' => 'Barathon',
            'description' => 'Pour décompresser après un cctl bien difficile',
            'user_id' => 3,
        ]);
        DB::table('idea-box-bde')->insert([
            'title' => 'Chasse aux oeufs de Paques',
            'description' => 'Nous adorons tous le chocolat',
            'user_id' => 2,
        ]);
    }
}
