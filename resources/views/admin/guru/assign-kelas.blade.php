@extends('layouts.backend')

@section('content')
<div class="container">
    <h4>Assign Kelas ke {{ $guru->name }}</h4>

    <form action="{{ route('guru.assignKelas', $guru->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kelas_id">Pilih Kelas</label>
            <select name="kelas_id[]" class="form-control" multiple required>
                @foreach($kelasList as $kelas)
                    <option value="{{ $kelas->id }}" 
                        {{ $guru->kelasDiampu->contains($kelas->id) ? 'selected' : '' }}>
                        {{ $kelas->kelas }} - {{ $kelas->jurusan }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
