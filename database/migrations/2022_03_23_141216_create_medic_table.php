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
        Schema::create('medic', function (Blueprint $table) {
            $table->string('m_id')->primary();
            $table->string('m_fullname');
            $table->string('password');
            $table->integer('m_position');
            $table->boolean('admin')->default(false);
            $table->integer('h_id');
            $table->date('m_startdate');
            $table->date('m_enddate');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medic');
    }
};
