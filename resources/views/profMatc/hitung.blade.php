@extends('layouts4.master')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Profile Matching</h2>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Founders Section ======= -->
        <div class="formbold-main-wrapper">
            <!-- Author: FormBold Team -->
            <!-- Learn More: https://formbold.com -->
            <div class="container">
                <h4>Hasil Skor Kriteria Anggota</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('Para') }}</th>
                                        <th scope="col">{{ __('Maps') }}</th>
                                        <th scope="col">{{ __('Evak') }}</th>
                                        <th scope="col">{{ __('Posko') }}</th>
                                        <th scope="col">{{ __('Kom') }}</th>
                                        <th scope="col">{{ __('Tim') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($user as $users)
                                        <tr style="text-align: center">
                                            <td>{{ $nomor }}</td>
                                            <td>{{ $users->name }}</td>
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ $nilaiAnggotas->pengPara + $nilaiAnggotas->pelPara }}</td>
                                                    <td>{{ $nilaiAnggotas->pengNavi + $nilaiAnggotas->pelNavi }}</td>
                                                    <td>{{ $nilaiAnggotas->pengEvak + $nilaiAnggotas->pelEvak }}</td>
                                                    <td>{{ $nilaiAnggotas->pengPosko + $nilaiAnggotas->pelPosko }}</td>
                                                    <?php
                                                    $countKom = $komunikasi->count();
                                                    ?>
                                                    @if ($countKom == 0)
                                                        <td>0</td>
                                                    @endif
                                                    @foreach ($komunikasi as $komunikasis)
                                                        @if ($komunikasis->idLogin == $users->id)
                                                            <td>{{ $komunikasis->nilaiKom }}</td>
                                                        @elseif($countKom == 1)
                                                            <td>0</td>
                                                        @else
                                                            <?php
                                                            $countKom--;
                                                            ?>
                                                        @endif
                                                    @endforeach

                                                    <?php
                                                    $countTim = $kerjaTim->count();
                                                    ?>
                                                    @if ($countTim == 0)
                                                        <td>0</td>
                                                    @endif
                                                    @foreach ($kerjaTim as $kerjaTims)
                                                        @if ($kerjaTims->idLogin == $users->id)
                                                            <td>{{ $kerjaTims->nilaiTim }}</td>
                                                        @elseif($countTim == 1)
                                                            <td>0</td>
                                                        @else
                                                            <?php
                                                            $countTim--;
                                                            ?>
                                                        @endif
                                                    @endforeach
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <?php $nomor++; ?>
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
                <h4>Nilai Core & Secondary Factor</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Dibutuhkan') }}</th>
                                        <th scope="col">{{ __('Core Factor') }}</th>
                                        <th scope="col">{{ __('Secondary Factor') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align: center">
                                        <td>1.</td>
                                        <td>Paramedis</td>
                                        <td>Para, Kom</td>
                                        <td>Evak, Tim</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>2.</td>
                                        <td>Evakuasi</td>
                                        <td>Evak, Tim</td>
                                        <td>Para, Kom</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>3.</td>
                                        <td>Mapping</td>
                                        <td>Maps, Kom</td>
                                        <td>Posko</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>4.</td>
                                        <td>Posko Bencana</td>
                                        <td>Posko, Kom, Tim</td>
                                        <td>Para, Maps</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="formbold-main-wrapper">
            <div class="container">
                <h4>Paramedis (Nilai Factor)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('CF') }}</th>
                                        <th scope="col">{{ __('SF') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($user as $users)
                                        <tr style="text-align: center">
                                            <td>{{ $nomor }}</td>
                                            <td>{{ $users->name }}</td>
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countKom = $komunikasi->count();
                                                ?>
                                                @foreach ($komunikasi as $komunikasis)
                                                    @if ($komunikasis->idLogin == $users->id)
                                                        <?php
                                                        $nilKom = $komunikasis->nilaiKom;
                                                        ?>
                                                    @elseif($countKom == 1)
                                                        <?php
                                                        $nilKom = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countKom--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ $nilaiAnggotas->pengPara + $nilaiAnggotas->pelPara + $nilKom }}
                                                    </td>

                                                    @if ($countKom == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countTim = $kerjaTim->count();
                                                ?>
                                                @foreach ($kerjaTim as $kerjaTims)
                                                    @if ($kerjaTims->idLogin == $users->id)
                                                        <?php
                                                        $nilTim = $kerjaTims->nilaiTim;
                                                        ?>
                                                    @elseif($countTim == 1)
                                                        <?php
                                                        $nilTim = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countTim--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ $nilaiAnggotas->pengEvak + $nilaiAnggotas->pelEvak + $nilTim }}
                                                    </td>

                                                    @if ($countTim == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <?php $nomor++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <h4>Mapping (Nilai Factor)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('CF') }}</th>
                                        <th scope="col">{{ __('SF') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($user as $users)
                                        <tr style="text-align: center">
                                            <td>{{ $nomor }}</td>
                                            <td>{{ $users->name }}</td>
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countKom = $komunikasi->count();
                                                ?>
                                                @foreach ($komunikasi as $komunikasis)
                                                    @if ($komunikasis->idLogin == $users->id)
                                                        <?php
                                                        $nilKom = $komunikasis->nilaiKom;
                                                        ?>
                                                    @elseif($countKom == 1)
                                                        <?php
                                                        $nilKom = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countKom--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ $nilaiAnggotas->pengNavi + $nilaiAnggotas->pelNavi + $nilKom }}
                                                    </td>

                                                    @if ($countKom == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ $nilaiAnggotas->pengPosko + $nilaiAnggotas->pelPosko }}</td>
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <?php $nomor++; ?>
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
                <h4>Evakuasi (Nilai Factor)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('CF') }}</th>
                                        <th scope="col">{{ __('SF') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($user as $users)
                                        <tr style="text-align: center">
                                            <td>{{ $nomor }}</td>
                                            <td>{{ $users->name }}</td>
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countTim = $kerjaTim->count();
                                                ?>
                                                @foreach ($kerjaTim as $kerjaTims)
                                                    @if ($kerjaTims->idLogin == $users->id)
                                                        <?php
                                                        $nilTim = $kerjaTims->nilaiTim;
                                                        ?>
                                                    @elseif($countTim == 1)
                                                        <?php
                                                        $nilTim = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countTim--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ $nilaiAnggotas->pengEvak + $nilaiAnggotas->pelEvak + $nilTim }}
                                                    </td>

                                                    @if ($countTim == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countKom = $komunikasi->count();
                                                ?>
                                                @foreach ($komunikasi as $komunikasis)
                                                    @if ($komunikasis->idLogin == $users->id)
                                                        <?php
                                                        $nilKom = $komunikasis->nilaiKom;
                                                        ?>
                                                    @elseif($countKom == 1)
                                                        <?php
                                                        $nilKom = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countKom--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ $nilaiAnggotas->pengPara + $nilaiAnggotas->pelPara + $nilKom }}
                                                    </td>

                                                    @if ($countKom == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <?php $nomor++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <h4>Posko Bencana (Nilai Factor)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('CF') }}</th>
                                        <th scope="col">{{ __('SF') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($user as $users)
                                        <tr style="text-align: center">
                                            <td>{{ $nomor }}</td>
                                            <td>{{ $users->name }}</td>
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countKom = $komunikasi->count();
                                                ?>
                                                @foreach ($komunikasi as $komunikasis)
                                                    @if ($komunikasis->idLogin == $users->id)
                                                        <?php
                                                        $nilKom = $komunikasis->nilaiKom;
                                                        ?>
                                                    @elseif($countKom == 1)
                                                        <?php
                                                        $nilKom = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countKom--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                <?php
                                                $countTim = $kerjaTim->count();
                                                ?>
                                                @foreach ($kerjaTim as $kerjaTims)
                                                    @if ($kerjaTims->idLogin == $users->id)
                                                        <?php
                                                        $nilTim = $kerjaTims->nilaiTim;
                                                        ?>
                                                    @elseif($countTim == 1)
                                                        <?php
                                                        $nilTim = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countTim--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ $nilaiAnggotas->pengPosko + $nilaiAnggotas->pelPosko + $nilKom + $nilTim }}
                                                    </td>

                                                    @if ($countTim == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ $nilaiAnggotas->pengPara + $nilaiAnggotas->pelPara + $nilaiAnggotas->pengNavi + $nilaiAnggotas->pelNavi }}
                                                    </td>
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <?php $nomor++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ==========================================================================================================

        <div class="formbold-main-wrapper">
            <div class="container">
                <h4>Paramedis (Nilai Rata)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('CF') }}</th>
                                        <th scope="col">{{ __('SF') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($user as $users)
                                        <tr style="text-align: center">
                                            <td>{{ $nomor }}</td>
                                            <td>{{ $users->name }}</td>
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countKom = $komunikasi->count();
                                                ?>
                                                @foreach ($komunikasi as $komunikasis)
                                                    @if ($komunikasis->idLogin == $users->id)
                                                        <?php
                                                        $nilKom = $komunikasis->nilaiKom;
                                                        ?>
                                                    @elseif($countKom == 1)
                                                        <?php
                                                        $nilKom = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countKom--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ ($nilaiAnggotas->pengPara + $nilaiAnggotas->pelPara + $nilKom) / 2 }}
                                                    </td>

                                                    @if ($countKom == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countTim = $kerjaTim->count();
                                                ?>
                                                @foreach ($kerjaTim as $kerjaTims)
                                                    @if ($kerjaTims->idLogin == $users->id)
                                                        <?php
                                                        $nilTim = $kerjaTims->nilaiTim;
                                                        ?>
                                                    @elseif($countTim == 1)
                                                        <?php
                                                        $nilTim = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countTim--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ ($nilaiAnggotas->pengEvak + $nilaiAnggotas->pelEvak + $nilTim) / 2 }}
                                                    </td>

                                                    @if ($countTim == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <?php $nomor++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <h4>Mapping (Nilai Rata)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('CF') }}</th>
                                        <th scope="col">{{ __('SF') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($user as $users)
                                        <tr style="text-align: center">
                                            <td>{{ $nomor }}</td>
                                            <td>{{ $users->name }}</td>
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countKom = $komunikasi->count();
                                                ?>
                                                @foreach ($komunikasi as $komunikasis)
                                                    @if ($komunikasis->idLogin == $users->id)
                                                        <?php
                                                        $nilKom = $komunikasis->nilaiKom;
                                                        ?>
                                                    @elseif($countKom == 1)
                                                        <?php
                                                        $nilKom = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countKom--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ ($nilaiAnggotas->pengNavi + $nilaiAnggotas->pelNavi + $nilKom) / 2 }}
                                                    </td>

                                                    @if ($countKom == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ ($nilaiAnggotas->pengPosko + $nilaiAnggotas->pelPosko) / 2 }}
                                                    </td>
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <?php $nomor++; ?>
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
                <h4>Evakuasi (Nilai Rata)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('CF') }}</th>
                                        <th scope="col">{{ __('SF') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($user as $users)
                                        <tr style="text-align: center">
                                            <td>{{ $nomor }}</td>
                                            <td>{{ $users->name }}</td>
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countTim = $kerjaTim->count();
                                                ?>
                                                @foreach ($kerjaTim as $kerjaTims)
                                                    @if ($kerjaTims->idLogin == $users->id)
                                                        <?php
                                                        $nilTim = $kerjaTims->nilaiTim;
                                                        ?>
                                                    @elseif($countTim == 1)
                                                        <?php
                                                        $nilTim = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countTim--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ ($nilaiAnggotas->pengEvak + $nilaiAnggotas->pelEvak + $nilTim) / 2 }}
                                                    </td>

                                                    @if ($countTim == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countKom = $komunikasi->count();
                                                ?>
                                                @foreach ($komunikasi as $komunikasis)
                                                    @if ($komunikasis->idLogin == $users->id)
                                                        <?php
                                                        $nilKom = $komunikasis->nilaiKom;
                                                        ?>
                                                    @elseif($countKom == 1)
                                                        <?php
                                                        $nilKom = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countKom--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ ($nilaiAnggotas->pengPara + $nilaiAnggotas->pelPara + $nilKom) / 2 }}
                                                    </td>

                                                    @if ($countKom == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <?php $nomor++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <h4>Posko Bencana (Nilai Rata)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('CF') }}</th>
                                        <th scope="col">{{ __('SF') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($user as $users)
                                        <tr style="text-align: center">
                                            <td>{{ $nomor }}</td>
                                            <td>{{ $users->name }}</td>
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countKom = $komunikasi->count();
                                                ?>
                                                @foreach ($komunikasi as $komunikasis)
                                                    @if ($komunikasis->idLogin == $users->id)
                                                        <?php
                                                        $nilKom = $komunikasis->nilaiKom;
                                                        ?>
                                                    @elseif($countKom == 1)
                                                        <?php
                                                        $nilKom = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countKom--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                <?php
                                                $countTim = $kerjaTim->count();
                                                ?>
                                                @foreach ($kerjaTim as $kerjaTims)
                                                    @if ($kerjaTims->idLogin == $users->id)
                                                        <?php
                                                        $nilTim = $kerjaTims->nilaiTim;
                                                        ?>
                                                    @elseif($countTim == 1)
                                                        <?php
                                                        $nilTim = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countTim--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ ($nilaiAnggotas->pengPosko + $nilaiAnggotas->pelPosko + $nilKom + $nilTim) / 2 }}
                                                    </td>

                                                    @if ($countTim == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>{{ ($nilaiAnggotas->pengPara + $nilaiAnggotas->pelPara + $nilaiAnggotas->pengNavi + $nilaiAnggotas->pelNavi) / 2 }}
                                                    </td>
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <?php $nomor++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ========================================================================================================

        <div class="formbold-main-wrapper">
            <div class="container">
                <h4>Paramedis (Profile Matching)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('CF (70%)') }}</th>
                                        <th scope="col">{{ __('SF (30%)') }}</th>
                                        <th scope="col">{{ __('Nilai Akhir') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($user as $users)
                                        <?php
                                        $nilaiCore = 0;
                                        $nilaiSec = 0;
                                        ?>
                                        <tr style="text-align: center">
                                            <td>{{ $nomor }}</td>
                                            <td>{{ $users->name }}</td>
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countKom = $komunikasi->count();
                                                ?>
                                                @foreach ($komunikasi as $komunikasis)
                                                    @if ($komunikasis->idLogin == $users->id)
                                                        <?php
                                                        $nilKom = $komunikasis->nilaiKom;
                                                        ?>
                                                    @elseif($countKom == 1)
                                                        <?php
                                                        $nilKom = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countKom--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>
                                                        <?php
                                                        $nilaiCore = (($nilaiAnggotas->pengPara + $nilaiAnggotas->pelPara + $nilKom) / 2) * 0.7;
                                                        ?>
                                                        {{ $nilaiCore }}
                                                    </td>

                                                    @if ($countKom == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countTim = $kerjaTim->count();
                                                ?>
                                                @foreach ($kerjaTim as $kerjaTims)
                                                    @if ($kerjaTims->idLogin == $users->id)
                                                        <?php
                                                        $nilTim = $kerjaTims->nilaiTim;
                                                        ?>
                                                    @elseif($countTim == 1)
                                                        <?php
                                                        $nilTim = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countTim--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>
                                                        <?php
                                                        $nilaiSec = (($nilaiAnggotas->pengEvak + $nilaiAnggotas->pelEvak + $nilTim) / 2) * 0.3;
                                                        ?>
                                                        {{ $nilaiSec }}
                                                    </td>
                                                    @if ($countTim == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <td> {{ $nilaiCore + $nilaiSec }}</td>
                                        </tr>
                                        <?php $nomor++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <h4>Mapping (Profile Matching)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('CF (90%)') }}</th>
                                        <th scope="col">{{ __('SF (10%)') }}</th>
                                        <th scope="col">{{ __('Nilai Akhir') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($user as $users)
                                        <?php
                                        $nilaiCore = 0;
                                        $nilaiSec = 0;
                                        ?>
                                        <tr style="text-align: center">
                                            <td>{{ $nomor }}</td>
                                            <td>{{ $users->name }}</td>
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countKom = $komunikasi->count();
                                                ?>
                                                @foreach ($komunikasi as $komunikasis)
                                                    @if ($komunikasis->idLogin == $users->id)
                                                        <?php
                                                        $nilKom = $komunikasis->nilaiKom;
                                                        ?>
                                                    @elseif($countKom == 1)
                                                        <?php
                                                        $nilKom = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countKom--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>
                                                    <?php
                                                    $nilaiCore = (($nilaiAnggotas->pengNavi + $nilaiAnggotas->pelNavi + $nilKom) / 2) * 0.9;
                                                    ?>
                                                    {{ $nilaiCore }}
                                                </td>

                                                    @if ($countKom == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                    <td>
                                                    <?php
                                                    $nilaiSec = (($nilaiAnggotas->pengPosko + $nilaiAnggotas->pelPosko) / 2) * 0.1;
                                                    ?>
                                                    {{ $nilaiSec }}
                                                </td>
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <td> {{ $nilaiCore + $nilaiSec }}</td>
                                        </tr>
                                        <?php $nomor++; ?>
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
                <h4>Evakuasi (Nilai Rata)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('CF (80%)') }}</th>
                                        <th scope="col">{{ __('SF (20%)') }}</th>
                                        <th scope="col">{{ __('Nilai Akhir') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($user as $users)
                                    <?php
                                        $nilaiCore = 0;
                                        $nilaiSec = 0;
                                        ?>
                                        <tr style="text-align: center">
                                            <td>{{ $nomor }}</td>
                                            <td>{{ $users->name }}</td>
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countTim = $kerjaTim->count();
                                                ?>
                                                @foreach ($kerjaTim as $kerjaTims)
                                                    @if ($kerjaTims->idLogin == $users->id)
                                                        <?php
                                                        $nilTim = $kerjaTims->nilaiTim;
                                                        ?>
                                                    @elseif($countTim == 1)
                                                        <?php
                                                        $nilTim = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countTim--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                <td>
                                                    <?php
                                                    $nilaiCore = (($nilaiAnggotas->pengEvak + $nilaiAnggotas->pelEvak + $nilTim) / 2) * 0.8;
                                                    ?>
                                                    {{ $nilaiCore }}
                                                </td>

                                                    @if ($countTim == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countKom = $komunikasi->count();
                                                ?>
                                                @foreach ($komunikasi as $komunikasis)
                                                    @if ($komunikasis->idLogin == $users->id)
                                                        <?php
                                                        $nilKom = $komunikasis->nilaiKom;
                                                        ?>
                                                    @elseif($countKom == 1)
                                                        <?php
                                                        $nilKom = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countKom--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                <td>
                                                    <?php
                                                    $nilaiSec = (($nilaiAnggotas->pengPara + $nilaiAnggotas->pelPara + $nilKom) / 2) * 0.2;
                                                    ?>
                                                    {{ $nilaiSec }}
                                                </td>

                                                    @if ($countKom == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <td> {{ $nilaiCore + $nilaiSec }}</td>
                                        </tr>
                                        <?php $nomor++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <h4>Posko Bencana (Profile Matching)</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col">{{ __('No.') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('CF (60%)') }}</th>
                                        <th scope="col">{{ __('SF (40%)') }}</th>
                                        <th scope="col">{{ __('Nilai Akhir') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($user as $users)
                                    <?php
                                        $nilaiCore = 0;
                                        $nilaiSec = 0;
                                        ?>
                                        <tr style="text-align: center">
                                            <td>{{ $nomor }}</td>
                                            <td>{{ $users->name }}</td>
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                <?php
                                                $countKom = $komunikasi->count();
                                                ?>
                                                @foreach ($komunikasi as $komunikasis)
                                                    @if ($komunikasis->idLogin == $users->id)
                                                        <?php
                                                        $nilKom = $komunikasis->nilaiKom;
                                                        ?>
                                                    @elseif($countKom == 1)
                                                        <?php
                                                        $nilKom = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countKom--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                <?php
                                                $countTim = $kerjaTim->count();
                                                ?>
                                                @foreach ($kerjaTim as $kerjaTims)
                                                    @if ($kerjaTims->idLogin == $users->id)
                                                        <?php
                                                        $nilTim = $kerjaTims->nilaiTim;
                                                        ?>
                                                    @elseif($countTim == 1)
                                                        <?php
                                                        $nilTim = 0;
                                                        ?>
                                                    @else
                                                        <?php
                                                        $countTim--;
                                                        ?>
                                                    @endif
                                                @endforeach

                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                <td>
                                                    <?php
                                                    $nilaiCore = (($nilaiAnggotas->pengPosko + $nilaiAnggotas->pelPosko + $nilKom + $nilTim) / 3) * 0.6;
                                                    ?>
                                                    {{ $nilaiCore }}
                                                </td>

                                                    @if ($countTim == 0)
                                                        <td>0</td>
                                                    @endif
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <?php
                                            $count = $nilaiAnggota->count();
                                            ?>
                                            @foreach ($nilaiAnggota as $nilaiAnggotas)
                                                @if ($nilaiAnggotas->idLogin == $users->id)
                                                <td>
                                                    <?php
                                                    $nilaiSec = (($nilaiAnggotas->pengPara + $nilaiAnggotas->pelPara + $nilaiAnggotas->pengNavi + $nilaiAnggotas->pelNavi) / 2) * 0.4;
                                                    ?>
                                                    {{ $nilaiSec }}
                                                </td>
                                                @elseif($count == 1)
                                                    <td>0</td>
                                                @else
                                                    <?php
                                                    $count--;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <td> {{ $nilaiCore + $nilaiSec }}</td>
                                        </tr>
                                        <?php $nomor++; ?>
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
