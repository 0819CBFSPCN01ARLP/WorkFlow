<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('email');
            $table->string('area', 300);

            $table->timestamps();
        });

        Schema::table("users", function (Blueprint $table) {
            $table->bigInt("team_id");
            $table->foreign('team_id')->references('id')->on('teams');
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
        Schema::dropIfExists('teams');
    }
}
