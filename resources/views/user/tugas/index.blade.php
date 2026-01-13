<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>ESA E-Learning</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-scholar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- Tambahkan CSS langsung -->
    <style>
        .circle-icon {
            background-color: #8c6be6;
            /* Warna ungu */
            width: 120px;
            height: 120px;
            border-radius: 50%;
            /* Membuat bentuk lingkaran */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .circle-icon img {
            width: 50px;
            /* Ukuran ikon */
            height: auto;
            filter: brightness(0) invert(1);
            transition: transform 0.3s ease;
            /* Agar ikon SVG PNG hitam jadi putih */
        }

        .navbar-custom {
            background-color: #7669ecff;
            border-bottom: 1px solid #5d459eff;
        }

        .search-box {
            background-color: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(4px);
            border-radius: 999px;
            padding-left: 1rem;
            padding-right: 1rem;
            height: 38px;
            display: flex;
            align-items: center;
        }

        .search-box input {
            color: white;
            background: transparent;
            border: none;
            outline: none;
        }

        .search-box input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .nav-link {
            font-weight: 500;
            font-size: 16px;
            color: white !important;
        }

        .services.section {
            margin-top: 0 !important;
            padding-top: 100px !important;
        }

        .main-banner {
            padding-bottom: 20px !important;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar-custom">
        <div class="container d-flex justify-content-between align-items-center py-3">
            <!-- Logo + Search -->
            <div class="d-flex align-items-center gap-3">
                <img src="{{ asset('backend/assets/images/logo/logo1.png') }}" alt="" style="width: 40px">
                <h1 class="text-white">Esa</h1>
            </div>

            <!-- Menu -->
            <ul class="nav gap-4">
                <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Kembali</a></li>

            </ul>
        </div>
    </nav>

    <!-- HEADER -->
    <div class="main-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="text-white">TUGAS</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- LIST TUGAS -->

    <div class="section events" id="events">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h2>Daftar Tugas</h2>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="item">
                        <div class="row">
                            @foreach ($tugas as $item)
                            <div class="col-lg-3">
                                <div class="circle-icon">
                                    <img src="{{asset('frontend/assets/images/service-02.png')}}" style="width: 80px" alt="short courses">
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <ul>
                                    <li>
                                        <span class="category">{{ $item->judul }}</span>
                                        <h4>{{ $item->mapel->nama_mapel }}</h4>
                                    </li>
                                    <li>
                                        <span>Date:</span>
                                        <h6>{{ $item->created_at->translatedFormat('d F Y') }}</h6>
                                    </li>
                                    <li>
                                        <span>Deaadline:</span>
                                        <h6>{{ $item->tenggat_waktu->format('d F Y') }}</h6>
                                    </li>
                                </ul>
                                <a href="{{ route('user.tugas.kerjakan', $item->id) }}"><i class="fa fa-angle-right"></i></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/counter.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>


</body>

</html>