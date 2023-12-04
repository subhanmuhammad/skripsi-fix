@extends('layout.index')
@section('content')
    <div class="mt-2 ml-3">
        <h3 style="align-items: center">Tambah Data</h3>
    </div>

    <div class="card-body">
        {{-- @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif --}}
        <form action="/insert-data-training" method="post" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="nama" name="nama"
                            value="{{ old('nama') }}">
                        @error('nama')
                            <small class="error" style="text-decoration-color: crimson">{{ $message }}</small>
                        @enderror
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
                        @error('gender')
                            <small class="error" style="text-decoration-color: crimson">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nis</label>
                        <input type="number" class="form-control" id="nis" value="{{ old('nis') }}"
                            placeholder="nis" name="nis">
                    </div>
                    @error('nis')
                        <small class="error" style="text-decoration-color: crimson">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" value="{{ old('tempat_lahir') }}"
                            name="tempat_lahir" placeholder="Tempat Lahir">
                    </div>
                    @error('tempat_lahir')
                        <small class="error" style="text-decoration-color: crimson">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                            name="tanggal_lahir" placeholder="Tanggal Lahir">
                    </div>
                    @error('tanggal_lahir')
                        <small class="error" style="text-decoration-color: crimson">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Agama</label>
                        <input type="text" class="form-control" id="agama" value="{{ old('agama') }}" name="agama"
                            placeholder="Agama">
                    </div>
                    @error('agama')
                        <small class="error" style="text-decoration-color: crimson">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" value="{{ old('alamat') }}"
                            name="alamat" placeholder="alamat">
                    </div>
                    @error('alamat')
                        <small class="error" style="text-decoration-color: crimson">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nilai B.Indonesia</label>
                        <input type="number" class="form-control" id="b_indo" value="{{ old('b_indo') }}"
                            placeholder="Nilai bahasa indonesia" name="b_indo">
                        @error('b_indo')
                            <small class="error" style="text-decoration-color: crimson">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nilai B.Ingris</label>
                        <input type="number" class="form-control" id="b_ingris" value="{{ old('b_ingris') }}"
                            placeholder="Nilai bahasa ingris" name="b_ingris">
                        @error('b_ingris')
                            <small class="error" style="text-decoration-color: crimson">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nilai Matematika</label>
                        <input type="number" class="form-control" id="mtk" value="{{ old('mtk') }}"
                            placeholder="Nilai matematika" name="mtk">
                        @error('mtk')
                            <small class="error" style="text-decoration-color: crimson">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nilai Ipa</label>
                        <input type="number" class="form-control" id="ipa" placeholder="Nilai Ipa"
                            name="ipa" value="{{ old('ipa') }}">
                        @error('ipa')
                            <small class="error" style="text-decoration-color: crimson">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="tex" class="form-control" id="keterangan" placeholder="ketrangan"
                            name="keterangan" value="{{ old('keterangan') }}">
                        @error('keterangan')
                            <small class="error" style="text-decoration-color: crimson">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Foto Profil</label>
                        <input type="file" class="form-control" id="inputGroupFile04" name="profil">
                    </div>
                </div> --}}
            </div>
            <button type="submit" class="btn btn-primary mb-3">Tambah Data</button>
        </form>
    </div>
@endsection
