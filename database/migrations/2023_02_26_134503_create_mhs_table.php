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
        Schema::create('mhs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('nis');
            $table->text('alamat');
            $table->string('asal_sekolah');
            $table->string('jenis_kelamin');
            $table->integer('B_Indo');
            $table->integer('B_Ingris');
            $table->integer('mtk');
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
        Schema::dropIfExists('mhs');
    }
};
