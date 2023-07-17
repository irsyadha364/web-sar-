@extends('layouts4.master')
@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Kegiatan</h2>
            </div>
        </div><br><!-- End Breadcrumbs -->

        <!-- ======= Tambah Data Button ======= -->
        <div class="d-flex justify-content-center mb-4">
            <a href="{{ route('kumpulGiat.kumpulGiat') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data</a>
            </div>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('Tanggal') }}</th>
                                        <th scope="col">{{ __('Jenis') }}</th>
                                        <th scope="col">{{ __('Alamat') }}</th>
                                        <th scope="col">{{ __('Tingkatan') }}</th>
                                        <th scope="col">{{ __('Fitur') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inputGiat as $inputGiat)
                                        <tr style="text-align: center">
                                            <td>{{ $inputGiat->tanggalKegiatan }}</td>
                                            <td>{{ $inputGiat->jenisKegiatan }}</td>
                                            <td>{{ $inputGiat->penjemputan }} - {{ $inputGiat->pengantaran }}</td>
                                            <td>{{ $inputGiat->tingkatKasus }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="{{ __('User') }}">
                                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#showModal{{ $inputGiat->id }}"><i
                                                            class="fa-edit w-100 p-4">Lihat</i></button>
                                                    <a href="{{ route('kumpulGiat.edit', $inputGiat->id) }}"
                                                        class="btn btn-success"><i class="fa-edit w-100 p-4">Edit</i></a>
                                                    <form action="{{ route('kumpulGiat.destroy', $inputGiat->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah ada yakin ingin menghapus data user ini?')">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fa-trash w-100 p-3">Delete</i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- Modal Detail Kegiatan --}}
                                        <div class="modal fade" id="showModal{{ $inputGiat->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light p-3">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Giat</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close" id="close-modal"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form method="post" action="" enctype="multipart/form-data"
                                                            id="myForm">
                                                            @csrf
                                                            <div>
                                                                <label for="firstname" class="formbold-form-label"> Nomor
                                                                    Kegiatan* </label>
                                                                <input type="text" name="nomorKegiatan" id="name"
                                                                    class="formbold-form-input"
                                                                    value="{{ $inputGiat->nomorKegiatan }}" readonly />
                                                            </div><br>

                                                            <div>
                                                                <label for="email" class="formbold-form-label"> Tanggal
                                                                    Kegiatan* </label>
                                                                <input type="date" name="tanggalKegiatan" id="date"
                                                                    class="formbold-form-input"
                                                                    value="{{ $inputGiat->tanggalKegiatan }}" readonly />
                                                            </div><br>

                                                            <div>
                                                                <label for="email" class="formbold-form-label"> Waktu
                                                                    Keberangkatan* </label>
                                                                <input type="time" name="waktuKeberangkatan"
                                                                    id="time" class="formbold-form-input"
                                                                    value="{{ $inputGiat->waktuKeberangkatan }}"
                                                                    readonly />
                                                            </div><br>

                                                            <div>
                                                                <label for="firstname" class="formbold-form-label"> Jenis
                                                                    Kegiatan* </label>
                                                                <input type="text" name="jenisKegiatan" id="name"
                                                                    class="formbold-form-input"
                                                                    value="{{ $inputGiat->jenisKegiatan }}" readonly />
                                                            </div><br>

                                                            <div>
                                                                <label for="firstname" class="formbold-form-label"> Unit
                                                                    Kendaraan* </label>
                                                                <input type="text" name="unitKendaraan" id="name"
                                                                    class="formbold-form-input"
                                                                    value="{{ $inputGiat->unitKendaraan }}" readonly />
                                                            </div><br>

                                                            <div>
                                                                <label for="firstname" class="formbold-form-label"> Nama
                                                                    Pemohon* </label>
                                                                <input type="text" name="namaPemohon" id="name"
                                                                    class="formbold-form-input"
                                                                    value="{{ $inputGiat->namaPemohon }}" readonly />
                                                            </div><br>

                                                            <div>
                                                                <label for="firstname" class="formbold-form-label"> Nomor
                                                                    Pemohon* </label>
                                                                <input type="tel" name="nomorPemohon" id="telephone"
                                                                    class="formbold-form-input"
                                                                    value="{{ $inputGiat->nomorPemohon }}" readonly />
                                                            </div><br>

                                                            <div>
                                                                <label for="firstname" class="formbold-form-label"> Alamat
                                                                    & Tujuan* </label>
                                                                <label for="firstname" class="formbold-form-label">
                                                                    Penjemputan : </label>
                                                                <input type="tel" name="nomorPemohon" id="telephone"
                                                                    class="formbold-form-input"
                                                                    value="{{ $inputGiat->penjemputan }}" readonly />
                                                                <label for="firstname" class="formbold-form-label">
                                                                    Pengantaran : </label>
                                                                <input type="tel" name="nomorPemohon" id="telephone"
                                                                    class="formbold-form-input"
                                                                    value="{{ $inputGiat->pengantaran }}" readonly />
                                                            </div><br>

                                                            <label for="firstname" class="formbold-form-label"> Tingkat
                                                                Kasus* </label>
                                                            <input type="tel" name="nomorPemohon" id="telephone"
                                                                class="formbold-form-input"
                                                                value="{{ $inputGiat->tingkatKasus }}" readonly />
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <a href="" class="btn btn-primary"> <i
                                                                    class="fa fa-plus"></i> Lihat Anggota </a>
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Modal --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }

                body {
                    font-family: 'Inter', sans-serif;
                }

                .formbold-main-wrapper {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 48px;
                }

                .formbold-form-wrapper {
                    margin: 0 auto;
                    max-width: 550px;
                    width: 100%;
                    background: white;
                }

                .formbold-event-wrapper span {
                    font-weight: 500;
                    font-size: 16px;
                    line-height: 24px;
                    letter-spacing: 2.5px;
                    color: #f25c00;
                    display: inline-block;
                    margin-bottom: 12px;
                }

                .formbold-event-wrapper h3 {
                    font-weight: 700;
                    font-size: 28px;
                    line-height: 34px;
                    color: #07074d;
                    width: 60%;
                    margin-bottom: 15px;
                }

                .formbold-event-wrapper h4 {
                    font-weight: 600;
                    font-size: 20px;
                    line-height: 24px;
                    color: #07074d;
                    width: 60%;
                    margin: 25px 0 15px;
                }

                .formbold-event-wrapper p {
                    font-size: 16px;
                    line-height: 24px;
                    color: #536387;
                }

                .formbold-event-details {
                    background: #fafafa;
                    border: 1px solid #dde3ec;
                    border-radius: 5px;
                    margin: 25px 0 30px;
                }

                .formbold-event-details h5 {
                    color: #07074d;
                    font-weight: 600;
                    font-size: 18px;
                    line-height: 24px;
                    padding: 15px 25px;
                }

                .formbold-event-details ul {
                    border-top: 1px solid #edeef2;
                    padding: 25px;
                    margin: 0;
                    list-style: none;
                    display: flex;
                    flex-wrap: wrap;
                    row-gap: 14px;
                }

                .formbold-event-details ul li {
                    color: #536387;
                    font-size: 16px;
                    line-height: 24px;
                    width: 50%;
                    display: flex;
                    align-items: center;
                    gap: 10px;
                }

                .formbold-form-title {
                    color: #07074d;
                    font-weight: 600;
                    font-size: 28px;
                    line-height: 35px;
                    width: 60%;
                    margin-bottom: 30px;
                }

                .formbold-input-flex {
                    display: flex;
                    gap: 20px;
                    margin-bottom: 15px;
                }

                .formbold-input-flex>div {
                    width: 50%;
                }

                .formbold-form-input {
                    text-align: center;
                    width: 100%;
                    padding: 13px 22px;
                    border-radius: 5px;
                    border: 1px solid #dde3ec;
                    background: #ffffff;
                    font-weight: 500;
                    font-size: 16px;
                    color: #536387;
                    outline: none;
                    resize: none;
                }

                .formbold-form-input:focus {
                    border-color: #f25c00;
                    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
                }

                .formbold-form-label {
                    color: #536387;
                    font-size: 14px;
                    line-height: 24px;
                    display: block;
                    margin-bottom: 10px;
                }

                .formbold-policy {
                    font-size: 14px;
                    line-height: 24px;
                    color: #536387;
                    width: 70%;
                    margin-top: 22px;
                }

                .formbold-policy a {
                    color: #f25c00;
                }

                .formbold-btn {
                    text-align: center;
                    width: 100%;
                    font-size: 16px;
                    border-radius: 5px;
                    padding: 14px 25px;
                    border: none;
                    font-weight: 500;
                    background-color: #f25c00;
                    color: white;
                    cursor: pointer;
                    margin-top: 25px;
                }

                .formbold-btn:hover {
                    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
                }
            </style><!-- End Founders Section -->

    </main><!-- End #main -->
@endsection
