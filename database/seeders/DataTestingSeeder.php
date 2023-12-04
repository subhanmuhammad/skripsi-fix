<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataTestingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 30; $i++) {
            DB::table('tbl_testing')->insert([
                'nama' => Str::random(10),
                'gender' => 'Laki-laki',
                'nis' => random_int(200, 500),
                'tempat_lahir' => Str::random(5),
                'tanggal_lahir' => Str::random(5),
                'agama' => Str::random(5),
                'alamat' => Str::random(10),
                'B_indo' => random_int(70, 90),
                'B_ingris' => random_int(70, 90),
                'mtk' => random_int(70, 90),
                'ipa' => random_int(70, 90),
                'ket_klasifikasi' => Str::random(10),
            ]);
        };
    }
}
