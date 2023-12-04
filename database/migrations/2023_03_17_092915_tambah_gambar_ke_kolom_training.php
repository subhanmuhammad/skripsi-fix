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
        Schema::table('tbl_training', function (Blueprint $table) {
            $table->string('profil', 255)->nullable()->after('alamat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_training', function (Blueprint $table) {
            if (Schema::hasColumn('tbl_training', 'profil'));
            $table->dropColumn('profil');
        });
    }
};
