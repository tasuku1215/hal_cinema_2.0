<?php

use Illuminate\Database\Seeder;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prices')->insert([
            [
                'price_id' => '1',
                'price_name' => '大人',
                'price' => '1000',
                'start_day' => '2019-12-11',
                'end_day' => '2500-1-1',
            ],
            [
                'price_id' => '2',
                'price_name' => '学生',
                'price' => '800',
                'start_day' => '2019-12-11',
                'end_day' => '2500-1-1',
            ],
            [
                'price_id' => '3',
                'price_name' => '子ども',
                'price' => '500',
                'start_day' => '2019-12-11',
                'end_day' => '2500-1-1',
            ]
        ]);
    }
}
