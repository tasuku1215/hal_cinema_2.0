<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Shows extends Migration
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
            $table->tinyInteger('screen_symbol')->comment('0:スクリーンA, 1:スクリーンB');
            $table->datetime('start_datetime');
            $table->datetime('end_datetime');
            $table->tinyInteger('status')->comment('0:無効(非表示), 1:有効');

            // 外部キー群
            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('movie_id')->on('movies');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users');

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
