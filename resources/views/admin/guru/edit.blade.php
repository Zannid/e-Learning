@extends('layouts.backend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-4">
                <div class="title">
                  <h2>Edit Data guru</h2>
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
                  <form method="POST" action="{{ route('guru.update', $guru->id) }}">
                     @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Nama</label>
                          <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $guru->name }}" type="text" placeholder="Nama" />
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Nama</label>
                           <img src="{{ asset('/storage/guru/' . $guru->foto) }}" width="100">
                                <input type="file" class="form-control" name="foto"
                            id="putih" style="color: #000; background-color: #f5f5f5;" accept="image/*" value="{{ $guru->foto }}">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Email</label>
                          <input class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ $guru->email }}" type="email" placeholder="Email" />
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Password</label>
                          <input type="password" placeholder="Password"  class="form-control @error('password') is-invalid @enderror" name="password"/>
                             @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                      <!-- end col -->
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Konfirm Password</label>
                           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            
                        </div>
                      </div>
                      <!-- end col -->
              
                      <!-- end col -->
                      <!-- end col -->
                     
                    </div>
                     <button type="submit" class="btn btn-primary mr-2 mt-3">Simpan</button>
                      <a href="{{ route('guru.index') }}" class="btn btn-dark mt-3">Kembali</a>
                    <!-- end row -->
                  </form>
                 </div>
                
                
            </div>
        </div>
    </div>
</div>
@endsection