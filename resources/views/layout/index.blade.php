<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-DAFTAR &mdash; Subhan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/perfect-scrollbar/css/perfect-scrollbar.css') }}">

    <script src="{{ asset('/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['../assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS for this page only -->
    <link rel="stylesheet" href="{{ asset('/vendor/chart.js/dist/Chart.min.css') }}">
    <!-- End CSS  -->

    <link rel="stylesheet" href="{{ asset('/assets/css/style.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap-override.min.css') }} ">
    <link rel="stylesheet" id="theme-color" href="{{ asset('/assets/css/dark.min.css') }}">

    {{-- data tables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
</head>

<body>



    <div id="app">
        <div class="shadow-header"></div>
        <header class="header-navbar fixed">
            <div class="toggle-mobile action-toggle"><i class="fas fa-bars"></i></div>
            <div class="header-wrapper">
                <div class="header-left">
                    <div class="theme-switch-icon"></div>
                </div>
                <div class="header-content">
                    <form method="get" action="{{ route('logout') }}">
                        @csrf
                        <div class="dropdown dropdown-menu-end">
                            <a href="#" class="user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="label">
                                    <span></span>
                                    <div>{{ auth()->user()->name }}</div>
                                </div>
                                <img class="img-user" src="../assets/images/avatar1.png" alt="user"srcset="">
                            </a>


                            <ul class="dropdown-menu small">
                                <li class="menu-content ps-menu">
                                    <button type="submit" class="dropdown-item">
                                        <div class="description">
                                            <i class="ti-power-off"></i> Logout
                                        </div>
                                    </button>
                                </li>
                            </ul>

                        </div>
                    </form>
                </div>
            </div>
        </header>
        <nav class="main-sidebar ps-menu">
            <div class="sidebar-toggle action-toggle">
                <a href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
            <div class="sidebar-opener action-toggle">
                <a href="#">
                    <i class="ti-angle-right"></i>
                </a>
            </div>
            <div class="sidebar-header">
                <div class="image">
                    <img style="height: 80px" src="{{ asset('assets/img/tutwuri.png') }}">

                </div>
                <strong>
                    SMP 2 BANAWA Kab.Donggala
                </strong>

                {{-- <div class="close-sidebar action-toggle">
                    <i class="ti-close">dsdsd</i>
                </div> --}}
            </div>
            <div class="sidebar-content">
                <ul>
                    <li class="{{ Request::is('/') ? 'active' : '' }}">
                        <a href="/" class="link ">
                            <i class="ti-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('data-training') ? 'active' : '' }}">
                        <a href="/data-training" class="link">
                            <i class="fa-solid fa-layer-group"></i>
                            <span>Data Training</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('data-testing') ? 'active' : '' }}">
                        <a href="/data-testing" class="link ">
                            <i class="fa-solid fa-layer-group"></i>
                            <span>Data Testing</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('pengujian') ? 'active' : '' }}">
                        <a href="/pengujian" class="link">
                            <i class="fa-brands fa-creative-commons-share"></i>
                            <span>Pengujian</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('akurasi') ? 'active' : '' }}">
                        <a href="/akurasi" class="link ">
                            <i class="fa-solid fa-calculator"></i>
                            <span>Performa</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="main-content">
            <div class="card">

                <div class="card-header">
                    @yield('conten-header')
                </div>
                @yield('content')
            </div>
        </div>
        {{-- <section class="content">

            </section> --}}
    </div>

    <div class="settings">
        <div class="settings-icon-wrapper">
            <div class="settings-icon">
                <i class="ti ti-settings"></i>
            </div>
        </div>
        <div class="settings-content">
            <ul>
                <li>
                    <div class="theme-switch mt-5">
                        <label for="">Theme Color</label>
                        <div>
                            <div class="form-check form-check-inline lg">
                                <input class="form-check-input lg theme-color" type="radio" name="ThemeColor"
                                    id="light" value="light">
                                <label class="form-check-label" for="light">Light</label>
                            </div>
                            <div class="form-check form-check-inline lg">
                                <input class="form-check-input lg theme-color" type="radio" name="ThemeColor"
                                    id="dark" value="dark">
                                <label class="form-check-label" for="dark">Dark</label>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="fix-footer-wrapper">
                        <div class="form-check form-switch lg">
                            <label class="form-check-label" for="settingsFixFooter">Collapse Sidebar</label>
                            <input class="form-check-input toggle-settings" name="Sidebar" type="checkbox"
                                id="settingsFixFooter">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <footer>
        Copyright © 2022 &nbsp <a href="https://www.youtube.com/c/mulaidarinull" target="_blank" class="ml-1">
            Mulai Dari Null </a> <span> . All rights Reserved</span>
    </footer>
    <div class="overlay action-toggle">
    </div>
    </div>
    <script src="{{ asset('/vendor/bootstrap/dist/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('/vendor/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>

    <!-- js for this page only -->
    <script src="{{ asset('/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('/assets/js/page/index.js') }}"></script>
    <!-- ======= -->
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    <script>
        Main.init()
    </script>
    <script src="{{ asset('/assets/js/plugin/chart.js/chart.min.js') }}"></script>

    {{-- script datatables --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://kit.fontawesome.com/aa01d4a104.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




</body>
<script>
    // swal({
    //         title: "Are you sure?",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //     })
    //     .then((willDelete) => {
    //         if (willDelete) {
    //             swal("data berhasil dihapus", {
    //                 icon: "success",
    //             });
    //         } else {
    //             swal("Data gagal dihapus");
    //         }
    //     });
</script>

</html>
