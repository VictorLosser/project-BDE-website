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
            'id' => 1,
        ]);
        DB::table('idea-box-bde')->insert([
            'title' => 'Barathon',
            'description' => 'Pour décompresser après un cctl bien difficile',
            'id' => 8,
        ]);
        DB::table('idea-box-bde')->insert([
            'title' => 'Chasse aux oeufs de Paques',
            'description' => 'Nous adorons tous le chocolat',
            'id' => 9,
        ]);
    }
}
