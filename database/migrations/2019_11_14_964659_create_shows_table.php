<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->bigIncrements('show_id');
            $table->tinyInteger('screen_symbol')->commnt('0:スクリーンA, 1:スeクリーンB');
            $table->datetime('start_datetime');
            $table->datetime('end_datetime');
            $table->integer('cleaning_time')->comment('総掃除時間(前後を足したもの)');
            $table->tinyInteger('status')->default(1)->comment('0:無効(非表示), 1:有効');
            $table->boolean('tweeted')->default(false)->comment('ツイート済かどうか');

            // 外部キー群
            $table->bigInteger('movie_id')->unsigned();
            $table->bigInteger('admin_id')->unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shows');
    }
}
