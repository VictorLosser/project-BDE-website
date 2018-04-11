<?php

use Illuminate\Database\Seeder;

class ImageBDESeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('image-bde')->insert([
            'image_link' => 'sweat-logo.jpg',
            'alt' => 'sweat shirt logo exia',
            'product_id' => 5,
            'id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 't-shirt-logo.jpg',
            'alt' => 't-shirt logo exia',
            'product_id' => 6,
            'id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 'casquette.jpg',
            'alt' => 'casquette logo exia',
            'product_id' => 7,
            'id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 'mug.jpg',
            'alt' => 'mug logo exia',
            'product_id' => 8,
            'id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 'assiette-logo.jpg',
            'alt' => 'assiette logo exia',
            'product_id' => 9,
            'id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 'gourde-logo.jpg',
            'alt' => 'gourde logo exia',
            'product_id' => 10,
            'id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 'soiree-pyjama.jpg',
            'alt' => 'soiree pyjama dj ambiance exia',
            'event_id' => 9,
            'id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 'soiree-boom.jpg',
            'alt' => 'soiree boom dj ambiance explosive souvenirs exia',
            'event_id' => 10,
            'id' => 1
        ]);
    }
}
