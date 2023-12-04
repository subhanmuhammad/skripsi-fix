@extends('layout.index')

@section('content')
    <div class="row p-3">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon-big text-center">
                                <i class="fa-solid fa-users"></i>
                            </div>
                        </div>
                        <div class="col-9 col-stats">
                            <div class="numbers">
                                <p class="card-category">Pendaftar</p>
                                <h4 class="card-title">{{ $pendaftar }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                {{-- <i class="flaticon-coins text-success"></i> --}}
                                <i class="fa-regular fa-circle-check"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Lulus</p>
                                <h4 class="card-title">
                                    {{ $hitung_lulus }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                {{-- <i class="flaticon-error text-danger"></i> --}}
                                <i class="fa-regular fa-circle-xmark"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Tidak Lulus</p>
                                <h4 class="card-title">{{ $hitung_tidak_lulus }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-twitter text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Akurasi</p>
                                <h4 class="card-title">{{ $akurasi }}%</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div>
                <img style="height: 500px" class="d-flex justify-content-center" src="{{ asset('assets/img/SUBAN.png') }}">
            </div>
        </div>
    </div>
@endsection
