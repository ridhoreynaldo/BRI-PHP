<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCodeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_codee', function (Blueprint $table) {
            $table->id();
            $table->string('code');//tambahan
            $table->unsignedBigInteger('id_user');//tambahan
            $table->unsignedBigInteger('id_user_get')->nullable();//tambahan
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');//tambah
            $table->foreign('id_user_get')->references('id')->on('users');//tambah
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_codee');
    }
}
