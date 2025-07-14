@extends('layouts.backend')
@section('content')

<section class="tab-components">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Edit Quiz</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#0">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#0">Quiz</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Quiz
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========== title-wrapper end ========== -->

        <!-- ========== form-elements-wrapper start ========== -->
        <div class="form-elements-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('quiz.update', $quiz->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-style mb-30">
                            <div class="input-style-1">
                                <label>Judul</label>
                                <input type="text" name="judul" value="{{ $quiz->judul }}" required />
                            </div>
                            <div class="input-style-1">
                  <label>Mapel</label>
                  <div class="select-style-1">
                    <div class="select-position">
                      <select name="id_mapel" required>
                        <option disabled selected value="">{{ $quiz->mapel->nama_mapel}}</option>
                        @foreach($mapel as $m)
                          <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                            <div class="input-style-1">
                                <label>Durasi (menit)</label>
                                <input type="number" name="durasi" value="{{ $quiz->durasi }}" required />
                            </div>
                           <div class="input-style-1">
                            <label>Tenggat Waktu</label>
                            <input type="datetime-local" name="tenggat_waktu" class="form-control" required>
                            </div>
                        </div>

                        @foreach ($quiz->soal as $i => $item)
                            <div class="card-style mb-30">
                                <div class="input-style-1">
                                    <label>Soal {{ $i+1 }}</label>
                                    <input type="text" name="soal[{{ $i }}]" value="{{ $item->pertanyaan }}" required />
                                </div>
                                <label>Pilihan Jawaban</label><br>
                                @foreach(['A', 'B', 'C', 'D'] as $opt)
                                    <div>
                                        <input type="radio" name="jawaban_benar[{{ $i }}]" value="{{ $opt }}" {{ $item->jawaban_benar == $opt ? 'checked' : '' }}> {{ $opt }}
                                        <input type="text" name="opsi[{{ $i }}][{{ $opt }}]" value="{{ $item['pilihan_'.strtolower($opt)] }}" required />
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
