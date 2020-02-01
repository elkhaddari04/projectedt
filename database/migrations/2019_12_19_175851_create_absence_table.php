<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absencs', function (Blueprint $table) {
            $table->bigIncrements('absence_id');
            $table->integer('id_etudiant');
            $table->integer('id_matiere');
            $table->string('day');
            $table->string('time');
            $table->string('month');
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
        Schema::dropIfExists('absencs');
    }
}
