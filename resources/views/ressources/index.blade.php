@extends('layouts.base')


@section('content')
  <!-- Your content here -->
      @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>

@endif

    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="/search" method="GET">
          <div class="form-group">

            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control">
          </div>
          <div class="form-group">
            <label for="heure_debut">Heure début:</label>
            <input type="time" id="heure_debut" name="heure_debut" class="form-control">

            <label for="heure_fin">Heure Fin:</label>
            <input type="time" id="heure_fin" name="heure_fin" class="form-control">

          </div>
          <div class="form-group">
            <label for="resource">Ressource:</label>
            <select id="resource" name="resource" class="form-control">
              <option value="">Sélectionner une ressource</option>
              <option value="1">Salle de classe</option>
              <option value="2">Rallonge</option>
              <option value="3">VideoProjecteur</option>
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
              <h2 class="subhead">Voici les ressources disponibles</h2>
          </div>
          <div class="page-section">
            <div class="container">
              <div class="owl-carousel testimonial-carousel">
                <!-- Salles de classe -->
                @foreach($salleClasses as $salleClasse)
                <div class="card-testimonial">
                  <div class="content">
                    Capacité : {{ $salleClasse->capacite }}<br>
                    Numéro : {{ $salleClasse->numero_salle }}<br>
                    Description : {{ $salleClasse->description }}<br>
                    État : {{ $salleClasse->etatRessource }}
                  </div>
                  <div class="author">
                    <div class="avatar">
                      <img src="../assets/img/icons/classroom.png" alt=""> <!-- Assurez-vous que l'icône est correctement référencée -->
                    </div>
                    <div class="d-inline-block ml-2">
                      <div class="author-name">Salle de Classe</div>
                      <div class="author-info">{{ $salleClasse->numero_salle }}</div>
                    </div>
                  </div>
                  <div class="reservation-button">
                    <a href="{{ route('reservation.create', ['nomRessource' => $salleClasse->nomRessource]) }}" class="btn btn-primary">Réserver</a>
                 </div>
                </div>
                @endforeach

                <!-- Rallonges -->
                @foreach($rallonges as $rallonge)
                <div class="card-testimonial">
                  <div class="content">
                    Description : {{ $rallonge->Description }}<br>
                    Type de prise : {{ $rallonge->typeDePrise }}<br>
                    Longueur : {{ $rallonge->longueur }}<br>
                    Nombre de prises : {{ $rallonge->nombreDePrise }}
                  </div>
                  <div class="author">
                    <div class="avatar">
                      <img src="../assets/img/icons/extension_cord.png" alt=""> <!-- Assurez-vous que l'icône est correctement référencée -->
                    </div>
                    <div class="d-inline-block ml-2">
                      <div class="author-name">Rallonge</div>
                      <div class="author-info">{{ $rallonge->typeDePrise }}</div>
                    </div>
                  </div>
                  <div class="reservation-button">
                    <a href="{{ route('reservation.create', ['nomRessource' => $salleClasse->nomRessource]) }}" class="btn btn-primary">Réserver</a>
                 </div>
                </div>
                @endforeach

                <!-- Câbles -->
                @foreach($rallonges as $cable)
                <div class="card-testimonial">
                  <div class="content">
                    Type : {{ $cable->type }}<br>
                    Longueur : {{ $cable->longueur }}<br>
                    Connecteur : {{ $cable->connecteur }}
                  </div>
                  <div class="author">
                    <div class="avatar">
                      <img src="../assets/img/icons/cable.png" alt=""> <!-- Assurez-vous que l'icône est correctement référencée -->
                    </div>
                    <div class="d-inline-block ml-2">
                      <div class="author-name">Câble</div>
                      <div class="author-info">{{ $cable->type }}</div>
                    </div>
                  </div>
                  <div class="reservation-button">
                    <a href="{{ route('reservation.create', ['nomRessource' => $salleClasse->nomRessource]) }}" class="btn btn-primary">Réserver</a>
                 </div>
                </div>
                @endforeach

                <!-- Vidéoprojecteurs -->
                @foreach($videoProjecteurs as $videoProjecteur)
                <div class="card-testimonial">
                  <div class="content">
                    Nom : {{ $videoProjecteur->nomVideoProjecteur }}<br>
                    Modèle : {{ $videoProjecteur->modele }}<br>
                    Résolution : {{ $videoProjecteur->resolution }}
                  </div>
                  <div class="author">
                    <div class="avatar">
                      <img src="../assets/img/icons/projector.png" alt=""> <!-- Assurez-vous que l'icône est correctement référencée -->
                    </div>
                    <div class="d-inline-block ml-2">
                      <div class="author-name">Vidéoprojecteur</div>
                      <div class="author-info">{{ $videoProjecteur->nomVideoProjecteur }}</div>
                    </div>
                  </div>
                  <div class="reservation-button">
                    <a href="{{ route('reservation.create', ['nomRessource' => $salleClasse->nomRessource]) }}" class="btn btn-primary">Réserver</a>
                 </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>





        {{-- <div class="page-section">
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
        </div> <!-- .page-section --> --}}
        @endsection



</body>
</html>
