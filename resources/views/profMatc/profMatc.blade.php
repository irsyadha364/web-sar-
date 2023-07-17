@extends('layouts4.master')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Perankingan</h2>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Founders Section ======= -->
        <div class="formbold-main-wrapper">
            <div class="container">
                <h4>Paramedis (Perankingan)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('Nilai Akhir') }}</th>
                                        <th scope="col">{{ __('Ranking') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = $rankPara->count();
                                        $countRank = 1;
                                        ?>
                                    @foreach($rankPara as $para)
                                        @foreach($user as $users)
                                            @if($users->id == $para->idLogin)
                                                <tr style="text-align: center">
                                                <td>{{$countRank}}</td>
                                                <td>{{$users->name}}</td>
                                                <td>{{$para->nilaiAkhir}}</td>
                                                <td>{{$countRank}}</td>
                                                <?php
                                                $countRank++;
                                                ?>
                                                </tr>
                                                @else
                                                <?php
                                                $count--;
                                                ?>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <h4>Mapping (Perankingan)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('Nilai Akhir') }}</th>
                                        <th scope="col">{{ __('Ranking') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = $rankNavi->count();
                                        $countRank = 1;
                                        ?>
                                    @foreach($rankNavi as $navi)
                                        @foreach($user as $users)
                                            @if($users->id == $navi->idLogin)
                                                <tr style="text-align: center">
                                                <td>{{$countRank}}</td>
                                                <td>{{$users->name}}</td>
                                                <td>{{$navi->nilaiAkhir}}</td>
                                                <td>{{$countRank}}</td>
                                                <?php
                                                $countRank++;
                                                ?>
                                                </tr>
                                                @else
                                                <?php
                                                $count--;
                                                ?>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="formbold-main-wrapper">
            <div class="container">
                <h4>Evakuasi (Perankingan)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('Nilai Akhir') }}</th>
                                        <th scope="col">{{ __('Ranking') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = $rankEvak->count();
                                        $countRank = 1;
                                        ?>
                                    @foreach($rankEvak as $evak)
                                        @foreach($user as $users)
                                            @if($users->id == $evak->idLogin)
                                                <tr style="text-align: center">
                                                <td>{{$countRank}}</td>
                                                <td>{{$users->name}}</td>
                                                <td>{{$evak->nilaiAkhir}}</td>
                                                <td>{{$countRank}}</td>
                                                <?php
                                                $countRank++;
                                                ?>
                                                </tr>
                                                @else
                                                <?php
                                                $count--;
                                                ?>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <h4>Posko Bencana (Perankingan)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('Nilai Akhir') }}</th>
                                        <th scope="col">{{ __('Ranking') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = $rankPosko->count();
                                        $countRank = 1;
                                        ?>
                                    @foreach($rankPosko as $posko)
                                        @foreach($user as $users)
                                            @if($users->id == $posko->idLogin)
                                                <tr style="text-align: center">
                                                <td>{{$countRank}}</td>
                                                <td>{{$users->name}}</td>
                                                <td>{{$posko->nilaiAkhir}}</td>
                                                <td>{{$countRank}}</td>
                                                <?php
                                                $countRank++;
                                                ?>
                                                </tr>
                                                @else
                                                <?php
                                                $count--;
                                                ?>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
