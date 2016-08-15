<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFinalistPreselectedAndWinnerToContestants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Alter user table:
        Schema::table('contestants', function ($table) {
            $table->enum('status', array('Sin determinar', 'Preseleccionado', 'Finalista'))->after('contest_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contestants', function ($table) {
            $table->dropColumn('status');
        });
    }
}
