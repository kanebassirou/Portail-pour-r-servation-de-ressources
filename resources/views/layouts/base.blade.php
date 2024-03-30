<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
        <meta name="copyright" content="MACode ID, https://macodeid.com/">
      
        <title>Portail de resservation de ressource</title>
      
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        
        <link rel="stylesheet" href="../assets/css/maicons.css">
      
        <link rel="stylesheet" href="../assets/vendor/animate/animate.css">
      
        <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
      
        <link rel="stylesheet" href="../assets/vendor/fancybox/css/jquery.fancybox.css">
      
        <link rel="stylesheet" href="../assets/css/theme.css">
      
    </head>
    <body>
      {{-- <div class="back-to-top"></div> --}}

        @include('layouts.nav')
        <main>
            @yield('content')
        </main>

        <footer>
            <footer class="page-footer">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-3 py-3">
                      <h3>Reve<span class="fg-primary">Tive.</span></h3>
                    </div>
                    <div class="col-lg-3 py-3">
                      <h5>Contact Information</h5>
                      <p>301 The Greenhouse, Custard Factory, London, E2 8DY.</p>
                      <p>Email: example@mail.com</p>
                      <p>Phone: +00 112323980</p>
                    </div>
                    <div class="col-lg-3 py-3">
                      <h5>Company</h5>
                      <ul class="footer-menu">
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Resources</a></li>
                        <li><a href="#">News & Feed</a></li>
                      </ul>
                    </div>
                    <div class="col-lg-3 py-3">
                      <h5>Newsletter</h5>
                      <form action="#">
                        <input type="text" class="form-control" placeholder="Enter your email">
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
                      </form>
                    </div>
                  </div>
            
                  <hr>
            
                  <div class="row mt-4">
                    <div class="col-md-6">
                      <p>Copyright 2020. This template designed by <a href="https://macodeid.com">MACode ID</a></p>
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

