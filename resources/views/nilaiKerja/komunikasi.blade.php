@extends('layouts4.master')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Soal Komunikasi</h2>
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
                                <h5>Form hasil Komunikasi</h5>
                                <ul>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt.
                                    </p>
                                </ul>
                            </div>
                        </defs>
                </div>
                <?php
                $count=$nilai->count();
                ?>
                @if($count == 0)
                <form action="{{route('komunikasi.store', $user->id)}}" method="POST">
                    @csrf
                    <fieldset>
                        <legend>Soal 1</legend>
                        <label for="soalKom1">Seberapa efektif  komunikasi antar anggota tim dalam menyelesaikan tugas ?</label>

                        <input type="radio" id="sk12" name="soalKom1" value="Baik" />
                        <label for="sk11"><span></span>Baik</label><br>

                        <input type="radio" id="sk14" name="soalKom1" value="Kurang" />
                        <label for="sk12"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 2</legend>
                        <label for="soalKom2">Pertanyaan: Seberapa terbuka anggota tim dalam berkomunikasi dan memberikan masukan ?</label>

                        <input type="radio" id="sk22" name="soalKom2" value="Baik" />
                        <label for="sk21"><span></span>Baik</label><br>

                        <input type="radio" id="sk24" name="soalKom2" value="Kurang" />
                        <label for="sk22"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 3</legend>
                        <label for="soalKom3">Pertanyaan: Sejauh mana anggota tim mendengarkan satu sama lain dan merespon dengan baik ?</label>

                        <input type="radio" id="sk32" name="soalKom3" value="Baik" />
                        <label for="sk31"><span></span>Baik</label><br>

                        <input type="radio" id="sk34" name="soalKom3" value="Kurang" />
                        <label for="sk32"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 4</legend>
                        <label for="soalKom4">Pertanyaan: Seberapa sering komunikasi terjadi dalam tim untuk membahas kinerja dan perbaikan yang dibutuhkan  ?</label>

                        <input type="radio" id="sk42" name="soalKom4" value="Baik" />
                        <label for="sk41"><span></span>Baik</label><br>

                        <input type="radio" id="sk44" name="soalKom4" value="Kurang" />
                        <label for="sk42"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 5</legend>
                        <label for="soalKom5">Pertanyaan: Bagaimana tingkat  kejelasan dan keselarasan informasi yang disampaikan antar orang lain ?</label>

                        <input type="radio" id="sk52" name="soalKom5" value="Baik" />
                        <label for="sk51"><span></span>Baik</label><br>

                        <input type="radio" id="sk54" name="soalKom5" value="Kurang" />
                        <label for="sk52"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <button type="submit" class="formbold-btn">Submit</button>
                </form>
                @endif
                @foreach($nilai as $nilai)
                @if($nilai->idLogin == $user->id)

                <form action="{{route('komunikasi.update', $user->id)}}" method="POST">
                    @csrf
                    <fieldset>
                        <legend>Soal 1</legend>
                        <label for="soalKom1">Seberapa efektif  komunikasi antar anggota tim dalam menyelesaikan tugas ?</label>

                        <input type="radio" id="sk12" name="soalKom1" value="Baik" {{ $nilai->soalKom1=='Baik' ? 'checked': '' }}/>
                        <label for="sk11"><span></span>Baik</label><br>

                        <input type="radio" id="sk14" name="soalKom1" value="Kurang" {{ $nilai->soalKom1=='Kurang' ? 'checked': '' }}/>
                        <label for="sk12"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 2</legend>
                        <label for="soalKom2">Pertanyaan: Seberapa terbuka anggota tim dalam berkomunikasi dan memberikan masukan ?</label>

                        <input type="radio" id="sk22" name="soalKom2" value="Baik" {{ $nilai->soalKom2=='Baik' ? 'checked': '' }}/>
                        <label for="sk21"><span></span>Baik</label><br>

                        <input type="radio" id="sk24" name="soalKom2" value="Kurang" {{ $nilai->soalKom2=='Kurang' ? 'checked': '' }}/>
                        <label for="sk22"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 3</legend>
                        <label for="soalKom3">Pertanyaan: Sejauh mana anggota tim mendengarkan satu sama lain dan merespon dengan baik ?</label>

                        <input type="radio" id="sk32" name="soalKom3" value="Baik" {{ $nilai->soalKom3=='Baik' ? 'checked': '' }}/>
                        <label for="sk31"><span></span>Baik</label><br>

                        <input type="radio" id="sk34" name="soalKom3" value="Kurang" {{ $nilai->soalKom3=='Kurang' ? 'checked': '' }}/>
                        <label for="sk32"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 4</legend>
                        <label for="soalKom4">Pertanyaan: Seberapa sering komunikasi terjadi dalam tim untuk membahas kinerja dan perbaikan yang dibutuhkan  ?</label>

                        <input type="radio" id="sk42" name="soalKom4" value="Baik" {{ $nilai->soalKom4=='Baik' ? 'checked': '' }}/>
                        <label for="sk41"><span></span>Baik</label><br>

                        <input type="radio" id="sk44" name="soalKom4" value="Kurang" {{ $nilai->soalKom4=='Kurang' ? 'checked': '' }}/>
                        <label for="sk42"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 5</legend>
                        <label for="soalKom5">Pertanyaan: Bagaimana tingkat  kejelasan dan keselarasan informasi yang disampaikan antar orang lain ?</label>

                        <input type="radio" id="sk52" name="soalKom5" value="Baik" {{ $nilai->soalKom5=='Baik' ? 'checked': '' }}/>
                        <label for="sk51"><span></span>Baik</label><br>

                        <input type="radio" id="sk54" name="soalKom5" value="Kurang" {{ $nilai->soalKom5=='Kurang' ? 'checked': '' }}/>
                        <label for="sk52"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <button type="submit" class="formbold-btn">Submit</button>
                </form>
                @elseif($count == 1)

                <form action="{{route('komunikasi.store', $user->id)}}" method="POST">
                    @csrf
                    <fieldset>
                        <legend>Soal 1</legend>
                        <label for="soalKom1">Seberapa efektif  komunikasi antar anggota tim dalam menyelesaikan tugas ?</label>

                        <input type="radio" id="sk12" name="soalKom1" value="Baik" />
                        <label for="sk11"><span></span>Baik</label><br>

                        <input type="radio" id="sk14" name="soalKom1" value="Kurang" />
                        <label for="sk12"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 2</legend>
                        <label for="soalKom2">Pertanyaan: Seberapa terbuka anggota tim dalam berkomunikasi dan memberikan masukan ?</label>

                        <input type="radio" id="sk22" name="soalKom2" value="Baik" />
                        <label for="sk21"><span></span>Baik</label><br>

                        <input type="radio" id="sk24" name="soalKom2" value="Kurang" />
                        <label for="sk22"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 3</legend>
                        <label for="soalKom3">Pertanyaan: Sejauh mana anggota tim mendengarkan satu sama lain dan merespon dengan baik ?</label>

                        <input type="radio" id="sk32" name="soalKom3" value="Baik" />
                        <label for="sk31"><span></span>Baik</label><br>

                        <input type="radio" id="sk34" name="soalKom3" value="Kurang" />
                        <label for="sk32"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 4</legend>
                        <label for="soalKom4">Pertanyaan: Seberapa sering komunikasi terjadi dalam tim untuk membahas kinerja dan perbaikan yang dibutuhkan  ?</label>

                        <input type="radio" id="sk42" name="soalKom4" value="Baik" />
                        <label for="sk41"><span></span>Baik</label><br>

                        <input type="radio" id="sk44" name="soalKom4" value="Kurang" />
                        <label for="sk42"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 5</legend>
                        <label for="soalKom5">Pertanyaan: Bagaimana tingkat  kejelasan dan keselarasan informasi yang disampaikan antar orang lain ?</label>

                        <input type="radio" id="sk52" name="soalKom5" value="Baik" />
                        <label for="sk51"><span></span>Baik</label><br>

                        <input type="radio" id="sk54" name="soalKom5" value="Kurang" />
                        <label for="sk52"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <button type="submit" class="formbold-btn">Submit</button>
                </form>
                @else
                <?php
                $count--;
                ?>
                @endif
                @endforeach
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
