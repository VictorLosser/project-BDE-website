<?php

use Illuminate\Database\Seeder;

class OrdersBDESeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders-bde')->insert([
            'total_price' => 150.22,
            'order_date' => '2018-04-11 12:25:26',
            'id' => 1
        ]);
        DB::table('orders-bde')->insert([
            'total_price' => 11.11,
            'order_date' => '2018-04-11 11:11:11',
            'id' => 2
        ]);
        DB::table('orders-bde')->insert([
            'total_price' => 366.99,
            'order_date' => '2018-04-11 10:05:00',
            'id' => 3
        ]);
    }
}
