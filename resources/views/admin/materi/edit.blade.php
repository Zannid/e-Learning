@extends('layouts.backend')
@section('content')
    <section class="tab-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Edit Data Materi</h2>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#0">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Data Materi
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <!-- ========== form-elements-wrapper start ========== -->
            <div class="form-elements-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- input style start -->
                        <form action="{{ route('materi.update', $materi->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-style mb-30">
                                <h6 class="mb-25">Materi</h6>
                                <div class="input-style-1">
                                    <label>Judul</label>
                                    <input type="text" placeholder="Judul" name="judul" value="{{ $materi->judul }}" required />
                                </div>
                                <!-- foto -->
                                <div class="mb-3">
                                <label for="foto">Foto</label>
                                <img src="{{ asset('/storage/materi/' . $materi->foto) }}" width="100">
                                <input type="file" class="form-control" name="foto"
                            id="putih" style="color: #000; background-color: #f5f5f5;" accept="image/*" value="{{ $materi->foto }}">
                            
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <!-- end input -->
                                <div class="input-style-1">
                                    <label>Isi Materi</label>
                                    <textarea placeholder="Isi Materi" name="isi_materi" rows="5" required>{{ $materi->isi_materi }}</textarea>
                                </div>
                                <!-- end input -->
                                <div class="input-style-1">
                                    <div class="select-style-1">
                                        <label>Mapel</label>
                                        <div class="select-position">
                                            <select name="id_mapel" required>
                                                @foreach ($mapel as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-style-1">
                                <div class="select-style-1">
                                    <label>Kelas</label>
                                    <div class="select-position">
                                        <select name="id_kelas">
                                            @foreach ($kelas as $data)
                                                <option value="{{ $data->id }}">{{ $data->kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                                <div class="input-style-1">
                                    <button type="submit" class="btn btn-primary mr-2 mt-3">Simpan</button>
                                    <a href="{{ route('materi.index') }}" class="btn btn-dark mt-3">Kembali</a>

                                </div>
                                <!-- end input -->
                            </div>
                        </form>
                        <!-- end card -->
                        <!-- ======= input style end ======= -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== form-elements-wrapper end ========== -->
            </div>
            <!-- end container -->
    </section>
@endsection