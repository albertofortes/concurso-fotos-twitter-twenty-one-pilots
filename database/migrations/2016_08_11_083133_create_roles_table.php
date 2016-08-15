<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->timestamps();
        });

        DB::table('roles')->insert(
            [
                ['name' => 'administrator'],
                ['name' => 'editor']
            ]
        );

        // Alter user table:
        Schema::table('users', function ($table) {
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
        });

        // seed user table
        DB::table('users')->insert(
            array(
                'name' => 'admin',
                'email' => 'name@domain.com',
                'password' => Hash::make('admin'),
                'role_id' => 1,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            // first of all remove foreign or return an error: Cannot delete or update a parent row
            $table->dropForeign('users_role_id_foreign');
            // then remove the column
            $table->dropColumn('role_id');
        });
        // end remove the table where it was  the foreign key
        Schema::drop('roles');
        // truncate users:
        DB::table('users')->delete();
    }
}
