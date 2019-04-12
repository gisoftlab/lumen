<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_team', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('user_team', function(Blueprint $table) {
            $table->foreign('team_id')->references('id')->on('teams')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_team', function(Blueprint $table) {
            $table->dropForeign('user_team_user_id_foreign');
        });

        Schema::table('user_team', function(Blueprint $table) {
            $table->dropForeign('user_team_team_id_foreign');
        });
    }
}
