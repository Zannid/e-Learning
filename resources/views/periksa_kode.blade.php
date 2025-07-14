<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>Validasi Quiz</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-scholar.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .quiz-wrapper {
      background: linear-gradient(135deg, #7c6fd6, #917dee);
      padding: 4rem 2rem;
      border-radius: 2rem;
      margin: 3rem auto;
      max-width: 1000px;
      position: relative;
    }

    .quiz-card {
      background-color: #f8f9fa;
      border-radius: 1rem;
      padding: 2.5rem;
      max-width: 900px;
      margin: 0 auto;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .alert-success,
    .alert-danger {
      padding: 1.25rem 1.5rem;
      border-radius: 0.5rem;
      font-weight: 500;
      font-size: 16px;
    }

    .main-button a {
      display: inline-block;
      background-color: #ede9fe;
      color: #6b46c1;
      border-radius: 2rem;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      margin-right: 1rem;
      font-size: 16px;
    }

    .main-button a:hover {
      background-color: #dcd4ff;
      color: #4c1d95;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="quiz-wrapper">
      <div class="quiz-card text-start">
        @isset($quiz)
          <div class="alert alert-success">
            <strong>Quiz berhasil ditemukan!</strong><br>
            Judul: {{ $quiz->judul }}<br>
            Waktu: {{ $quiz->durasi }} menit<br>
            Batas Waktu: {{ \Carbon\Carbon::parse($quiz->tenggat_waktu)->translatedFormat('d F Y H:i') }}
          </div>
          <div class="main-button">
            <div class="main-button">
                @if(now()->gt($quiz->tenggat_waktu))
                  <span class="badge bg-danger">Tenggat Berakhir</span>
                @else
                  <a href="{{ route('user.quiz.kerjakan', $quiz->id) }}" class="btn btn-primary">Kerjakan</a>
                @endif
            <a href="{{ route('quizz') }}">Kembali</a>
          </div>
        @else
          <div class="alert alert-danger">
            <strong>Kode quiz tidak ditemukan. Silakan coba lagi!</strong>
          </div>
          <div class="main-button">
            <a href="{{ route('quizz') }}">Kembali</a>
          </div>
        @endisset
      </div>
    </div>
  </div>

  @include('layouts.component-frontend.footer')

  <!-- Scripts -->
  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/isotope.min.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/owl-carousel.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/counter.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/custom.js')}}"></script>

</body>
</html>