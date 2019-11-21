<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('movie_id')->comment('映画ID');
            $table->string('movie_title')->comment('タイトル');
            $table->dateTime('screen_time')->comment('上映時間');
            $table->string('directer')->comment('監督');
            $table->string('actor')->comment('主演');
            $table->dateTime('aired')->comment('放映年');
            $table->string('catchcopy')->nullable()->comment('キャッチコピー');
            $table->string('synopsis')->nullable()->comment('あらすじ');
            $table->string('img_path')->comment('画像パス');
            $table->string('url')->nullable()->comment('公式URL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
