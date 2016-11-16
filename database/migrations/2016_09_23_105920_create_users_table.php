<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username')->unique()->index();
            $table->string('email')->unique();
            $table->string('profile_image')->nullable();
            $table->enum('role', ['user', 'moderator', 'administrator'])->default('user');
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamp('read_last_message_at')->nullable();
            $table->enum('sex',['male', 'female']);
            $table->boolean('is_banned')->default(false);
            $table->integer('day');
            $table->integer('month');
            $table->integer('year');
            $table->string('personal_text')->nullable();
             $table->integer('institution_id')->unsigned()->index();
             $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
