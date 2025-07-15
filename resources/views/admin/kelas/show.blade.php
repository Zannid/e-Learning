@extends('layouts.app')
@section('content')
<div class="container">
  <h3>Kelas {{ $kelas->kelas }} ({{ $kelas->tahunAjaran->nama }})</h3>
  <table class="table table-bordered">
    <thead><tr><th>#</th><th>Nama</th><th>Email</th></tr></thead>
    <tbody>
      @foreach($kelas->siswa as $s)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $s->name }}</td>
          <td>{{ $s->email }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
