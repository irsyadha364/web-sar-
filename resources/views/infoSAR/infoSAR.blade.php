<!-- index.blade.php -->

@extends('layouts3.master')

@section('content')
    <style>
        .card-title {
            background-color: #FFA500;
            /* Warna oranye muda */
            padding: 10px;
            border-radius: 5px;
            color: #FFF;
        }
    </style>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Informasi Kegiatan</h2>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Founders Section ======= -->
        <section id="trainers" class="trainers">
            <div class="container">
                <div class="row">
                    @foreach ($inputGiat as $input)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $input->nomorKegiatan }}</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><span class="fontawesome-calendar"></span> Tanggal:
                                            {{ $input->tanggalKegiatan }}</li>
                                        <li class="list-group-item"><span class="fontawesome-globe"></span> Jenis:
                                            {{ $input->jenisKegiatan }}</li>
                                        <li class="list-group-item">
                                            <span class="fontawesome-tags"></span> Alamat:
                                            {{ $input->penjemputan }} - {{ $input->pengantaran }}
                                        </li>
                                        <li class="list-group-item"><span class="fontawesome-book"></span> Tingkat:
                                            {{ $input->tingkatKasus }}</li>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#showModal{{ $input->id }}">
                                        Detail
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Detail Kegiatan --}}
                        <div class="modal fade" id="showModal{{ $input->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Kegiatan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form method="post" action="" enctype="multipart/form-data" id="myForm">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Nomor Kegiatan</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $input->nomorKegiatan }}" readonly />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Tanggal Kegiatan</label>
                                                <input type="date" class="form-control"
                                                    value="{{ $input->tanggalKegiatan }}" readonly />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Waktu Keberangkatan</label>
                                                <input type="time" class="form-control"
                                                    value="{{ $input->waktuKeberangkatan }}" readonly />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Jenis Kegiatan</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $input->jenisKegiatan }}" readonly />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Unit Kendaraan</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $input->unitKendaraan }}" readonly />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Nama dan Nomor Pemesan</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $input->namaPemesan }} - {{ $input->nomorPemesan }}"
                                                    readonly />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Alamat Penjemputan</label>
                                                <textarea class="form-control" readonly>{{ $input->penjemputan }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Alamat Pengantaran</label>
                                                <textarea class="form-control" readonly>{{ $input->pengantaran }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Tingkat Kasus</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $input->tingkatKasus }}" readonly />
                                            </div>
                                        </form>
                                    </div>

                                    <div class="modal-footer bg-light p-3">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Detail Kegiatan --}}
                    @endforeach
                </div>
            </div>
        </section><!-- End Founders Section -->
    </main><!-- End #main -->
@endsection
