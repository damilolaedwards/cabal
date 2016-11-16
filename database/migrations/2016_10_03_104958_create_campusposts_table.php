<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampuspostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campusposts', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('topic_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('body');
            $table->integer('institution_id')->unsigned();
             $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('campustopics')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('campusposts');
    }
}
