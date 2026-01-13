<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('assets/images/logos/esa.png') }}" rel="stylesheet">

    <title>ESA E-Learning SMK Assalaam</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-scholar.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css')}}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css')}}"/>
    <style>
      .materi-image {
  width: 100%;
  height: 300px; /* atau 180px sesuai kebutuhan */
  object-fit: cover;
  border-radius: 16px;
}
.team-scroll-container {
  position: relative;
  overflow: hidden;
}

.team-wrapper {
  display: flex;
  gap: 30px;
  transition: transform 0.3s ease;
  padding: 110px 0;
}

.team-member {
  flex: 0 0 calc(25% - 22.5px);
  min-width: 280px;
}

.scroll-button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(0, 123, 255, 0.9);
  color: white;
  border: none;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  cursor: pointer;
  font-size: 1.2rem;
  z-index: 10;
  transition: all 0.3s ease;
}

.scroll-button.prev { left: 10px; }
.scroll-button.next { right: 10px; }
.scroll-button:hover {
  background: rgba(0, 123, 255, 1);
  transform: translateY(-50%) scale(1.1);
}


    </style>
<!--

TemplateMo 586 Scholar

https://templatemo.com/tm-586-scholar

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
@include('layouts.component-frontend.navbar')
  <!-- ***** Header Area End ***** -->

    <div class="main-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-banner">
                        <div class="item item-1">
                            <div class="header-text">
                                <span class="category">ESA</span>
                                <h2>Website E-Learning Untuk SMK Assalaam </h2>
                                <p>Digunakan Ketika Pembelajaran online atau daring untuk keperluan SMK Assalaam</p>
                                <div class="buttons">
                                </div>
                            </div>
                        </div>
                        <div class="item item-2">
                            <div class="header-text">
                                <span class="category">Terbaik untuk Anda</span>
                                <h2>Belajar kapan saja,dan raih sukses.</h2>
                                <p>Belajar dengan mudah di mana saja dengan menggunakan website</p>
                                <div class="buttons">
                                </div>
                            </div>
                        </div>
                        <div class="item item-3">
                            <div class="header-text">
                                <span class="category">E-Learning</span>
                                <h2>Website Online E-Learning</h2>
                                <p>Siap Membantu Anda Dalam Hal Pembelajaran Daring atau Online</p>
                                <div class="buttons">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



   <div class="section about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-1">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Di mana saya bisa mulai belajar?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Kami sarankan Anda memulai dari materi dasar yang tersedia di dashboard. Ikuti alur
                                    belajar sesuai kelas atau bidang yang Anda minati.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Bagaimana cara belajar secara kolaboratif?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Kami menyediakan fitur kelas virtual dan forum diskusi. Anda bisa belajar bersama
                                    teman sekelas dan berdiskusi langsung dengan pengajar.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Kenapa eLearning kami berbeda?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Karena kami tidak hanya menyajikan materi, tapi juga pengalaman belajar interaktif,
                                    nilai otomatis, dan pemantauan progres secara real-time.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Apakah saya mendapatkan bimbingan langsung?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Ya! Tim pengajar kami siap membimbing Anda lewat tugas, hingga sesi quiz online.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <div class="section-heading">
                        <h6>Tentang Kami</h6>
                        <h2> Mengapa Kami Menjadi Pilihan Terbaik untuk Belajar Online?</h2>
                        <p>Platform eLearning SMK Assalam dirancang khusus untuk membantu siswa dan guru dalam proses
                            belajar mengajar yang lebih efektif, fleksibel, dan menyenangkan.

                            Dengan antarmuka yang ramah pengguna, materi yang terstruktur, serta fitur evaluasi
                            otomatis, kami menghadirkan pengalaman belajar digital yang mendukung semua kebutuhan
                            akademik Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <section class="section courses" id="courses" >
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>Latest Courses</h6>
            <h2>Latest Courses</h2>
          </div>
        </div>
      </div>
      <ul class="event_filter">
        <li>
          <a href="{{ route('welcome')}}">Semua</a>
        </li>
    @foreach($kelas as $data)
    <li>
        <a class="filter-btn"  href="{{ route('welcome', ['search' => $data->id]) }}">{{$data->kelas}}</a>
    </li>
    @endforeach
</ul>

<div class="row event_box">
    @foreach($materi as $data)
    <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design">
        <div class="events_item">
            <div class="thumb">
                <a href="{{ route('isi', $data->id) }}"><div class="card">
                  @if($data->foto)
                  <img src="{{ asset('/storage/materi/' . $data->foto) }}" class="materi-image" alt="{{ $data->judul }}">
                  @else
                  <br><br><br><br><br><br>
                  <center>
                    <span>Tidak ada Foto</span>
                  </center>
                  <br><br><br><br>
                  <br>
                  @endif
                </div></a>
                <span class="category">
                    {{ $data->mapel->nama_mapel }}
                </span>
            </div>
            <div class="down-content">
                <span class="author">
                    {{ $data->kelas->kelas }}
                </span>
                <h4>{{ $data->judul }}</h4>
            </div>
        </div>
    </div>
    @endforeach
</div>
      </div>
    </div>
  </section>

  <div class="section fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="{{ \App\Models\Materi::count() }}" data-speed="1000"></h2>
                   <p class="count-text ">Materi</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="{{ \App\Models\User::count() }}" data-speed="1000"></h2>
                  <p class="count-text ">Pengguna</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="{{ \App\Models\Tugas::count() }}" data-speed="1000"></h2>
                  <p class="count-text ">Penugasan</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter end">
                  <h2 class="timer count-title count-number" data-to="{{ \App\Models\Quiz::count() }}" data-speed="1000"></h2>
                  <p class="count-text ">Quiz</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="team section" id="team">
  <div class="container">
    <div class="section-title">
      <h2>Pengajar SMK Assalaam</h2>
      <p></p>
    </div>
    
    <div class="team-scroll-container">
      <button class="scroll-button prev" onclick="scrollTeam(-1)">
        <i class="fas fa-chevron-left"></i>
      </button>
      
      <div class="team-wrapper" id="teamWrapper">
       @foreach( $guru as $data)
