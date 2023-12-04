@extends('layout.index')

@section('content')
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-profile">
                        <div class="clearfix">
                            <!-- LEFT COLUMN -->
                            <div class="profile-left ml-5">
                                <!-- PROFILE HEADER -->
                                <div class="profile-header">
                                    <div class="overlay"></div>
                                    <div class="profile-main">
                                        <img src="{{ asset('admin/img/user-medium.png') }}" class="img-circlem ml-auto"
                                            alt="Avatar">
                                        <h4 class="name mt-2">{{ $data->nama }}</h4>
                                        <hr>
                                    </div>
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
                                            <li>JENIS KELAMIN : <span>{{ $data->gender }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- END PROFILE DETAIL -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg">
                    <form action="/update/data_testing/{{ $data->id }}" method="post">
                        @csrf
                        @method('put')
                        {{-- <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Jenis kelamin</label>
                                <input type="text" class="form-control" id="jenis_kelamin" placeholder="jenis kelamin"
                                    name="jenis_kelamin" value="{{ $data->jenis_kelamin }}">
                            </div>
                        </div> --}}
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Nilai B.Indonesia</label>
                                <input type="text" class="form-control" id="b_indo" name="b_indo"
                                    value="{{ $data->b_indo }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Nilai B.Ingris</label>
                                <input type="text" class="form-control" id="b_ingris" name="b_ingris"
                                    value="{{ $data->b_ingris }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Nilai Matematika</label>
                                <input type="text" class="form-control" id="mtk" name="mtk"
                                    value="{{ $data->mtk }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Nilai IPA</label>
                                <input type="text" class="form-control" id="mtk" name="ipa"
                                    value="{{ $data->ipa }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3 mt-3">Edit Data</button>
                        <a href="/data-testing" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    @endsection
