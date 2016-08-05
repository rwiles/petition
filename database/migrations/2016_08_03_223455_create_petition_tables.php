<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetitionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petitions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('summary');
            $table->longtext('body');
            $table->boolean('private');
            $table->string('thankyou_title');
            $table->longtext('thankyou_body');
            $table->string('thankyou_email_subject');
            $table->longtext('thankyou_email_body');
            $table->string('thankyou_sms');
            $table->timestamps();
        });

        Schema::create('signatures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('petition_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
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
        Schema::drop('petitions');
        Schema::drop('signatures');
    }
}
