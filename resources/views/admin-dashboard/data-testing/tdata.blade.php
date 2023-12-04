@extends('layout.index')
@section('conten-header')
    <h4>Data Testing</h4>
@endsection
@section('content')
    <div class="card-body">
        <form action="/insert-data-testing" method="post">
            <div class="row">
                @csrf
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="nama" name="nama">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select form-control" name="gender" id="gender">
                            <option selected>Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nis</label>
                        <input type="text" class="form-control" id="nis" placeholder="nis" name="nis">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                            placeholder="Tempat Lahir">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            placeholder="Tanggal Lahir">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nilai B.Indonesia</label>
                        <input type="text" class="form-control" id="b_indo" placeholder="Nilai bahasa indonesia"
                            name="b_indo">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nilai B.Ingris</label>
                        <input type="text" class="form-control" id="b_ingris" placeholder="Nilai bahasa ingris"
                            name="b_ingris">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nilai Matematika</label>
                        <input type="text" class="form-control" id="mtk" placeholder="Nilai matematika"
                            name="mtk">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nilai IPA</label>
                        <input type="text" class="form-control" id="ipa" placeholder="Nilai IPA" name="ipa">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="ket_klasifikasi" placeholder="Keterangan"
                            name="ket_klasifikasi">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Tambah</button>
        </form>
    </div>
@endsection
