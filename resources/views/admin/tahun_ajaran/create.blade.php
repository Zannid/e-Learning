@extends('layouts.backend')

@section('content')
<div class="container mt-4">
    <h2>Tambah Tahun Ajaran</h2>

    <form action="{{ route('tahun_ajaran.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Tahun Ajaran</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="is_active" class="form-check-label">
                <input type="checkbox" name="is_active" value="1" class="form-check-input">
                Jadikan Aktif?
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('tahun_ajaran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
