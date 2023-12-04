@extends('layout.index')
@section('content-header')
    <h4 class="title"> Halo ini data training</h4>
@endsection
@section('content')
    <div class="card-body">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        {{-- <form action="{{ route('import_excel') }}" method="POST" enctype="multipart/form-data" class=" mb-1 d-inline">
            @csrf
            <div class="input-group">
                <input type="file" name="file" class="form-control">
                <button class="fa-plus btn btn-primary d-inline">Import</button>
            </div>
        </form> --}}

        <div class="title ml-2">
            <a href="/tambah-data-training" class="fa-plus btn btn-danger mb-1 mt-2">Tambah Data</a>
        </div>

        <table id="example" class="table table-striped" style="width:100% mt-2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor induk</th>
                    <th>Alamat</th>
                    <th>Jenis kelamin</th>
                    <th>Nilai B.indonesia</th>
                    <th>Nilai B.Ingris</th>
                    <th>Nilai Matematika</th>
                    <th>Nilai ipa</th>
                    <th>Ket Klasifikasi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($data as $item)
                        <input type="hidden" class="delete_id" value="{{ $item->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->b_indo }}</td>
                        <td>{{ $item->b_ingris }}</td>
                        <td>{{ $item->mtk }}</td>
                        <td>{{ $item->ipa }}</td>
                        <td>{{ $item->ket_klasifikasi }}</td>
                        <td>

                            <a href="/edit_data_training/{{ $item->id }}" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <form action="{{ route('delete', $item->id) }} " method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm delete" data-id="{{ $item->id }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
