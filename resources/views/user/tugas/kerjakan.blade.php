
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
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-scholar.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css')}}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css')}}"/>
<style>
    body {
        background-color: #f3e8ff; /* Ungu muda */
    }
    .container {
        background-color: #f3e5f5 !important; /* Ungu muda */
        padding: 20px;
        border-radius: 10px;
    }
</style>
<body>

    <div class="container py-4">
        <h2 class="mb-4 text-center">Mengerjakan: <strong>{{ $tugas->judul }}</strong></h2>
        
        <form method="POST" action="{{ route('user.tugasSubmit', $tugas->id) }}">
            @csrf
            
            @foreach ($tugas->soal as $soal)
            <div class="card mb-4 shadow-sm border-primary">
                <div class="card-body">
                <h5 class="card-title">Soal {{ $loop->iteration }}</h5>
                <p class="card-text">{{ $soal->pertanyaan }}</p>

                @foreach (['A', 'B', 'C', 'D'] as $opt)
                <div class="form-check">
                    <input 
                    class="form-check-input" 
                            type="radio" 
                            name="jawaban[{{ $soal->id }}]" 
                            value="{{ $opt }}" 
                            id="soal{{ $soal->id }}_{{ $opt }}" 
                            required
                            >
                            <label class="form-check-label" for="soal{{ $soal->id }}_{{ $opt }}">
                                {{ $opt }}. {{ $soal->{'pilihan_' . strtolower($opt)} }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
        @endforeach
        
        <div class="text-center">
            <button type="submit" class="btn btn-success px-5">Selesai</button>
        </div>
    </form>
</div>
</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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