<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>Hasil Tugas</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-scholar.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .result-wrapper {
      background: linear-gradient(135deg, #7c6fd6, #917dee);
      padding: 4rem 2rem;
      border-radius: 2rem;
      margin: 3rem auto;
      position: relative;
      overflow: hidden;
      max-width: 1000px;
    }

    .result-card {
      background-color: #f8f9fa;
      border-radius: 1rem;
      padding: 2.5rem;
      max-width: 900px;
      margin: 0 auto;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .result-card h3 {
      color: #2e7d32;
      font-weight: 700;
      font-size: 28px;
      margin-bottom: 1rem;
    }

    .result-card p {
      font-size: 18px;
      color: #333;
      margin-bottom: 1.5rem;
    }

    .result-button a {
      display: inline-block;
      background-color: #ede9fe;
      color: #6b46c1;
      padding: 0.75rem 1.5rem;
      border-radius: 2rem;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      font-size: 16px;
    }

    .result-button a:hover {
      background-color: #dcd4ff;
      color: #4c1d95;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="result-wrapper">

  <div class="result-card text-center">
    <h3>Hasil Quiz</h3>
@isset($nilai)
  <p>Nilai Anda: <strong>{{ $nilai }}</strong></p>
@endisset
<div class="result-button">
            <a href="{{ route('user.quiz.index') }}">Kembali</a>
          </div>
  </div>



    </div>
  </div>

  @include('layouts.component-frontend.footer')

  <!-- Scripts -->
  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/counter.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
</body>
</html>