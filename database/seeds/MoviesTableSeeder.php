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
            [
                'movie_id' => '3',
                'movie_title' => 'メリー・ポピンズ リターンズ',
                'screen_time' => '130',
                'directer' => 'ロブ・マーシャル',
                'actor' => 'エミリー・ブラント',
                'aired' => '2018',
                'catchcopy' => 'わたしにできないことはない。魔法で最高のハッピーを',
                'synopsis' => '3人の子どもを持つ父親になったマイケル。しかし妻を亡くし、以前の明るさをなくしていた・・・',
                'img_path' => 'movie3.jpg',
                'url' => 'https://www.disney.co.jp/movie/marypoppins-returns.html',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'movie_id' => '4',
                'movie_title' => 'ブラック・クランズマン',
                'screen_time' => '135',
                'directer' => 'スパイク・リー',
                'actor' => 'ジョン・デビット・ワシントン',
                'aired' => '2018',
                'catchcopy' => '俺たちが、すべてを暴く。',
                'synopsis' => '型破りな刑事コンビは大胆不敵な潜入捜査を成し遂げることができるのか！？',
                'img_path' => 'movie4.jpg',
                'url' => 'https://bkm-movie.jp/',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'movie_id' => '5',
                'movie_title' => 'アラジン(2019)',
                'screen_time' => '128',
                'directer' => 'ガイ・リッチー',
                'actor' => 'ミーナ・マスード',
                'aired' => '2019',
                'catchcopy' => 'これが、ディズニーの「魔法」',
                'synopsis' => '砂漠の王国・アグラバーを舞台に、アラジンとジャスミン王女の恋や魔人ジーニーとの冒険を描く',
                'img_path' => 'movie5.jpg',
                'url' => 'https://www.disney.co.jp/movie/aladdin.html',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'movie_id' => '6',
                'movie_title' => '英国王のスピーチ',
                'screen_time' => '118',
                'directer' => 'トム・フーパー',
                'actor' => 'コリン・ファース',
                'aired' => '2014',
                'catchcopy' => '英国史上、もっとも内気な王',
                'synopsis' => '吃音障害を持ったジョージ6世は療法士ライオネルと出会い、自信の運命を大きく変える。',
                'img_path' => 'movie6.jpg',
                'url' => 'https://eiga.com/movie/55750/',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'movie_id' => '7',
                'movie_title' => 'エイリアン2',
                'screen_time' => '137',
                'directer' => 'ジェームズ・キャメロン',
                'actor' => 'シガニー・ウィーバー',
                'aired' => '1986',
                'catchcopy' => '宇宙には、ひとりで行ってはならない所がある',
                'synopsis' => '地球に帰還したエレン・リプリーは再びエイリアンの大群と遭遇する',
                'img_path' => 'movie7.jpg',
                'url' => 'https://eiga.com/movie/42741/',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'movie_id' => '8',
                'movie_title' => 'ブレードランナー2049',
                'screen_time' => '163',
                'directer' => 'ドゥニ・ヴィルヌーヴ',
                'actor' => 'ライアン・ゴズリング',
                'aired' => '2017',
                'catchcopy' => 'ブレードランナーが新たなる＜奇跡＞を起こす',
                'synopsis' => '人間と人造人間の秩序を崩壊させ、人類存亡に関わる真実が明かされようとしている',
                'img_path' => 'movie8.jpg',
                'url' => 'https://bd-dvd.sonypictures.jp/bladerunner2049/',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'movie_id' => '9',
                'movie_title' => 'ダイ・ハード ラスト・デイ',
                'screen_time' => '98',
                'directer' => 'ジョン・ムーア',
                'actor' => 'ブルース・ウィリス',
                'aired' => '2013',
                'catchcopy' => '運の悪さは、遺伝する。',
                'synopsis' => 'この世で最もアンラッキーな親子が、世界を震撼させる巨大な陰謀に立ち向かう',
                'img_path' => 'movie9.jpg',
                'url' => 'http://www.foxmovies.jp/diehard-lastday/',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'movie_id' => '10',
                'movie_title' => 'バーフバリ 王の凱旋',
                'screen_time' => '167',
                'directer' => 'S・S・ラージャマウリ',
                'actor' => 'プラバース',
                'aired' => '2017',
                'catchcopy' => '願いは叶う。',
                'synopsis' => '三代にわたる宇宙最強の愛と復讐が、想像を超えた興奮と感動のフィナーレを迎える',
                'img_path' => 'movie10.jpg',
                'url' => 'http://www.foxmovies.jp/diehard-lastday/',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);
    }
}
