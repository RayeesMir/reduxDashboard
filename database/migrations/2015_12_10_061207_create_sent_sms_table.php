<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sent_sms',function(Blueprint $table){
            $table->increments('id');
            $table->string('userid');
            $table->text('message')->nullable();
            $table->integer('sms_tid')->nullable();
            $table->string('status',10);
            $table->mediumInteger('bhash_sent_id');
            $table->timestamp('sent_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('sent_sms');
    }
}
