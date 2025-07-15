@extends('layouts.app')
@section('content')
<div class="container">
  <h3>Pilih Kelas</h3>
  <div class="row">
    @foreach($kelas as $k)
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>{{ $k->kelas }}</h5>
            <p>Tahun Ajaran:{{ $k->tahunAjaran?->nama ?? '-' }}</p>

            @if(auth()->user()->id_kelas == $k->id)
              <span class="badge bg-success">Sudah Bergabung</span>
            @else
              <form action="{{ route('kelas.join', $k->id) }}" method="POST">
                @csrf
                <button class="btn btn-primary btn-sm">Gabung</button>
              </form>
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
