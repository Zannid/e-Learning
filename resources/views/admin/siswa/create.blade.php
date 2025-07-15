@extends('layouts.backend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-4">
                <div class="title">
                  <h2>Tambah Data siswa</h2>
                </div>
              </div>
              

        <div class="col-md-8 mt-4">
            <div class="card-style-2">

                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
               
                 <div class="card-body">
                  <form method="POST" action="{{ route('siswa.store') }}">
                    @csrf
                    <div class="row">
                      <div class="col-12 mt-2">
                        <div class="input-style-1">
                          <label>Nama</label>
                          <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" type="text" placeholder="Nama" />
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                      <div class="col-12 mt-2">
                        <div class="input-style-1">
                          <label>Email</label>
                          <input class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" placeholder="Email" />
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12 mt-2">
                        <div class="input-style-1">
                          <label>Password</label>
                          <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required />
                             @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                      <!-- end col -->
                      <!-- end col -->
                      <div class="col-12 mt-2">
                        <div class="input-style-1">
                          <label>Konfirm Password</label>
                           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>
                      </div><div class="col-12 mt-2">
  <div class="input-style-1">
    <label>Kelas</label>
    <select name="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror" required>
      <option disabled selected>-- Pilih Kelas --</option>
      @foreach($kelas as $k)
        <option value="{{ $k->id }}" {{ old('id_kelas') == $k->id ? 'selected' : '' }}>
          {{ $k->kelas }}
        </option>
      @endforeach
    </select>
    @error('id_kelas')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>

<div class="col-12 mt-2">
  <div class="input-style-1">
    <label>Tahun Ajaran</label>
    <select name="id_tahun_ajaran" class="form-control @error('id_tahun_ajaran') is-invalid @enderror" required>
      <option disabled selected>-- Pilih Tahun Ajaran --</option>
      @foreach($tahun as $t)
        <option value="{{ $t->id }}" {{ old('id_tahun_ajaran') == $t->id ? 'selected' : '' }}>
          {{ $t->nama }}
        </option>
      @endforeach
    </select>
    @error('id_tahun_ajaran')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>

                      <!-- end col -->
              
                      <!-- end col -->
                      <!-- end col -->
                     
                    </div>
                     <button type="submit" class="btn btn-primary mr-2 mt-3">Simpan</button>
                      <a href="{{ route('siswa.index') }}" class="btn btn-dark mt-3">Kembali</a>
                    <!-- end row -->
                  </form>
                 </div>
                
                
            </div>
        </div>
    </div>
</div>
@endsection