<header>
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="d-inline-block">
                        <span class="mai-mail fg-primary"></span> <a href="mailto:directeur-set@univ-thies.sn">directeur-set@univ-thies.sn</a>
                    </div>
                    <div class="d-inline-block ml-2">
                        <span class="mai-globe fg-primary"></span> <a href="https://ufrset.univ-thies.sn/" target="_blank">Site officiel de l'UFR SET</a>
                    </div>

                </div>
                <div class="col-md-4 text-right d-none d-md-block">
                    <div class="social-mini-button">
                        <a href="#"><span class="mai-logo-facebook-f"></span></a>
                        <a href="#"><span class="mai-logo-twitter"></span></a>
                        <a href="#"><span class="mai-logo-youtube"></span></a>
                        <a href="#"><span class="mai-logo-linkedin"></span></a>
                    </div>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .top-bar -->

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a href="#index.html" class="navbar-brand">
                <img src="{{ asset('../assets/img/logoSET.jpeg') }}" alt="Logo" style="width: 55px; height: auto;">

                Notre <span class="text-primary">Portail Reservation
                    Ressource .</span></a>

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto pt-3 pt-lg-0">
                    <li class="nav-item">
                        <a href="{{ route('ressources.index') }}" class="nav-link active">Acceuil</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('reservations.all') }}" class="nav-link active">Mes Réservations</a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('catalogue.ressources') }}" class="nav-link">Catologue</a>
                    </li>
                    @if (auth()->check() && auth()->user()->hasRole('user'))
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">Compte</a>
                        </li>
                    @endif
                    </li>
                       @if (auth()->check() && auth()->user()->hasRole('admin'))
                        <li class="nav-item active">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">Espace Admin</a>
                        </li>
                    @endif
                    @if (auth()->check())
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link active"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endif



                </ul>
            </div>
        </div> <!-- .container -->
    </nav> <!-- .navbar -->

    <div class="page-banner bg-img bg-img-parallax overlay-dark"
        style="background-image: url({{ asset('../assets/img/bg_image_3.jpg') }});">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-lg-8">
                    {{-- <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0">
                <li class="breadcrumb-item"><a href="index.html">Bienvenue</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dans notre Portail</li>
              </ol>
            </nav> --}}
                    @yield('breadcrumb')
                    {{-- <h1 class="fg-white text-center">Faite vos réservation de ressources</h1> --}}
                </div>
            </div>
        </div>
    </div> <!-- .page-banner -->
</header>
