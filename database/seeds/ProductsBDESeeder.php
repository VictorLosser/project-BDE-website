<?php

use Illuminate\Database\Seeder;

class ProductsBDESeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product-bde')->insert([
            'title' => 'Sweat-shirt avec logo BDE',
            'description' => 'Très doux à porter, respirant. Soyez fier de représenter votre école',
            'price' => 19.99,
            'category_id' => 1
        ]);
        DB::table('product-bde')->insert([
            'title' => 'T-shirt avec logo BDE',
            'description' => 'Très doux à porter, idéal pour l\'été. Soyez fier de représenter votre école',
            'price' => 12.50,
            'category_id' => 1
        ]);
        DB::table('product-bde')->insert([
            'title' => 'Casquette avec logo BDE',
            'description' => 'On est pas sûr de ce goodie, mais Froidevaux le voulait abesolument. Soyez fier de représenter votre école',
            'price' => 50.00,
            'category_id' => 2
        ]);
        DB::table('product-bde')->insert([
            'title' => 'Mug incroyablement beau',
            'description' => 'Vos matins sont fades ? Insérez votre brevage dans le mug pour sourire instantanément',
            'price' => 5.00,
            'category_id' => 3
        ]);
        DB::table('product-bde')->insert([
            'title' => 'L\'assiette pour la cafet\'',
            'description' => 'Vous en avez marre de manger directement dans votre Tupperware ? Et pourquoi pas prendre une assiette ?',
            'price' => 17.20,
            'category_id' => 3
        ]);
        DB::table('product-bde')->insert([
            'title' => 'Gourde pour votre sport',
            'description' => 'OK. Très peu d\'étudiants seront intéressé par ce produit vu qu\'ils ne font pas de sport AHHHHH',
            'price' => 25.69,
            'category_id' => 3
        ]);
    }
}
