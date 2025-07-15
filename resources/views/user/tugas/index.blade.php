<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title>Scholar - Online School HTML5 Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-scholar.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

  <!-- Tambahkan CSS langsung -->
  <style>
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
      <h3 class="text-white fw-bold mb-0">SCHOLAR</h3>
      <div class="search-box">
        <input type="text" placeholder="Type Something" />
        <i class="fas fa-search text-white ms-2"></i>
      </div>
    </div>

    <!-- Menu -->
    <ul class="nav gap-4">
      <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Quiz</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Materi</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Team</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
      <li class="nav-item"><a class="nav-link fw-semibold" href="#">Register Now!</a></li>
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
<div class="container">
  <div class="services section" id="services">
    <div class="container">
      <div class="row justify-content-center">
        @foreach ($tugas as $item)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="service-item">
            <div class="main-content">
              <h4>{{ $item->judul }}</h4>
              <p>{{ $item->mapel->nama_mapel }}</p>
              <p>{{ $item->tenggat_waktu->format('d M Y H:i') }}</p>
              <div class="main-button">
                @if(\Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($item->tenggat_waktu)))
    <span class="badge bg-danger">Tenggat Berakhir</span>
@else
    <a href="{{ route('user.tugas.kerjakan', $item->id) }}" class="btn btn-primary">Kerjakan</a>
@endif

              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

<!-- Script -->
<script src="{{ asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/isotope.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/owl-carousel.js')}}"></script>
<script src="{{ asset('frontend/assets/js/counter.js')}}"></script>
<script src="{{ asset('frontend/assets/js/custom.js')}}"></script>

</body>
</html>
