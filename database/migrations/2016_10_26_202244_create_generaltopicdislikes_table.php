<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneraltopicdislikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generaltopicdislikes', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id');
            $table->integer('topic_id');
            $table->boolean('dislike');
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
        Schema::dropIfExists('generaltopicdislikes');
    }
}