<div class="team-member">
  <div class="main-content">
    <div class="img-container">
      <img src="{{ asset('storage/guru/' . $data->foto) }}" alt="{{ $data->name }}">
    </div>
    <span class="category">Guru</span>
    <h4>{{ $data->name }}</h4>
    <ul class="social-icons">
      <li><a href="#"><i class="fab fa-facebook"></i></a></li>
      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
      <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
    </ul>
  </div>
</div>
@endforeach
      </div>
      
      <button class="scroll-button next" onclick="scrollTeam(1)">
        <i class="fas fa-chevron-right"></i>
      </button>
    </div>
  </div>
</div>

      <div class="section testimonials">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="owl-carousel owl-testimonials">
                        <div class="item">
                            <p>“Alhamdulilah hari ini bisa Berkunjung ke SMK Assalaam Bandung Dengan Membawa anak-anak
                                smp dalam program
                                School pihak SMK.”</p>
                            <div class="author">
                                <img src="{{ asset('frontend/assets/images/testimonial-author.jpg') }}"
                                    alt="">
                                <span class="category">Guru</span>
                                <h4>Annisa Rizqia</h4>
                            </div>
                        </div>
                        <div class="item">
                            <p>“Sekolah Berkualitas dengan karakter islami,sarana prasana lengkap juga mutakir, tentunya
                                program
                                pembelajaran saat yang efektif dan bagus.”
                            </p>
                            <div class="author">
                                <img src="{{ asset('frontend/assets/images/testimonial-author.jpg') }}"
                                    alt="">
                                <span class="category">Orang Tua Siswa</span>
                                <h4>agan agan</h4>
                            </div>
                        </div>
                        <div class="item">
                            <p>“Alhamdulilah saya tidak salah memilih sekolah untuk putra saya,dengan lingkungan sekolah
                                yang baik,
                                guru guru yang berkualitas dan memliki pengalaman dan disiplin yang tinggi.”</p>
                            <div class="author">
                                <img src="{{ asset('frontend/assets/images/testimonial-author.jpg') }}"
                                    alt="">
                                <span class="category">Orang Tua Siswa</span>
                                <h4>Muhammad Alham</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <div class="section-heading">
                        <h6>Tanggapan</h6>
                        <h2>Apa Yang Mereka Bilang?</h2>
                        <p>Kamu Bisa Merasakannya Sendiri dengan Langsung Mencobanya</p>
                    </div>
                </div>
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
    <script>
        let currentPosition = 0;
        const teamWrapper = document.getElementById('teamWrapper');
        const teamMembers = document.querySelectorAll('.team-member');
        const itemWidth = 310; // 280px width + 30px gap
        const visibleItems = 4;
        const totalItems = teamMembers.length;
        const maxPosition = Math.max(0, totalItems - visibleItems);

        function updateButtons() {
            const prevBtn = document.querySelector('.scroll-button.prev');
            const nextBtn = document.querySelector('.scroll-button.next');
            
            prevBtn.disabled = currentPosition <= 0;
            nextBtn.disabled = currentPosition >= maxPosition;
            
            // Hide buttons if all items fit in view
            if (totalItems <= visibleItems) {
                prevBtn.style.display = 'none';
                nextBtn.style.display = 'none';
            }
        }

        function scrollTeam(direction) {
            const newPosition = currentPosition + direction;
            
            if (newPosition >= 0 && newPosition <= maxPosition) {
                currentPosition = newPosition;
                const translateX = -currentPosition * itemWidth;
                teamWrapper.style.transform = `translateX(${translateX}px)`;
                updateButtons();
            }
        }

        // Initialize
        updateButtons();

        // Touch/swipe support for mobile
        let startX = 0;
        let currentX = 0;
        let isDragging = false;

        teamWrapper.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            isDragging = true;
        });

        teamWrapper.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            currentX = e.touches[0].clientX;
            e.preventDefault();
        });

        teamWrapper.addEventListener('touchend', (e) => {
            if (!isDragging) return;
            isDragging = false;
            
            const diffX = startX - currentX;
            const threshold = 50;
            
            if (Math.abs(diffX) > threshold) {
                if (diffX > 0 && currentPosition < maxPosition) {
                    scrollTeam(1);
                } else if (diffX < 0 && currentPosition > 0) {
                    scrollTeam(-1);
                }
            }
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                scrollTeam(-1);
            } else if (e.key === 'ArrowRight') {
                scrollTeam(1);
            }
        });

        // Auto-scroll functionality (optional)
        let autoScrollInterval;
        
        function startAutoScroll() {
            autoScrollInterval = setInterval(() => {
                if (currentPosition >= maxPosition) {
                    currentPosition = -1; // Reset to beginning
                }
                scrollTeam(1);
            }, 5000); // Change slide every 5 seconds
        }

        function stopAutoScroll() {
            clearInterval(autoScrollInterval);
        }

        // Uncomment the following lines if you want auto-scroll
        // startAutoScroll();
        // teamWrapper.addEventListener('mouseenter', stopAutoScroll);
        // teamWrapper.addEventListener('mouseleave', startAutoScroll);
    </script>
</body>
</html>