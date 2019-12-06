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

            // 外部キー群
            $table->bigInteger('movie_id')->unsigned();
            $table->foreign('movie_id')->references('movie_id')->on('movies');
            $table->bigInteger('admin_id')->unsigned();
            $table->foreign('admin_id')->references('admin_id')->on('admins');

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
