<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Scholar - Online School HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-scholar.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css')}}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css')}}"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

<style>
  /* Navbar */
  .navbar-custom {
    background: linear-gradient(135deg, #7e5bef, #a779e9);
    border-radius: 0 0 25px 25px;
    box-shadow: 0 4px 15px rgba(126, 91, 239, 0.25);
  }

  .navbar-custom {
  margin-bottom: 0; /* default */
}


  .search-box {
    background-color: rgba(255, 255, 255, 0.15);
    border-radius: 50px;
    padding: 5px 15px;
    display: flex;
    align-items: center;
    backdrop-filter: blur(5px);
  }

  .search-box input {
    border: none;
    background: transparent;
    outline: none;
    color: white;
    width: 150px;
    margin-left: 8px;
  }

  .search-box input::placeholder {
    color: rgba(255, 255, 255, 0.7);
  }

  .nav-link {
    font-weight: 500;
    color: white !important;
    transition: 0.2s;
  }

  .nav-link:hover {
    color: #ffe8f8 !important;
  }

  /* Main Section */
.services.section {
  padding-top: 40px !important; /* dari 100px jadi 40px */
  min-height: auto; /* hilangkan tinggi minimum */
  background: linear-gradient(120deg, #f8f5ff, #ffffff);
  display: flex;
  align-items: center;
}


  .form-card {
    background: #ffffff;
    padding: 40px 30px;
    border-radius: 20px;
    box-shadow: 0 12px 30px rgba(126, 91, 239, 0.15);
    text-align: center;
    transition: 0.3s;
  }

  .form-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 16px 40px rgba(126, 91, 239, 0.25);
  }

  .form-card h4 {
    font-weight: 700;
    color: #7e5bef;
    margin-bottom: 25px;
  }

  .form-card input.form-control {
    border-radius: 12px;
    border: 2px solid #d4c8ff;
    padding: 14px;
    font-size: 16px;
    transition: 0.2s;
  }

  .form-card input:focus {
    border-color: #a779e9;
    box-shadow: 0 0 0 3px rgba(167, 121, 233, 0.2);
  }

  .main-button button {
    margin-top: 20px;
    background: linear-gradient(135deg, #7e5bef, #a779e9);
    color: white;
    border: none;
    padding: 12px 32px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 16px;
    transition: 0.3s ease;
  }

  .main-button button:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 25px rgba(126, 91, 239, 0.3);
  }

  @media (max-width: 768px) {
    .search-box input {
      width: 100px;
    }

    .nav-link {
      font-size: 14px;
    }
  }
</style>


    <!-- NAVBAR -->
<!-- NAVBAR -->
<nav class="navbar-custom">
  <div class="container d-flex justify-content-between align-items-center py-3">
    <div class="d-flex align-items-center gap-3">
      <h3 class="text-white mb-0">SCHOLAR</h3>
      <div class="search-box">
        <i class="fas fa-search text-white"></i>
        <input type="text" placeholder="Cari quiz...">
      </div>
    </div>
    <ul class="nav gap-3">
      <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Quiz</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Materi</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
      <li class="nav-item"><a class="nav-link fw-semibold" href="#">Register</a></li>
    </ul>
  </div>
</nav>

<!-- MAIN SECTION -->
<div class="services section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="form-card">
          <form method="POST" action="{{ route('periksaKode') }}" id="periksaForm">
            @csrf
            <h4><i class="fas fa-key me-2"></i>Masukkan Kode Quiz</h4>
            <input name="kode" type="text" class="form-control" required placeholder="Contoh: ABC123">
            <div class="main-button">
              <button type="submit"><i class="fas fa-check-circle me-2"></i>Periksa Kode</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

        
          <!-- <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <div class="icon">
                <img src="{{ asset('frontend/assets/images/service-02.png')}}" alt="short courses">
              </div>
              <div class="main-content">
                <h4>Short Courses</h4>
                <p>You can browse free templates based on different tags such as digital marketing, etc.</p>
                <div class="main-button">
                  <a href="#">Read More</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <div class="icon">
                <img src="{{ asset('frontend/assets/images/service-03.png')}}" alt="web experts">
              </div>
              <div class="main-content">
                <h4>Web Experts</h4>
                <p>You can start learning HTML CSS by modifying free templates from our website too.</p>
                <div class="main-button">
                  <a href="#">Read More</a>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>

 

 

@include('layouts.component-frontend.footer')

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/isotope.min.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/owl-carousel.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/counter.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/custom.js')}}"></script>

  <!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>