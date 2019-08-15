<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQustionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qustions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); /*setiap pertanyaan membutuhkan title*/
            $table->string('slug')->unique();
            $table->text('body');
            $table->unsignedInteger('views')->default(0); /*unsignedInteger=integer yang tidak kurang dari 0*/
            $table->unsignedInteger('answers')->default(0);
            $table->integer('votes')->default(0);
            $table->unsignedInteger('best_answer_id')->nullable(); /*jawaban terbaik tidak bisa/boleh null */
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qustions');
    }
}
