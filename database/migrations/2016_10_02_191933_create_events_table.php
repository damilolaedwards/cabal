<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                 $table->string('name');
                 $table->string('slug');
                 $table->text('details');
                 $table->string('location')->nullable();
                 $table->integer('day')->nullable();
                 $table->integer('month')->nullable();
                 $table->integer('year')->nullable();
                 $table->string('time')->nullable();
                 $table->string('eventimage_1')->nullable();
                 $table->string('eventimage_2')->nullable();
                 $table->string('eventimage_3')->nullable();
                $table->string('eventfile')->nullable();
                $table->integer('institution_id')->unsigned();
                $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');
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
        Schema::dropIfExists('events');
    }
}
