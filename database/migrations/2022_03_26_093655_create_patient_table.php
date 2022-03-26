<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->string('hn_id')->primary();
            $table->integer('p_tname');
            $table->string('p_name');
            $table->string('p_surname');
            $table->integer('p_etname');
            $table->string('p_ename');
            $table->string('p_esurname');
            $table->string('p_address');
            $table->date('p_birthdate');
            $table->integer('p_gender');
            $table->string('p_tel');
            $table->float('p_weight');
            $table->float('p_height');
            $table->string('p_race');
            $table->string('p_nationality');
            $table->string('p_religion');
            $table->string('p_passwordcode');
            $table->string('p_image');
            $table->string('p_sysptom');
            $table->integer('p_status');
            $table->integer('u_id');
            $table->integer('d_id');
            $table->integer('h_id');
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
        Schema::dropIfExists('patient');
    }
};
