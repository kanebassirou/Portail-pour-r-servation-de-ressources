<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>Portail de resservation de ressource</title>

    <link rel="stylesheet" href="{{ asset('../assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('../assets/css/maicons.css') }}">

    <link rel="stylesheet" href="{{ asset('../assets/vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('../assets/vendor/owl-carousel/css/owl.carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('../assets/vendor/fancybox/css/jquery.fancybox.css') }}">

    <link rel="stylesheet" href="{{ asset('../assets/css/theme.css') }}">

</head>

<body>
    {{-- <div class="back-to-top"></div> --}}

    @include('layouts.nav')
    <main>
        @yield('content')
    </main>

    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 py-3">
                    <h3>Portail<span class="fg-primary">Reservation.</span></h3>
                </div>
                <div class="col-lg-3 py-3">
                    <h5>Contact Information</h5>
                    <p> 123 Rue de l'Université Iba Der Thiam UFR SET, Thiès, Senegal</p>
                    <p>Email: contact@ufrset.edu </p>
                    <p>Téléphone: +33 900 12 33</p>
                </div>
                <div class="col-lg-3 py-3">
                    <h5>Explore</h5>
                    <ul class="footer-menu">
                        <li><a href="#">À Propos</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 py-3">
                    <h5>Donner votre Avis</h5>
                    <form action="#">
                        <input type="textera" class="form-control" placeholder="Donner votre Avis">
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Envoyer</button>
                    </form>
                </div>
            </div>

            <hr>

            <div class="row mt-4">
                <div class="col-md-6">
                    <p>Copyright 2023. Bassirou §§ Ablaye <a href="#">PFC</a></p>
                </div>
                <div class="col-md-6 text-right">
                    <div class="sosmed-button">
                        <a href="#"><span class="mai-logo-facebook-f"></span></a>
                        <a href="#"><span class="mai-logo-twitter"></span></a>
                        <a href="#"><span class="mai-logo-youtube"></span></a>
                        <a href="#"><span class="mai-logo-linkedin"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    </footer>



    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>

    <script src="../assets/vendor/isotope/isotope.pkgd.min.js"></script>

    <script src="../assets/js/google-maps.js"></script>

    <script src="../assets/js/theme.js"></script>
</body>

</html>
