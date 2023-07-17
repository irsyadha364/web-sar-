<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="{{ route('kumpulGiat.kumpulGiat') }}">RESCUE020</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a href="{{ route('profMatc.profMatc') }}">Hasil Ranking</a></li>
                <li class="dropdown"><a href="#"><span>Profile Matching</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('aspek.halAspek') }}">Aspek</a></li>
                        <li><a href="{{ route('kriteria.halKriteria') }}">Kriteria</a></li>
                        <li><a href="{{ route('profMatc.hitung') }}">Perhitungan</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('kumpulGiat.halGiat') }}">Kegiatan</a></li>
                <li><a href="{{ route('veriUser.halVeri') }}">Anggota</a></li>
                <li><a href="{{ route('nilaiKerja.halNilai') }}">Nilai Kerja</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a class="get-started-btn" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </div>
</header><!-- End Header -->
