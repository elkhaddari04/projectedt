<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfenrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {



        Schema::create('profenrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('day')->unique();
        });

        Schema::table('profenrolls', function (Blueprint $table) {

            $table->unsignedBigInteger('prof_id');
            $table->unsignedBigInteger('matiere_id');
            $table->unsignedBigInteger('filiere_id');
            $table->foreign('filiere_id')->references('id')->on('filieres');

            $table->foreign('prof_id')->references('id')->on('users');
            $table->foreign('matiere_id')->references('id')->on('matieres');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profenroll');
    }
}
