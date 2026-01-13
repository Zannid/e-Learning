

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.svg')}}" type="image/x-icon" />
    <title>PlainAdmin Demo | Bootstrap 5 Admin Template</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/lineicons.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/main.css')}}" />
      @yield('styles')
  </head>
  <body>

              <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-15">
                  <a href="{{route('welcome')}}" id="menu-toggle" class="main-btn primary-btn btn-hover">
                    <i class="lni lni-chevron-left me-2"></i> Kembali
                    </a>
                </div>
                <div class="header-search d-none d-md-flex">
                  <form action="#">
                    <input type="text" placeholder="Search..." />
                    <button><i class="lni lni-search-alt"></i></button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                <!-- notification start -->
                
                <!-- notification end -->
                <!-- message start -->
                
                <!-- message end -->
                <!-- profile start -->
                <div class="profile-box ml-15">
                  <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="profile-info">
                      <div class="info">
                        <div class="image">
                          <img src="{{ Auth::User()->foto}}" alt="" />
                        </div>
                        <div>
                          <h6 class="fw-500">{{ Auth::User()->name}}</h6>
                          <p>{{ Auth::User()->role}}</p>
                        </div>
                      </div>
                    </div>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                    <li>
                      <div class="author-info flex items-center !p-1">
                        <div class="image">
                          <img src="{{ Auth::User()->foto}}" alt="image">
                        </div>
                        <div class="content">
                          <h4 class="text-sm">{{ Auth::User()->name}}</h4>
                          <a class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs" href="#">{{ Auth::User()->email}}</a>
                        </div>
                      </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="{{ route('profile', Auth::user()->id) }}">
                        <i class="lni lni-user"></i> View Profile
                      </a>
                    </li>

                    <li class="divider"></li>
                    <li>
                      <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="lni lni-exit"></i> Sign Out </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> 
                    </li>
                  </ul>
                </div>
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>
      <section class="profile-section py-5">
          <div class="container">
        <!-- Judul & Breadcrumb -->

            <center><h2 class="fw-bold">Profil Pengguna</h2></center>
            

        
        <!-- Kartu Profil -->
        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <div class="card border-0 shadow rounded-4 p-4 text-center bg-white">
                    <!-- Foto Profil -->
                     <center>
                    <img src="{{ asset('backend/assets/images/profile/profile-image.png') }}"
                         alt="Foto Profil"
                         class="rounded-circle shadow-sm mb-3"
                         style="width: 130px; height: 130px; object-fit: cover; border: 3px solid #365CF5;">
</center>
<!-- Info Profil -->
                    <h4 class="fw-semibold">{{ $user->name }}</h4>
                    <p class="text-muted mb-2">{{ $user->email }}</p>

                    <div class="row justify-content-center text-start mt-4">
                        <div class="col-md-6">
                            <p><strong>Kelas:</strong> {{ $user->kelas->kelas ?? '-' }}</p>
                            <p><strong>Status:</strong> <span class="badge bg-primary text-white">{{ ucfirst($user->role) }}</span></p>
                        </div>
                    </div>

                    <!-- Logout Button -->
                    <div class="mt-4">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="btn btn-danger btn-sm rounded-pill px-4">
                            <i class="lni lni-exit"></i> Keluar
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/Chart.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/dynamic-pie-chart.js')}}"></script>
    <script src="{{ asset('backend/assets/js/moment.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/fullcalendar.js')}}"></script>
    <script src="{{ asset('backend/assets/js/jvectormap.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/world-merc.js')}}"></script>
    <script src="{{ asset('backend/assets/js/polyfill.js')}}"></script>
    <script src="{{ asset('backend/assets/js/main.js')}}"></script>
</body>
