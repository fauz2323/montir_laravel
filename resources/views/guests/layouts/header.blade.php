<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto">
            <h1><a href="index.html">Bengkelin</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto" href="#hero">Beranda</a>
                </li>
                <li><a class="nav-link scrollto" href="#about">Tentang</a>
                </li>
                <li><a class="nav-link scrollto" href="#testimonials">Testimoni</a></li>
                {{-- <li class="dropdown"   href="#"><span>Layanan Kami</span> <i class="bi bi-chevron-down"></i></>
            <ul>
            <li><a href="#">Katalog Sparepart</a></li>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
                <li><a class="nav-link scrollto" href="#contact">Kontak</a>
                </li>
            </ul>
            <ul>
                @auth
                    <li>
                        <a class="nav-link scrollto" href="/adm"<i
                            class="bi bi-arrow-right-square"></i>{{ auth()->user()->name }}</a>
                    </li>
                @else
                    <li>
                        <a class="nav-link scrollto" href="/login"<i class="bi bi-arrow-right-square"></i>Log-in</a>
                    </li>
                    <li><a class="nav-link scrollto" href="/register"<i class="bi bi-arrow-right-square"></i>Sign-in</a></li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <div class="header-social-links d-flex align-items-center">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>

    </div>
</header>
