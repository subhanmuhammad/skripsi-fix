<?php

namespace App\Imports;

use App\Models\tbl_training;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class trainingImport implements ToModel
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new tbl_training([
            'nama' => $row[0],
            'gender' => $row[1],
            'nis' => $row[2],
            'tempat_lahir' => $row[3],
            'tanggal_lahir' => $row[4],
            'agama' => $row[5],
            'alamat' => $row[6],
            'b_indo' => $row[7],
            'b_ingris' => $row[8],
            'mtk' => $row[9],
            'ipa' => $row[10],
            'ket_klasifikasi' => $row[11],
        ]);
    }
    public function getTypeByColumn(): array
    {
        return [
            'nama' => 'string',
            'gender' => 'string',
            'nis' => 'numeric',
            'tempat_lahir' => 'string',
            'tanggal_lahir' => 'date',
            'agama' => 'string',
            'alamat' => 'string',
            'b_indo' => 'integer',
            'b_ingris' => 'integer',
            'mtk' => 'integer',
            'ipa' => 'integer',
            'ket_klasifikasi' => 'string',
        ];
    }
}
