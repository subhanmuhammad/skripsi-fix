<?php

namespace App\Http\Controllers;

use App\Models\tbl_testing;
use Illuminate\Support\Arr;
use App\Models\tbl_training;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $hitung_lulus = tbl_training::where('ket_klasifikasi', 'LULUS')->count();
        $hitung_tidak_lulus = tbl_training::where('ket_klasifikasi', 'TIDAK LULUS')->count();
        $pendaftar = tbl_testing::count();

        //menghitung akurasi
        $data = DB::table('tbl_testing')->select('hasil_klasifikasi', 'ket_klasifikasi')->get();
        $jumlah_data_uji = DB::table('tbl_testing')->count();

        $jumlah_benar = 0;
        foreach ($data as $item) {
            if ($item->ket_klasifikasi == $item->hasil_klasifikasi) {
                $jumlah_benar++;
            }
        }

        $hitung_akurasi = $jumlah_benar / $jumlah_data_uji * 100;
        $akurasi = substr($hitung_akurasi, 0, 5);

        return view('admin-dashboard/dashboard.index', compact('hitung_lulus', 'hitung_tidak_lulus', 'akurasi', 'pendaftar'));
    }

    public function uji(Request $request)
    {

        $data = tbl_testing::orderBy('rata_rata', 'desc')->get();
        $data1 = tbl_testing::select('rata_rata', 'hasil_klasifikasi')->orderBy('rata_rata', 'desc')->paginate(10);

        return view("admin-dashboard.pengujian.index", compact('data', 'data1'));
    }

    public function uji_data()
    {
        //mengambil nilai dari tabel training dan tabel testing
        $nilai_training = DB::table('tbl_training')->select('b_indo', 'b_ingris', 'mtk', 'ipa', 'ket_klasifikasi')->get();
        $nilai_testing = DB::table('tbl_testing')->select('id', 'nama', 'b_indo', 'b_ingris', 'mtk', 'ipa', 'ket_klasifikasi')->get();

        //ubah menjadi aray
        $data_testing = [];
        foreach ($nilai_testing as $n_test) {
            $data_testing[] = $n_test;
        }

        $data_training = [];
        foreach ($nilai_training as $n_train) {
            $data_training[] = $n_train;
        }

        // mengitung jarak dari setiap nilai testing terhadap nilai training
        $jarak = array();
        $i = 0;
        foreach ($data_testing as $d_test) {
            $j = 0;
            $jarak[$i]['id'] = $d_test->id;
            foreach ($data_training as $d_train) {
                $jarak[$i]['data'][$j] = array(
                    'nama' => $d_test->nama,
                    'jarak' => sqrt(pow(($d_train->b_indo - $d_test->b_indo), 2) +
                        pow(($d_train->b_ingris - $d_test->b_ingris), 2) +
                        pow(($d_train->mtk - $d_test->mtk), 2) +
                        pow(($d_train->ipa - $d_test->ipa), 2)),
                    'lulus' => $d_train->ket_klasifikasi
                );
                $j++;
            }
            $i++;
        }


        // mengurut data nilai dari yang terendah ke terbesar
        for ($i = 0; $i < count($jarak); $i++) {
            for ($j = 0; $j < count($jarak[$i]['data']) - 1; $j++) {
                for ($k = $j + 1; $k < count($jarak[$i]['data']); $k++) {
                    if ($jarak[$i]['data'][$k] < $jarak[$i]['data'][$j]) {
                        $name = $jarak[$i]['data'][$j]['nama'];
                        $jarak_ = $jarak[$i]['data'][$j]['jarak'];
                        $lulus = $jarak[$i]['data'][$j]['lulus'];
                        $jarak[$i]['data'][$j]['nama'] = $jarak[$i]['data'][$k]['nama'];
                        $jarak[$i]['data'][$j]['jarak'] = $jarak[$i]['data'][$k]['jarak'];
                        $jarak[$i]['data'][$j]['lulus'] = $jarak[$i]['data'][$k]['lulus'];
                        $jarak[$i]['data'][$k]['nama'] = $name;
                        $jarak[$i]['data'][$k]['jarak'] = $jarak_;
                        $jarak[$i]['data'][$k]['lulus'] = $lulus;
                    }
                }
            }
        }
        dd($jarak[0]);

        $k = env('k');
        $sliced_array = array();

        $i = 0;
        foreach ($jarak as $item) {
            $sliced_array[$i]['id'] = $item['id'];
            $sliced_array[$i]['data'] = array_slice($item['data'], 0, $k);
            $i++;
        }

        $lulus = 0;
        $tidak_lulus = 0;

        // dd($sliced_array);
        $array__1 = [];
        $i = 0;
        foreach ($sliced_array as $data) {

            foreach ($data['data'] as $item) {

                if ($item['lulus'] == 'LULUS') {
                    $lulus++;
                } else {
                    $tidak_lulus++;
                }
            }
            if ($lulus > $tidak_lulus) {
                $hasil_klasifikasi = 'LULUS';
            } else {
                $hasil_klasifikasi = 'TIDAK LULUS';
            }

            $sliced_array[$i]['klasifikasi'] = $hasil_klasifikasi;
            $i++;
        }
        // dd($sliced_array);
        foreach ($sliced_array as $data) {
            $tbl_testing = DB::table('tbl_testing')->where('id', $data['id'])->update(['hasil_klasifikasi' => $data['klasifikasi']]);
        }

        return redirect('pengujian')->with('success', 'Data berhasil di uji');
    }

    public function print()
    {
        $data = tbl_testing::get();
        $pdf = Pdf::loadView('admin-dashboard.data-testing.pdf', ['data' => $data]);
        return $pdf->download('data.pdf');
    }

    public function hapus_pengujian()
    {
        return "jaloo ini hapus oengujian";
    }

    public function akurasi()
    {

        $data = DB::table('tbl_testing')->select('hasil_klasifikasi', 'ket_klasifikasi')->get();
        $jumlah_data_uji = DB::table('tbl_testing')->count();

        $jumlah_true_positive = 0;
        $jumlah_true_negative = 0;
        $jumlah_false_positive = 0;
        $jumlah_false_negative = 0;

        foreach ($data as $data) {
            if ($data->ket_klasifikasi == "LULUS" && $data->hasil_klasifikasi == 'LULUS') {
                $jumlah_true_positive++;
            } elseif ($data->ket_klasifikasi == "TIDAK LULUS" && $data->hasil_klasifikasi == 'TIDAK LULUS') {
                $jumlah_true_negative++;
            } elseif ($data->ket_klasifikasi == 'TIDAK LULUS' && $data->hasil_klasifikasi == 'LULUS') {
                $jumlah_false_positive++;
            } elseif ($data->ket_klasifikasi == 'LULUS' && $data->hasil_klasifikasi == 'TIDAK LULUS') {
                $jumlah_false_negative++;
            }
        }

        $jumlah_benar = $jumlah_true_positive + $jumlah_true_negative;
        $hitung_akurasi = $jumlah_benar / $jumlah_data_uji * 100;
        $akurasi = substr($hitung_akurasi, 0, 4);

        //percision
        $percision_count = $jumlah_true_positive / ($jumlah_true_positive + $jumlah_false_positive) * 100;
        $percision = substr($percision_count, 0, 4);

        //recall
        $recal_count = $jumlah_true_positive / ($jumlah_true_positive + $jumlah_false_negative) * 100;
        $recal = substr($recal_count, 0, 7);

        return view('admin-dashboard.akurasi.akurasi', compact('jumlah_true_positive', 'jumlah_true_negative', 'percision', 'jumlah_false_positive', 'jumlah_false_negative', 'akurasi', 'recal'));
    }

    public function datatesting()
    {
        // $data = mhs::all();
        // $data = mhs::orderBy('id', 'desc')->get();

        // return view('admin-dashboard.data-testing.datatesting', compact('data'));
    }

    public function datatraining()
    {
        return view('admin-dashboard.datatraining.index');
    }

    public function Tdatatesting()
    {
        return view('admin-dashboard.data-testing.tdata');
    }
    public function login()
    {
        return view('layout.login');
    }

    public function tambah_data(Request $request)
    {
    }

    public function filter_hasil_klasifikasi(Request $request)
    {
        // dd($request->all());
        if ($request->has('search')) {
            $data = tbl_testing::where('hasil_klasifikasi', 'LIKE', '%' . $request->search . '%')->get();
            // dd($data);
        } else {
            $data = tbl_testing::all();
        }
        return view("admin-dashboard.pengujian.index", compact('data'));
    }
}
