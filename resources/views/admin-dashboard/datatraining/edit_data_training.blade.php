@extends('layout.index')

@section('content')
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-profile">
                        <div class="clearfix">
                            <!-- LEFT COLUMN -->
                            <div class="profile-left">
                                <!-- PROFILE HEADER -->
                                <div class="profile-header">

                                    <div class="profile-main d-flex justify-content-center">
                                        {{-- <img src="{{ asset('admin/img/user-medium.png') }}" class="img-circlem ml-auto "
                                            alt="Avatar"> --}}
                                        <img src="{{ asset('/storage/profil/user-medium.png') }}" class="img-circle ml-auto"
                                            alt="avatar">
                                    </div>
                                    <h4 class="name mt-2">{{ $data->nama }}</h4>
                                    <hr>
                                    <div class="profile-stat">

                                    </div>
                                </div>
                                <!-- END PROFILE HEADER -->

                                <!-- PROFILE DETAIL -->
                                <div class="profile-detail">
                                    <div class="profile-info">
                                        <ul class="list-unstyled list-justify">
                                            <li>NIM : <span>{{ $data->nis }}</span></li>
                                            <li>ALAMAT : <span>{{ $data->alamat }}</span></li>
                                            <li>Tempat Lahir : <span>{{ $data->tempat_lahir }}</span></li>
                                            <li>Tanggal Lahir : <span>{{ $data->tanggal_lahir }}</span></li>
                                            <li>Agama : <span>{{ $data->agama }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- END PROFILE DETAIL -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg">
                    <form action="/update/data_training/{{ $data->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-lg">
                            <div class="mb-3">
                                <label class="form-label">Nilai B.Indonesia</label>
                                <input type="text" class="form-control" name="b_indo" value="{{ $data->b_indo }}">
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="mb-3">
                                <label class="form-label">Nilai B.Ingris</label>
                                <input type="text" class="form-control" name="b_ingris" value="{{ $data->b_ingris }}">
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="mb-3">
                                <label class="form-label">Nilai Matematika</label>
                                <input type="text" class="form-control" name="mtk" value="{{ $data->mtk }}">
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="mb-3">
                                <label class="form-label">Nilai IPA</label>
                                <input type="text" class="form-control" name="ipa" value="{{ $data->ipa }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3 mt-3">Edit Data</button>
                        <a href="/data-training" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    @endsection
