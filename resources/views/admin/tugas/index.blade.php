@extends('layouts.backend')
@section('content')
    <section class="table-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Data Tugas</h2>
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
                                        quiz
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

            <!-- ========== tables-wrapper start ========== -->
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <a href="{{ route('tugas.create') }}" class="btn btn-primary">
                                <i class="mdi mdi-plus-box"></i> Tambah
                            </a>
                            <div class="table-wrapper table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="lead-info">
                                                <h6>No</h6>
                                            </th>
                                            <th class="lead-email">
                                                <h6>Kode Tugas</h6>
                                            </th>
                                            <th class="lead-phone">
                                                <h6>Judul</h6>
                                            </th>
                                            <th class="lead-company">
                                                <h6>Mapel</h6>
                                            </th>
                                            <th class="lead-company">
                                                <h6>Jumlah Soal</h6>
                                            </th>
                                            <th class="lead-company">
                                                <h6>Tenggat waktu</h6>
                                            </th>
                                            </th>
                                        
                                            <th>
                                                <h6>Action</h6>
                                            </th>
                                        </tr>
                                        <!-- end table row-->
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach ($tugas as $data)
                                            <tr>
                                                <td class="min-width">
                                                    <div class="lead">
                                                        <div class="lead-text">
                                                            <p>{{ $no++ }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="min-width">
                                                    <p>{{ $data->kode_tugas }}</p>
                                                </td>
                                                <td class="min-width">
                                                    <p>{{ $data->judul }}</p>
                                                </td>
                                                 <td class="min-width">
                                                    <p>{{ $data->mapel->nama_mapel}}</p>
                                                </td>
                                                <td class="min-width">
                                                    <p>{{ $data->jumlah_soal }}</p>
                                                </td>
                                                <td class="min-width">
                                                    <p>{{ $data->tenggat_waktu->format('d M Y H:i') }}</p>
                                                </td>
                                                
                                                <td>
                                                    <div class="action justify-content">
                                                        <div class="dropdown">
                                                            <button class="more-btn ml-10 dropdown-toggle" id="moreAction1"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="lni lni-more-alt"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="moreAction1">
                                                                <li>
                                                                    <a href="{{ route('tugas.edit', $data->id) }}"
                                                                        class="dropdown-item">
                                                                        <i class="mdi mdi-pencil"></i> Edit
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('tugas.show', $data->id) }}"
                                                                        class="dropdown-item">
                                                                        <i class="lni lni-eye"></i> View
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <form action="{{ route('tugas.destroy', $data->id) }}"
                                                                        method="post" style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="dropdown-item text-danger"
                                                                            onclick="return confirm('Apakah anda yakin?')">
                                                                            <i class="lni lni-trash-can"></i> Delete
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- end table -->
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== tables-wrapper end ========== -->
        </div>
        <!-- end container -->
    </section>
@endsection
