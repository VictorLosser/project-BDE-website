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
            'imageable_id' => 1,
            'imageable_type' => 'product',
            'user_id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 't-shirt-logo.jpg',
            'alt' => 't-shirt logo exia',
            'imageable_id' => 2,
            'imageable_type' => 'product',
            'user_id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 'casquette.jpg',
            'alt' => 'casquette logo exia',
            'imageable_id' => 3,
            'imageable_type' => 'product',
            'user_id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 'mug.jpg',
            'alt' => 'mug logo exia',
            'imageable_id' => 4,
            'imageable_type' => 'product',
            'user_id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 'assiette-logo.jpg',
            'alt' => 'assiette logo exia',
            'imageable_id' => 5,
            'imageable_type' => 'product',
            'user_id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 'gourde-logo.jpg',
            'alt' => 'gourde logo exia',
            'imageable_id' => 6,
            'imageable_type' => 'product',
            'user_id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 'soiree-pyjama.jpg',
            'alt' => 'soiree pyjama dj ambiance exia',
            'imageable_id' => 1,
            'imageable_type' => 'event',
            'user_id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 'soiree-boom.jpg',
            'alt' => 'soiree boom dj ambiance explosive souvenirs exia',
            'imageable_id' => 2,
            'imageable_type' => 'event',
            'user_id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 'soiree-boom.jpg',
            'alt' => 'soiree boom dj ambiance explosive souvenirs exia',
            'imageable_id' => 3,
            'imageable_type' => 'event',
            'user_id' => 1
        ]);
        DB::table('image-bde')->insert([
            'image_link' => 'soiree-boom.jpg',
            'alt' => 'soiree boom dj ambiance explosive souvenirs exia',
            'imageable_id' => 4,
            'imageable_type' => 'event',
            'user_id' => 1
        ]);
    }
}
