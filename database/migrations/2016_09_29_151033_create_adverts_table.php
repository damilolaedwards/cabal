<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
             $table->string('slug');
            $table->text('description')->nullable();
            $table->string('price')->nullable();
            $table->boolean('negotiable');
            $table->string('phone_number')->nullable();
            $table->integer('institution_id')->unsigned();
            $table->string('advertimage1')->nullable();
            $table->string('advertimage2')->nullable();
            $table->string('advertimage3')->nullable();
            $table->string('advertfile')->nullable();
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
        Schema::dropIfExists('adverts');
    }
}
