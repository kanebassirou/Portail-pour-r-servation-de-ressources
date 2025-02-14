<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">
    <meta name="description" content="Portail de réservation de ressources pour l'Université Iba Der Thiam UFR SET, Thiès, Senegal.">
    <meta name="keywords" content="réservation, ressources, université, Thiès, Sénégal, UFR SET">
    <meta name="author" content="Bassirou Kane">
    <title>RRSET - Portail de réservation de ressource</title>

     <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('../assets/css/maicons.css') }}">

    <link rel="stylesheet" href="{{ asset('../assets/vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('../assets/vendor/owl-carousel/css/owl.carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('../assets/vendor/fancybox/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" href="{{ asset('../assets/css/theme.css') }}">
    <link rel="icon" href="{{ asset('assets/img/logoSET.jpeg') }}" type="image/jpeg">



</head>
{{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        const filterButtons = document.querySelectorAll(".filter-button");
        const resourceItems = document.querySelectorAll(".filter");

        filterButtons.forEach(button => {
            button.addEventListener("click", function () {
                // Supprimer la classe 'active' de tous les boutons
                filterButtons.forEach(btn => btn.classList.remove("active"));
                this.classList.add("active");

                const filterValue = this.getAttribute("data-filter");

                resourceItems.forEach(item => {
                    if (filterValue === "all" || item.classList.contains(filterValue)) {
                        item.style.display = "block"; // Afficher
                    } else {
                        item.style.display = "none"; // Masquer
                    }
                });
            });
        });
    });
</script> --}}


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


     <script src="{{ asset('assets/js/filter.js') }}"></script>

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
