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

    <footer class="page-footer bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4 class="text-uppercase">Portail<span class="text-primary">Reservation</span></h4>
                    <p class="mt-3">Facilitez la gestion et la réservation des ressources au sein de l'UFR SET.</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="text-uppercase">Contact Informations</h5>
                    <ul class="list-unstyled mt-3">
                        <li>Université Iba Der Thiam de Thiès – UFR SET</li>
                        <li>VCN - Boite Postale : 967 Thiès</li>
                        <li>E-mail : <a href="mailto:directeur-set@univ-thies.sn" class="text-primary">directeur-set@univ-thies.sn</a></li>
                        <li>Site Web : <a href="https://ufrset.univ-thies.sn/" target="_blank" class="text-primary">ufrset.univ-thies.sn</a></li>
                        <li><a href="https://www.uidt.sn/" target="_blank" class="text-primary">www.uidt.sn</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="text-uppercase">Donner votre Avis</h5>
                    <form action="#" class="mt-3">
                        <textarea class="form-control mb-2" rows="3" placeholder="Donner votre Avis"></textarea>
                        <button type="submit" class="btn btn-primary btn-sm">Envoyer</button>
                    </form>
                </div>
            </div>

            <hr class="border-secondary">

            <div class="row mt-4 align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">Copyright © Université Iba Der Thiam de Thiès - UFR SET</p>
                </div>
                <div class="col-md-6 text-md-right">
                    <div class="social-buttons">
                        <a href="#" class="text-white mx-2"><span class="mai-logo-facebook-f"></span></a>
                        <a href="#" class="text-white mx-2"><span class="mai-logo-twitter"></span></a>
                        <a href="#" class="text-white mx-2"><span class="mai-logo-youtube"></span></a>
                        <a href="#" class="text-white mx-2"><span class="mai-logo-linkedin"></span></a>
                    </div>
                </div>
            </div>
        </div>
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
