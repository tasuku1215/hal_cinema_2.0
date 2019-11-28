<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            [
                'movie_id' => '1',
                'movie_title' => 'ゴジラ キング・オブ・モンスターズ',
                'screen_time' => '132',
                'directer' => 'マイケル・ドハティ',
                'actor' => 'ミリー・ボビー・ブラウン',
                'aired' => '2019',
                'catchcopy' => '王の覚醒。 世界の終焉が始まる。',
                'synopsis' => '王の覚醒。 世界の終焉が始まる。',
                'img_path' => 'movie1.jpg',
                'url' => 'https://godzilla-movie.jp/',
            ],
        ]);
    }
}
