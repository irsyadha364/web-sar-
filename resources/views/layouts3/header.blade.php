<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="{{ route('infoSAR.infoSAR') }}">RESCUE020</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a href="{{ route('infoSAR.infoSAR') }}">Info SAR</a></li>
                <li><a href="{{ route('inputUser.halPel') }}">Pelatihan</a></li>
                <li><a href="{{ route('inputUser.halPeng') }}">Lapor Giat</a></li>
                <li><a href="{{ route('profMatc.rankUser') }}">Ranking</a></li>
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
