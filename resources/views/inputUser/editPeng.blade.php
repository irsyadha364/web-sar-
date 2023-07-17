@extends('layouts3.master')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Edit Kegiatan</h2>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Founders Section ======= -->
        <div class="formbold-main-wrapper">
            <!-- Author: FormBold Team -->
            <!-- Learn More: https://formbold.com -->
            <div class="formbold-form-wrapper">
                <div class="formbold-event-wrapper">
                    <svg width="490" height="215" viewBox="0 0 490 215" fill="none" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="490" height="215" rx="5" fill="url(#pattern0)" />
                        <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_1675_1746"
                                    transform="translate(0 -0.524787) scale(0.000379363 0.000864594)" />
                            </pattern>
                            <img src="assets/img/sar1.jpg" width="550px">

                            <div class="formbold-event-details">
                                <h5>Edit Laporan Giat Anggota</h5>
                                <ul>
                                    <p>
                                        Edit apabila ada kesalahan dalam mengisi form sebelumnya berdasarkan Keikutsertaan
                                        Anggota Rescue 020 dalam suatu kegiatan yang
                                        diikuti dan lampirkan dengan sejujur-jujurnya. Terima kasih... !!!
                                    </p>
                                </ul>
                            </div>
                        </defs>
                    </svg>
                </div>

                <form action="{{ route('inputPengUser.update', $laporGiat->id) }}" method="POST">
                    @csrf
                    <div>
                        <label for="firstname" class="formbold-form-label"> Nomor Kegiatan* </label>
                        <input type="text" name="nomorKegiatan" id="name" class="formbold-form-input"
                            value="{{ $laporGiat->nomorKegiatan }}" />
                    </div><br>

                    <div>
                        <label for="email" class="formbold-form-label"> Tanggal Kegiatan* </label>
                        <input type="date" name="tanggalKegiatan" id="date" class="formbold-form-input"
                            value="{{ $laporGiat->tanggalKegiatan }}" />
                    </div><br>

                    <div>
                        <label for="email" class="formbold-form-label"> Waktu Keberangkatan* </label>
                        <input type="time" name="waktuKeberangkatan" id="time" class="formbold-form-input"
                            value="{{ $laporGiat->waktuKeberangkatan }}" />
                    </div><br>

                    <div>
                        <label for="firstname" class="formbold-form-label"> Jenis Kegiatan* </label>
                        <input type="text" name="jenisKegiatan" id="name" class="formbold-form-input"
                            value="{{ $laporGiat->jenisKegiatan }}" />
                    </div><br>

                    <div>
                        <label for="jobtitle" class="formbold-form-label"> Nama Petugas* </label>
                        <input type="text" name="namaPetugas" id="jobtitle" class="formbold-form-input"
                            value="{{ $laporGiat->namaPetugas }}" />
                    </div><br>

                    <div>
                        <label for="firstname" class="formbold-form-label"> Divisi* </label>

                        <input type="radio" id="divPeng1" name="divPeng" value="Paramedis"
                            {{ $laporGiat->divPeng == 'Paramedis' ? 'checked' : '' }} />
                        <label for="divPeng1"><span></span>Paramedis =></label>

                        <input type="radio" id="divPeng2" name="divPeng" value="Mapping"
                            {{ $laporGiat->divPeng == 'Mapping' ? 'checked' : '' }} />
                        <label for="divPeng2"><span></span> Mapping =></label>

                        <input type="radio" id="divPeng3" name="divPeng" value="Evakuasi"
                            {{ $laporGiat->divPeng == 'Evakuasi' ? 'checked' : '' }} />
                        <label for="divPeng3"><span></span> Evakuasi =></label>

                        <input type="radio" id="divPeng4" name="divPeng" value="Posko Bencana"
                            {{ $laporGiat->divPeng == 'Posko Bencana' ? 'checked' : '' }} />
                        <label for="divPeng4"><span></span> Posko Jaga</label>
                    </div><br>

                    <div>
                        <label for="firstname" class="formbold-form-label"> Unit Kendaraan* </label>
                        <input type="text" name="unitKendaraan" id="name" class="formbold-form-input"
                            value="{{ $laporGiat->unitKendaraan }}" />
                    </div><br>

                    <div>
                        <label for="firstname" class="formbold-form-label"> Nama Pemohon* </label>
                        <input type="text" name="namaPemohon" id="name" class="formbold-form-input"
                            value="{{ $laporGiat->namaPemohon }}" />
                    </div><br>

                    <div>
                        <label for="firstname" class="formbold-form-label"> Nomor Pemohon* </label>
                        <input type="tel" name="nomorPemohon" id="telephone" class="formbold-form-input"
                            value="{{ $laporGiat->nomorPemohon }}" />
                    </div><br>

                    <div>
                        <label for="firstname" class="formbold-form-label"> Alamat & Tujuan* </label>
                        <label for="firstname" class="formbold-form-label"> Penjemputan : </label>
                        <input type="text" name="penjemputan" id="penjemputan" class="formbold-form-input"
                            value="{{ $laporGiat->penjemputan }}" />
                        <label for="firstname" class="formbold-form-label"> Pengantaran : </label>
                        <input type="text" name="pengantaran" id="pengantaran" class="formbold-form-input"
                            value="{{ $laporGiat->pengantaran }}" />
                    </div><br>

                    {{-- <div>
                        <label for="postcode" class="formbold-form-label"> Dokumentasi* </label>
                        <input type="file" name="dokumentasi" id="myFile" class="formbold-form-input" />
                    </div><br> --}}

                    <div>
                        <label for="postcode" class="formbold-form-label"> Data Pendukung* </label>
                        <textarea name="dataPendukung" id="story" rows="5" cols="33" class="formbold-form-input">{{ $laporGiat->dataPendukung }}</textarea>
                    </div><br>

                    <button type="submit" class="formbold-btn">Submit</button>
                </form>
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
