<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagesToCampuspostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campusposts', function (Blueprint $table) {
             $table->string('postimage1')->nullable();
                 $table->string('postimage2')->nullable();
                 $table->string('postimage3')->nullable();
                $table->string('postfile')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campusposts', function (Blueprint $table) {
            $table->dropColumn(['postimage1', 'postimage2', 'postimage3','postfile']);
        });
    }
}
