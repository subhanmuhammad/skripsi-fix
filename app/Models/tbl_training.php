<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_training extends Model
{
    use HasFactory;

    protected $table = 'tbl_training';
    // protected $guarded = [''];
    protected $fillable = [
        // list field2 yang kan diinput
        'nama',
        'gender',
        'nis',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat',
        'b_indo',
        'b_ingris',
        'b_mtk',
        'b_ipa',
        'ket_klasifikasi',
    ];
}
