<?php

namespace App\Http\Controllers;



use App\Models\tbl_training;
use Illuminate\Http\Request;
// use Maatwebsite\Excel\Excel;
use App\Imports\trainingImport;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;

class tbl_trainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function datatraining()
    {
        // $data = tbl_training::all();
        $data = tbl_training::orderBy('id', 'asc')->get();
        return view('admin-dashboard.datatraining.index', compact('data'));
    }

    public function tambah_data_training()
    {
        return view('admin-dashboard.datatraining.t-data-training');
    }

    public function insert_data_training(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'gender' => 'required',
            'nis' => 'required|min:3',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'b_indo' => 'required',
            'b_ingris' => 'required|numeric',
            'mtk' => 'required|numeric',
            'ipa' => 'required|numeric',
            'keterangan' => 'required',
            // 'profil' => 'mimes:jpg, jpeg, png,'
        ], [
            'nama.required' => 'field nama tidak boleh kosong ',
            'gender.required' => 'field gender tidak boleh kosong ',
            'nis.required' => 'field nis tidak boleh kosong ',
            'tempat_lahir.required' => 'field empat lahir tidak boleh kosong ',
            'tanggal_lahir.required' => 'field tanggal lahir tidak boleh kosong ',
            'agama.required' => 'field agama tidak boleh kosong ',
            'alamat.required' => 'field alamat tidak boleh kosong ',
            'b_indo.required' => 'field bahasa indonesia tidak boleh kosong ',
            'b_ingris.required' => 'field bahasa ingris tidak boleh kosong ',
            'mtk.required' => 'field mtk tidak boleh kosong ',
            'ipa.required' => 'field ipa tidak boleh kosong ',
            'keterangan.required' => 'field keterangan tidak boleh kosong ',
        ]);

        // $extention = $request->file('profil')->getClientOriginalExtension();
        // $newname = $request->nama . '-' . now()->timestamp . '.' . $extention;
        // $request->file('profil')->storeAs('profil', $request->nama . $newname);

        $data = new tbl_training();
        $data->b_indo = $request->b_indo;
        $data->b_ingris = $request->b_ingris;
        $data->mtk = $request->mtk;
        $data->ipa = $request->ipa;

        $nilai_klasifikasi = ($data->b_indo + $data->b_ingris + $data->mtk + $data->ipa) / 4;

        $data->hasil_klasifikasi = $nilai_klasifikasi;
        $data->ket_klasifikasi = $request->keterangan;
        $data->nama = $request->nama;
        $data->gender = $request->gender;
        $data->nis = $request->nis;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->agama = $request->agama;
        $data->alamat = $request->alamat;
        // $data->profil = $newname;

        $data->save();

        return redirect('/data-training')->with('massage', 'Data berhasil ditambahkan yahhh');
    }


    // import excel
    public function import_excel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:cvs,xls,xlsx'
        ]);

        $file = $request->file('file')->store('public/import');
        $import = new trainingImport;
        $import->import($file);

        // $file = $request->file('file');
        // $nama_file = rand() . $file->getClientOriginalName();
        // $file->move('file_data_training', $nama_file);
        // Excel::import(new trainingImport, public_path('/file_data_training' . $file));

        return redirect('data-training')->with('success', 'Data berhasil di upload');
    }

    public function edit_data_training($id)
    {
        $data = tbl_training::find($id);

        return view('admin-dashboard/datatraining/edit_data_training', compact('data'));
    }

    public function delete_data_training($id)
    {
        DB::table('tbl_training')->where('id', $id)->delete();
        return back()->with('message', 'Data berhasil dihapus');
    }

    public function update_data_training(Request $request, $id)
    {
        $data = tbl_training::find($id);
        $data->b_indo = $request->b_indo;
        $data->b_ingris = $request->b_ingris;
        $data->mtk = $request->mtk;
        $data->ipa = $request->ipa;

        $nilai_klasifikasi = ($data->b_indo + $data->b_ingris + $data->mtk + $data->ipa) / 4;
        if ($nilai_klasifikasi < 75) {
            $ket_klasifikasi = "TIDAK LULUS";
        } else {
            $ket_klasifikasi = "LULUS";
        }


        $data->hasil_klasifikasi = $nilai_klasifikasi;
        $data->ket_klasifikasi = $ket_klasifikasi;



        $data->update($request->except(['_token', 'submit']));

        return redirect('/data-training');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
