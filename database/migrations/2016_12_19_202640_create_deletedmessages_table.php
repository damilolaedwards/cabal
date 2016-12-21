<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeletedmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            
            
            $table->boolean('sender_deleted')->default(0);
            $table->boolean('reciever_deleted')->default(0);
               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function ($table) {
    $table->dropColumn(['sender_deleted', 'reciever_deleted']);
});
    }
}
