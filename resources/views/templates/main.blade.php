<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('backend/assets/img/flags/id.png') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('backend/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: [{{ asset('backend/assets/css/fonts.min.css') }}],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/kaiadmin.min.css') }}" />
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fontawesome/css/all.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}" />
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar -->
        @auth
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="{{ route('dashboard') }}" class="logo">
                        <img src="{{ asset('backend/assets/img/flags/id.png') }}" alt="navbar brand" class="navbar-brand" height="20" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item active">
                            <a href="{{ route('dashboard') }}">
                                <i class="fas fa-home p-2 mb-1 fs-5"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Kelola Data</h4>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#base">
                                <i class="fas fa-layer-group p-2 mb-1 fs-5"></i>
                                <p>Data</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ route('item.index') }}">
                                            <span class="sub-item">Barang</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('student.index') }}">
                                            <span class="sub-item">Siswa</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('classroom.index') }}">
                                            <span class="sub-item">Kelas</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('borrow.index') }}">
                                <i class="fas fa-regular fa-clipboard p-2 mb-1 fs-5"></i>
                                <p>Peminjaman</p>
                            </a>
                            <a href="{{ route('user.index') }}">
                                <i class="fas fa-regular fa-clipboard p-2 mb-1 fs-5"></i>
                                <p>User</p>
                            </a>
                        </li>
                
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
        @endauth
        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="{{ asset('backend/assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand" class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="{{ asset('backend/assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>
                                        <span class="fw-bold">{{ auth()->user()->name }}</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img src="{{ asset('backend/assets/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded" />
                                                </div>
                                                <div class="u-text">
                                                    <h4>{{ auth()->user()->name }}</h4>
                                                    <p class="text-muted">{{ auth()->user()->email }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('auth.logout') }}" method="POST">
                                                @csrf
                                                <button class="dropdown-item">Logout</button>
                                            </form>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

            <!-- isi -->
            @yield('content')

            {{-- Komentar --}}
            <footer class="footer mt-4">
                <div class="container-fluid d-flex justify-content-between">
                    <div class="copyright">
                        2024, made with <i class="fa fa-heart heart text-danger"></i> by
                        <a href="https://www.instagram.com/glgdev">GlgDev</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</body>
<!--   Core JS Files   -->
<script src="{{ asset('backend/assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/core/bootstrap.min.js') }}"></script>
{{-- Fontawesome --}}
<script src="{{ asset('backend/assets/vendor/fontawesome/js/all.min.js') }}"></script>
<!-- jQuery Scrollbar -->
<script src="{{ asset('backend/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<!-- Chart JS -->
<script src="{{ asset('backend/assets/js/plugin/chart.js/chart.min.js') }}"></script>
<!-- jQuery Sparkline -->
<script src="{{ asset('backend/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
<!-- Chart Circle -->
<script src="{{ asset('backend/assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<!-- Datatables -->
<script src="{{ asset('backend/assets/js/plugin/datatables/datatables.min.js') }}"></script>
<!-- Bootstrap Notify -->
<script src="{{ asset('backend/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<!-- jQuery Vector Maps -->
<script src="{{ asset('backend/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/plugin/jsvectormap/world.js') }}"></script>
<!-- Sweet Alert -->
<script src="{{ asset('backend/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<!-- Kaiadmin JS -->
<script src="{{ asset('backend/assets/js/kaiadmin.min.js') }}"></script>
{{-- sweetalert --}}
<script src="{{ asset('backend/assets/js/sweetalert.min.js') }}"></script>

@if ($errors->any())
    <script>
        Swal.fire({
            position: "top",
            title: "Terjadi kesalahan, silakan coba lagi!",
            icon: "error",
            toast: true,
            showConfirmButton: false,
            timer: 2500,
        });
    </script>
@endif

@if (session('message'))
    <script>
        Swal.fire({
            position: "top",
            title: "{!! session('message') !!}",
            icon: "{!! session('type-message') !!}",
            showConfirmButton: false,
            toast: true,
            timer: 3000,
            timerProgressBar: true,
        });
    </script>
@endif

{{-- confirm deletion --}}
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>

@if (session('error-message'))
    <script>
        Swal.fire({
            position: "top-end",
            title: "{!! session('error-message') !!}",
            icon: "error",
            showConfirmButton: false,
            toast: true,
            timer: 3000,
            timerProgressBar: true,
        });
    </script>
@endif

</html>
