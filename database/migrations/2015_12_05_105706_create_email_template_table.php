<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_templates',function(Blueprint $table){
            $table->increments('templateid')->unique();
            $table->string('templatename');
            $table->string('subject');
            $table->text('body');
            $table->text('templateuri');
            $table->text('thumbnailuri');
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
        Schema::drop('email_templates');
    }
}
