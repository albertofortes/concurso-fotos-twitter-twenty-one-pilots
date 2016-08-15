<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contestants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('surname', 120);
            $table->string('email', 50);
            $table->string('phone', 50);
            $table->string('twitter_user', 50);
            $table->string('ticket_image', 120);
            $table->string('contest_image', 120);
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
        Schema::drop('contestants');
    }
}
