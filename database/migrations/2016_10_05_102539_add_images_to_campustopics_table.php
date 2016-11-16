<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagesToCampustopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campustopics', function (Blueprint $table) {
           
                 $table->string('forumimage1')->nullable();
                 $table->string('forumimage2')->nullable();
                 $table->string('forumimage3')->nullable();
                $table->string('forumfile')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campustopics', function (Blueprint $table) {
             $table->dropColumn(['forumimage1', 'forumimage2', 'forumimage3','forumfile']);
        });
    }
}
