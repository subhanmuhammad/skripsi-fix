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
        Schema::create('tbl_training', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('gender');
            $table->string('nis')->nullable();
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('agama');
            $table->text('alamat');
            // $table->string('profil', 255);
            $table->integer('b_indo');
            $table->integer('b_ingris');
            $table->integer('mtk');
            $table->integer('ipa');
            $table->string('ket_klasifikasi')->nullable();
            $table->string('hasil_klasifikasi')->nullable();
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
        //
    }
};
