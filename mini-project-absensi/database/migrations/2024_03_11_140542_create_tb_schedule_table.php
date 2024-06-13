<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_schedule', function (Blueprint $table) {
            $table->id();

            $table->date('date');//tambahan
            $table->time('start');//tambahan
            $table->time('end');//tambahan
            $table->integer('duration');//tambahan
            $table->unsignedBigInteger('id_code');//tambahan
            $table->timestamps();
            $table->foreign('id_code')->references('id')->on('tb_codee');//tambah

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_schedule');
    }
}
