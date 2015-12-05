<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentMailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sent_mails',function(Blueprint $table){
            $table->increments('sentmailid');
            $table->string('userid');
            $table->string('templateid');
            $table->timestamps('sentdate');
            $table->string('status');
            $table->string('sentfrommail');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
