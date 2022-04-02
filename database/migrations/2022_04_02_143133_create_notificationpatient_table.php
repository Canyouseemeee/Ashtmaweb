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
        Schema::create('notificationpatient', function (Blueprint $table) {
            $table->increments('nop_id');
            $table->string('nop_name');
            $table->string('nop_temperature');
            $table->string('nop_text');
            $table->string('nop_video');
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
        Schema::dropIfExists('notificationpatient');
    }
};
