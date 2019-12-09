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
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'movie_id' => '2',
                'movie_title' => '白鯨との闘い',
                'screen_time' => '122',
                'directer' => 'ロン・ハワード',
                'actor' => 'クリス・ヘムズワース',
                'aired' => '2016',
                'catchcopy' => '名著『白鯨』の隠されて続けてきた衝撃の実話。',
                'synopsis' => '伝説の白鯨との死闘。生き延びるために男たちが下した、”究極の決断”とは',
                'img_path' => 'movie2.jpg',
                'url' => 'http://wwws.warnerbros.co.jp/hakugeimovie/',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
