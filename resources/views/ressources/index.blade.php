@extends('layouts.base')

@section('content')
  <!-- Your content here -->

    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="/search" method="GET">
          <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" class="form-control">
          </div>
          <div class="form-group">
            <label for="time">Heure:</label>
            <input type="time" id="time" name="time" class="form-control">
          </div>
          <div class="form-group">
            <label for="resource">Ressource:</label>
            <select id="resource" name="resource" class="form-control">
              <option value="">Sélectionner une ressource</option>
              <option value="Salle classe">Salle de classe</option>
              <option value="Rallonge">Rallonge</option>
              <option value="VideoProjecteur">VideoProjecteur</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
      </div>
    </div>
        
        <div class="page-section">
          <div class="container">
            <div class="text-center">
              <div class="subhead">Nos ressources</div>
              <h2 class="title-section">Voici les ressources disponible</h2>
            </div>
    
        @foreach($salleClasses as $salleClasse)
          <p> la capacite du salle est {{ $salleClasse->capacite }}</p>
          <p>numero du salle {{ $salleClasse->numero_salle }}</p>
          <p>numero du salle {{ $salleClasse->numero_salle }}</p>
          <p>numero du salle {{ $salleClasse->Description }}</p>
          <H5> {{ $salleClasse->Etat}} </H5> 
        @endforeach
    
      </div>
    </div>
            
          </div> <!-- .container -->
        </div> <!-- .page-section -->
    
        <!-- Testimonials -->
        <div class="page-section">
          <div class="container">
            <div class="owl-carousel testimonial-carousel">
              <div class="card-testimonial">
                <div class="content">
                  The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph
                </div>
                <div class="author">
                  <div class="avatar">
                    <img src="../assets/img/person/person_1.jpg" alt="">
                  </div>
                  <div class="d-inline-block ml-2">
                    <div class="author-name">Sam Watson</div>
                    <div class="author-info">CEO - Mosh Elite Ltd.</div>
                  </div>
                </div>
              </div>
    
              <div class="card-testimonial">
                <div class="content">
                  The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph
                </div>
                <div class="author">
                  <div class="avatar">
                    <img src="../assets/img/person/person_2.jpg" alt="">
                  </div>
                  <div class="d-inline-block ml-2">
                    <div class="author-name">Edinson Alfa</div>
                    <div class="author-info">CEO - Mosh Elite Ltd.</div>
                  </div>
                </div>
              </div>
    
              <div class="card-testimonial">
                <div class="content">
                  The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph
                </div>
                <div class="author">
                  <div class="avatar">
                    <img src="../assets/img/person/person_3.jpg" alt="">
                  </div>
                  <div class="d-inline-block ml-2">
                    <div class="author-name">May Halloway</div>
                    <div class="author-info">CEO - Mosh Elite Ltd.</div>
                  </div>
                </div>
              </div>
    
              <div class="card-testimonial">
                <div class="content">
                  The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph
                </div>
                <div class="author">
                  <div class="avatar">
                    <img src="../assets/img/person/person_1.jpg" alt="">
                  </div>
                  <div class="d-inline-block ml-2">
                    <div class="author-name">Sam Watson</div>
                    <div class="author-info">CEO - Mosh Elite Ltd.</div>
                  </div>
                </div>
              </div>
    
              <div class="card-testimonial">
                <div class="content">
                  The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph
                </div>
                <div class="author">
                  <div class="avatar">
                    <img src="../assets/img/person/person_2.jpg" alt="">
                  </div>
                  <div class="d-inline-block ml-2">
                    <div class="author-name">Edinson Alfa</div>
                    <div class="author-info">CEO - Mosh Elite Ltd.</div>
                  </div>
                </div>
              </div>
    
              <div class="card-testimonial">
                <div class="content">
                  The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph
                </div>
                <div class="author">
                  <div class="avatar">
                    <img src="../assets/img/person/person_3.jpg" alt="">
                  </div>
                  <div class="d-inline-block ml-2">
                    <div class="author-name">May Halloway</div>
                    <div class="author-info">CEO - Mosh Elite Ltd.</div>
                  </div>
                </div>
              </div>
    
            </div> <!-- .row -->
          </div> <!-- .container -->
        </div> <!-- .page-section -->
    
        <div class="page-section">
          <div class="container-fluid">
            <div class="row row-cols-md-3 row-cols-lg-5 justify-content-center text-center">
              <div class="py-3 px-5">
                <img src="../assets/img/clients/airbnb.png" alt="">
              </div>
              <div class="py-3 px-5">
                <img src="../assets/img/clients/google.png" alt="">
              </div>
              <div class="py-3 px-5">
                <img src="../assets/img/clients/mailchimp.png" alt="">
              </div>
              <div class="py-3 px-5">
                <img src="../assets/img/clients/paypal.png" alt="">
              </div>
              <div class="py-3 px-5">
                <img src="../assets/img/clients/stripe.png" alt="">
              </div>
            </div>
          </div> <!-- .container-fluid -->
        </div> <!-- .page-section -->

    
@endsection

</body>
</html>