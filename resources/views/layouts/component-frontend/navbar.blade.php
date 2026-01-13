  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <h1>eSA</h1>
                        
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Serach Start ***** -->
                   
                    <!-- ***** Serach Start ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li class="scroll-to-section"><a href="{{ route('home')}}" class="active">Home</a></li>
                      <li class="scroll-to-section"><a href="#courses">Materi</a></li>
                      @if(Auth::check() && (Auth::user()->role === 'siswa'))
                      <li class="scroll-to-section"><a href="{{ route('user.quizz')}}">Quiz</a></li>
                      <li class="scroll-to-section"><a href="{{ route('user.tugas.index')}}">Tugas</a></li>
                      @endif
                      @if(Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'guru'))
                      <li class="scroll-to-section"><a href="{{ route('home')}}">Dashboard</a></li>
                      @endif

                      <li>
                              @if (Auth::check())
                                  <a href="{{ route('profile', Auth::user()->id) }}"><img
                                          src="{{ asset('backend/assets/images/profile/profile-image.png') }}"
                                          alt="image" style="width: 40px"></a>
                              @else
                                  <a href="{{ route('login') }}">Login</a>
                              @endif
                          </li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
