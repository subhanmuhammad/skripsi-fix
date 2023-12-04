@extends('layout.index')
@section('content-header')
    <h4>halo ini pengujian</h4>
@endsection
@section('content')
    <div class="card-body">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="uji" class="btn btn-success btn-sm mb-2">
            <i class="">Klasifikasi</i>
        </a>
        <a href="/print" class="btn btn-danger btn-sm mb-2">
            <i class="fa-solid fa-print"></i>
        </a>
        <form class="row g-3" action="{{ route('filter_hasil_klasifikasi') }}" method="GET">
            <div class="col-auto">
                <input name="search" type="text" class="form-control" id="search"
                    placeholder="filter by hasil klasifikasi">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-outline-success mb-3">Search</button>
            </div>
        </form>
        <table id="example" class="table table-striped" style="width:100% mt-2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Nis</th>
                    <th>Agama</th>
                    <th>B.indonesia</th>
                    <th>B.Ingris</th>
                    <th>Matematika</th>
                    <th>IPA</th>
                    <th>Rata-rata</th>
                    <th>Keterangan</th>
                    <th>Hasil Klasifikasi</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($data as $item)
                        {{-- @dd($item->hasil_klasifikasi); --}}
                        <input type="hidden" class="delete_id" value="{{ $item->id }}">
                        <td>{{ $loop->iteration }}</td>

                        <td> {{ $item->nama }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->agama }}</td>
                        <td>{{ $item->b_indo }}</td>
                        <td>{{ $item->b_ingris }}</td>
                        <td>{{ $item->mtk }}</td>
                        <td>{{ $item->ipa }}</td>
                        <td>{{ $item->rata_rata }}</td>
                        {{-- keterangan --}}
                        @if ($item->ket_klasifikasi == 'LULUS')
                            <td>
                                <span class="badge text-bg-success">{{ $item->ket_klasifikasi }}</span>
                            </td>
                        @elseif($item->ket_klasifikasi == '')
                            <td>
                                <button type="button"
                                    class="btn btn-warning disable">{{ $item->ket_klasifikasi }}</button>
                            </td>
                        @else
                            <td>
                                <span class="badge text-bg-danger">{{ $item->ket_klasifikasi }}</span>
                            </td>
                        @endif

                        {{-- hasil klasifikasi --}}

                        @if ($item->hasil_klasifikasi == 'LULUS')
                            <td>
                                <span class="badge text-bg-success">{{ $item->hasil_klasifikasi }}</span>
                            </td>
                        @else
                            <td>
                                <span class="badge text-bg-danger">{{ $item->hasil_klasifikasi }}</span>
                            </td>
                        @endif
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
