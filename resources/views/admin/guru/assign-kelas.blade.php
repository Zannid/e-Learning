@extends('layouts.backend')

@section('content')
<div class="container">
    <h4>Assign Kelas ke {{ $guru->name }}</h4>

    <form method="POST" action="{{ route('guru.assignKelas', $guru->id) }}">
    @csrf
    @foreach ($kelasList as $k)
        <div class="form-check">
            <input type="checkbox" name="kelas_id[]" value="{{ $k->id }}"
                {{ $guru->kelasDiampu->contains($k->id) ? 'checked' : '' }}>
            {{ $k->kelas }} - {{ $k->jurusan }}
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>

</div>
@endsection
