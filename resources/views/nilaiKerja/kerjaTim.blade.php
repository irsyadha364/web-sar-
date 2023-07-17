@extends('layouts4.master')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Soal Kerja Tim</h2>
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
                                <h5>Form Hasil Kerja Tim</h5>
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
                <form action="{{route('kerjaTim.store', $user->id)}}" method="POST">
                    @csrf

                    <fieldset>
                        <legend>Soal 1</legend>
                        <label for="soalTim1">Pertanyaan: Bagaimana menurut anda tingkat keakraban antara anggota tim ?</label>

                        <input type="radio" id="st12" name="soalTim1" value="Baik" />
                        <label for="st11"><span></span>Baik</label><br>

                        <input type="radio" id="st14" name="soalTim1" value="Kurang" />
                        <label for="st12"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 2</legend>
                        <label for="soalTim2">Pertanyaan: Sejauh mana anggota tim membagi pengetahuan dan keterampilan yang dimiliki untuk mencapai tujuan bersama ?</label>

                        <input type="radio" id="st22" name="soalTim2" value="Baik" />
                        <label for="st21"><span></span>Baik</label><br>

                        <input type="radio" id="st24" name="soalTim2" value="Kurang" />
                        <label for="st22"><span></span>Kurang</label><br>

                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 3</legend>
                        <label for="soalTim3">Pertanyaan: Bagaimana tingkat dukungan dan kerja sama antar anggota tim dalam menyelesaikan tugas ?</label>

                        <input type="radio" id="st32" name="soalTim3" value="Baik" />
                        <label for="st31"><span></span>Baik</label><br>

                        <input type="radio" id="st34" name="soalTim3" value="Kurang" />
                        <label for="st32"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 4</legend>
                        <label for="soalTim4">Pertanyaan: Seberapa sering anggota tim berkomunikasi untuk memperbaiki kinerja tim dan mengatasi masalah yang muncul ?</label>

                        <input type="radio" id="st42" name="soalTim4" value="Baik" />
                        <label for="st41"><span></span>Baik</label><br>

                        <input type="radio" id="st44" name="soalTim4" value="Kurang" />
                        <label for="st42"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 5</legend>
                        <label for="soalTim5">Pertanyaan: Bagaimana menurut anda tingkat kepercayaan antara anggota tim dalam menyelesaikan tugas secara efektif dan  efisien ?</label>

                        <input type="radio" id="st52" name="soalTim5" value="Baik" />
                        <label for="st51"><span></span>Baik</label><br>

                        <input type="radio" id="st54" name="soalTim5" value="Kurang" />
                        <label for="st52"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <button type="submit" class="formbold-btn">Submit</button>
                </form>
                @endif
                @foreach($nilai as $nilai)
                @if($nilai->idLogin == $user->id)

                <form action="{{route('kerjaTim.update', $user->id)}}" method="POST">
                    @csrf

                    <fieldset>
                        <legend>Soal 1</legend>
                        <label for="soalTim1">Pertanyaan: Bagaimana menurut anda tingkat keakraban antara anggota tim ?</label>

                        <input type="radio" name="soalTim1" value ="Baik" {{ $nilai->soalTim1=='Baik' ? 'checked': '' }}/>
                        <label for="st11"><span></span>Baik</label><br>

                        <input type="radio" name="soalTim1" value ="Kurang"{{ $nilai->soalTim1=='Kurang' ? 'checked': '' }}/>
                        <label for="st12"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 2</legend>
                        <label for="soalTim2">Pertanyaan: Sejauh mana anggota tim membagi pengetahuan dan keterampilan yang dimiliki untuk mencapai tujuan bersama ?</label>

                        <input type="radio" name="soalTim2" value ="Baik" {{ $nilai->soalTim2=='Baik' ? 'checked': '' }}/>
                        <label for="st21"><span></span>Baik</label><br>

                        <input type="radio" name="soalTim2" value ="Kurang" {{ $nilai->soalTim2=='Kurang' ? 'checked': '' }}/>
                        <label for="st22"><span></span>Kurang</label><br>

                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 3</legend>
                        <label for="soalTim3">Pertanyaan: Bagaimana tingkat dukungan dan kerja sama antar anggota tim dalam menyelesaikan tugas ?</label>

                        <input type="radio" name="soalTim3" value ="Baik" {{ $nilai->soalTim3=='Baik' ? 'checked': '' }}/>
                        <label for="st31"><span></span>Baik</label><br>

                        <input type="radio" name="soalTim3" value ="Kurang" {{ $nilai->soalTim3=='Kurang' ? 'checked': '' }}/>
                        <label for="st32"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 4</legend>
                        <label for="soalTim4">Pertanyaan: Seberapa sering anggota tim berkomunikasi untuk memperbaiki kinerja tim dan mengatasi masalah yang muncul ?</label>

                        <input type="radio" name="soalTim4" value ="Baik" {{ $nilai->soalTim4=='Baik' ? 'checked': '' }}/>
                        <label for="st41"><span></span>Baik</label><br>

                        <input type="radio" name="soalTim4" value ="Kurang" {{ $nilai->soalTim4=='Kurang' ? 'checked': '' }}/>
                        <label for="st42"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 5</legend>
                        <label for="soalTim5">Pertanyaan: Bagaimana menurut anda tingkat kepercayaan antara anggota tim dalam menyelesaikan tugas secara efektif dan  efisien ?</label>

                        <input type="radio" name="soalTim5" value ="Baik" {{ $nilai->soalTim5=='Baik' ? 'checked': '' }}/>
                        <label for="st51"><span></span>Baik</label><br>

                        <input type="radio" name="soalTim5" value ="Kurang" {{ $nilai->soalTim5=='Kurang' ? 'checked': '' }}/>
                        <label for="st52"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <button type="submit" class="formbold-btn">Submit</button>
                </form>
                @elseif($count == 1)

                <form action="{{route('kerjaTim.store', $user->id)}}" method="POST">
                    @csrf

                    <fieldset>
                        <legend>Soal 1</legend>
                        <label for="soalTim1">Pertanyaan: Bagaimana menurut anda tingkat keakraban antara anggota tim ?</label>

                        <input type="radio" id="st12" name="soalTim1" value="Baik" />
                        <label for="st11"><span></span>Baik</label><br>

                        <input type="radio" id="st14" name="soalTim1" value="Kurang" />
                        <label for="st12"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 2</legend>
                        <label for="soalTim2">Pertanyaan: Sejauh mana anggota tim membagi pengetahuan dan keterampilan yang dimiliki untuk mencapai tujuan bersama ?</label>

                        <input type="radio" id="st22" name="soalTim2" value="Baik" />
                        <label for="st21"><span></span>Baik</label><br>

                        <input type="radio" id="st24" name="soalTim2" value="Kurang" />
                        <label for="st22"><span></span>Kurang</label><br>

                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 3</legend>
                        <label for="soalTim3">Pertanyaan: Bagaimana tingkat dukungan dan kerja sama antar anggota tim dalam menyelesaikan tugas ?</label>

                        <input type="radio" id="st32" name="soalTim3" value="Baik" />
                        <label for="st31"><span></span>Baik</label><br>

                        <input type="radio" id="st34" name="soalTim3" value="Kurang" />
                        <label for="st32"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 4</legend>
                        <label for="soalTim4">Pertanyaan: Seberapa sering anggota tim berkomunikasi untuk memperbaiki kinerja tim dan mengatasi masalah yang muncul ?</label>

                        <input type="radio" id="st42" name="soalTim4" value="Baik" />
                        <label for="st41"><span></span>Baik</label><br>

                        <input type="radio" id="st44" name="soalTim4" value="Kurang" />
                        <label for="st42"><span></span>Kurang</label><br>
                    </fieldset><br>

                    <fieldset>
                        <legend>Soal 5</legend>
                        <label for="soalTim5">Pertanyaan: Bagaimana menurut anda tingkat kepercayaan antara anggota tim dalam menyelesaikan tugas secara efektif dan  efisien ?</label>

                        <input type="radio" id="st52" name="soalTim5" value="Baik" />
                        <label for="st51"><span></span>Baik</label><br>

                        <input type="radio" id="st54" name="soalTim5" value="Kurang" />
                        <label for="st52"><span></span>Kurang</label><br>
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
