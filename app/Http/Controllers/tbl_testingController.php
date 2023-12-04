<?php

namespace App\Http\Controllers;

use App\Http\Resources\data_trainingResource;
use App\Imports\testingImport;
use App\Models\mhs;
use Illuminate\Http\Request;
use App\Models\tbl_testing;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\DB;

class tbl_testingController extends Controller
{
    public function tambah_data(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'nis' => 'required|min:6',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'b_indo' => 'required',
            'b_ingris' => 'required',
            'mtk' => 'required',
        ]);

        $siswa = new mhs();
        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->alamat = $request->alamat;
        $siswa->asal_sekolah = $request->asal_sekolah;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->b_indo = $request->b_indo;
        $siswa->b_ingris = $request->b_ingris;
        $siswa->mtk = $request->mtk;

        $siswa->save();
        return redirect('data-testing/datatesting');
    }

    public function datatesting()
    {

        $data = tbl_testing::all();
        // $data = mhs::orderBy('id', 'desc')->get();
        return view('admin-dashboard.data-testing.datatesting', compact('data'));
    }

    public function edit_data_testing($id)
    {
        $data = tbl_testing::find($id);
        return view('admin-dashboard/data-testing/edit_data_testing', compact('data'));
    }

    public function update_data_testing(Request $request, $id)
    {

        $data = tbl_testing::find($id);
        $data->b_indo = $request->b_indo;
        $data->b_ingris = $request->b_ingris;
        $data->mtk = $request->mtk;
        $data->ipa = $request->ipa;
        $data->update($request->except(['_token', 'submit']));

        return redirect('/data-testing');
    }

    public function delete($id)
    {

        DB::table('tbl_testing')->where('id', $id)->delete();
        return back()->with('succes', 'Data berhasil dihapus');
    }

    public function insert_data_testing(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'gender' => 'required',
            'nis' => 'required|min:6',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'b_indo' => 'required',
            'b_ingris' => 'required',
            'ipa' => 'required',
            'mtk' => 'required',
            'ket_klasifikasi' => 'required',
        ]);
        // dd($request);
        $siswa = new tbl_testing();
        $siswa->nama = $request->nama;
        $siswa->gender = $request->gender;
        $siswa->nis = $request->nis;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->b_indo = $request->b_indo;
        $siswa->b_ingris = $request->b_ingris;
        $siswa->ipa = $request->ipa;
        $siswa->mtk = $request->mtk;
        $siswa->ket_klasifikasi = $request->ket_klasifikasi;

        $siswa->save();
        return redirect('data-testing')->with('success', 'Data berhasil ditambahkan');
    }

    public function import_excel(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|mimes:cvs,xls,xlsx'
        // ]);
        // $this->validate($request, [
        //     'file' => 'required|mimes:cvs,xls,xlsx'
        // ]);

        $file = $request->file('file')->store('public/importtesting');

        $import = new testingImport;
        $import->import($file);

        // $file = $request->file('file');
        // $nama_file = rand() . $file->getClientOriginalName();
        // $file->move('file_data_training', $nama_file);
        // Excel::import(new trainingImport, public_path('/file_data_training' . $file));

        return redirect('data-testing')->with('success', 'Data berhasil di upload');
    }


    // public function insert_data_testing(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required',
    //         'gender' => 'required',
    //         'nis' => 'required|min:6',
    //         'tempat_lahir' => 'required',
    //         'tanggal_lahir' => 'required',
    //         'agama' => 'required',
    //         'alamat' => 'required',
    //         'b_indo' => 'required',
    //         'b_ingris' => 'required',
    //         'ipa' => 'required',
    //         'mtk' => 'required',
    //         'keterangan' => 'required',
    //     ]);

    //     //mengambil data dari database
    //     $nilai_siswa = DB::table('tbl_training')->select('b_indo', 'b_ingris', 'mtk', 'ipa', 'ket_klasifikasi')->get();

    //     //menghitung jarak includience
    //     $siswa = new tbl_testing();
    //     $siswa->b_indo = $request->b_indo;
    //     $siswa->b_ingris = $request->b_ingris;
    //     $siswa->mtk = $request->mtk;
    //     $siswa->ipa = $request->ipa;

    //     $jarak = array();
    //     foreach ($nilai_siswa as $ns) {
    //         $jarak[] = array(
    //             'jarak' => sqrt(pow(($ns->b_indo - $siswa->b_indo), 2) +
    //                 pow(($ns->b_ingris - $siswa->b_ingris), 2) +
    //                 pow(($ns->mtk - $siswa->mtk), 2) +
    //                 pow(($ns->ipa - $siswa->ipa), 2)),
    //             'lulus' => $ns->ket_klasifikasi
    //         );
    //     }

    //     for ($i = 0; $i < count($jarak) - 1; $i++) {
    //         for ($j = $i + 1; $j < count($jarak); $j++) {
    //             if ($jarak[$j]['jarak'] < $jarak[$i]['jarak']) {
    //                 $temp_jarak = $jarak[$i]['jarak'];
    //                 $temp_desc = $jarak[$i]['lulus'];
    //                 $jarak[$i]['jarak'] = $jarak[$j]['jarak'];
    //                 $jarak[$i]['lulus'] = $jarak[$j]['lulus'];
    //                 $jarak[$j]['jarak'] = $temp_jarak;
    //                 $jarak[$j]['lulus'] = $temp_desc;
    //             }
    //         }
    //     }


    //     $k = env('K');
    //     $k_terdekat = array_slice($jarak,  0, $k);;

    //     $jumlah_lulus = 0;
    //     $jumlah_tidak_lulus = 0;

    //     foreach ($k_terdekat as $tetangga) {
    //         // dd($tetangga);
    //         if ($tetangga['lulus'] == 'LULUS') {
    //             $jumlah_lulus++;
    //         } else {
    //             $jumlah_tidak_lulus++;
    //         }
    //     }


    //     if ($jumlah_lulus < $jumlah_tidak_lulus) {
    //         $ket_klasifikasi = 'TIDAK LULUS';
    //     } else {
    //         $ket_klasifikasi = 'LULUS';
    //     }

    //     $siswa = new tbl_testing();
    //     $siswa->nama = $request->nama;
    //     $siswa->gender = $request->gender;
    //     $siswa->nis = $request->nis;
    //     $siswa->tempat_lahir = $request->tempat_lahir;
    //     $siswa->tanggal_lahir = $request->tanggal_lahir;
    //     $siswa->agama = $request->agama;
    //     $siswa->alamat = $request->alamat;
    //     $siswa->b_indo = $request->b_indo;
    //     $siswa->b_ingris = $request->b_ingris;
    //     $siswa->mtk = $request->mtk;
    //     $siswa->ipa = $request->ipa;
    //     $siswa->ket_klasifikasi = $request->$ket_klasifikasi;
    //     $siswa->ket_klasifikasi = $ket_klasifikasi;

    //     $siswa->save();

    //     return redirect('data-testing');
    // }

    public function klasifikasi()
    {
    }

    public function api()
    {
        $data = tbl_testing::all();
        // return response()->json(['data' => $data]);
        return data_trainingResource::collection($data);
    }
}
