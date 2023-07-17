<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="{{ route('index.index') }}">RESCUE020</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a href="{{ route('index.index') }}">Home</a></li>
                <li><a href="{{ route('about.about') }}">About</a></li>
                <li><a href="{{ route('founder.founder') }}">Founders</a></li>
                <li><a href="{{ route('activity.activity') }}">Activity</a></li>

                <li class="dropdown"><a href="#"><span>Knowledge</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('knowledge.paramedis') }}">Paramedis</a></li>
                        <li><a href="{{ route('knowledge.evakuasi') }}">Evakuasi</a></li>
                        <li><a href="{{ route('knowledge.navigasi') }}">Mapping</a></li>
                        <li><a href="{{ route('knowledge.posko') }}">Posko Bencana</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('contact.contact') }}">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="{{ route('login') }}" class="get-started-btn">Login</a>

    </div>
</header>
