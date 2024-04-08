@extends('layouts.base')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center py-2">
            <li class="breadcrumb-item"><a href="index.html" style="color: #007bff;">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: #6c757d;">Explorer nos ressources</li>
        </ol>
    </nav>
        <h1 class="fg-white text-center">Bienvenue sur notre plateforme de réservation</h1>

@endsection


@section('content')
    <!-- Your content here -->
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            {{-- Message d'erreur --}}
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    @endif

    <div class="container mt-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading text-center">Bienvenue!</h4>
            <p class="text-center">Commencez dès maintenant à planifier vos réservations. Utilisez le formulaire ci-dessous pour trouver les ressources disponibles selon vos besoins.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Recherche de Ressources</div>
                    <div class="card-body">
                        <form action="{{ route('search') }}" method="GET">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" id="date" name="date" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="heure_debut">Heure de début</label>
                                <input type="time" id="heure_debut" name="heure_debut" class="form-control" required>

                                <label for="heure_fin">Heure de fin</label>
                                <input type="time" id="heure_fin" name="heure_fin" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="resource">Type de ressource</label>
                                <select id="resource" name="resource" class="form-control" required>
                                    <option value="">Sélectionnez une ressource</option>
                                    <option value="1">Salle de classe</option>
                                    <option value="2">Rallonge</option>
                                    <option value="3">Vidéoprojecteur</option>
                                    <option value="4">Cable</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Rechercher</button>
                        </form>
                    </div>
                </div>
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
                            @foreach ($salleClasses as $salleClasse)
                                <div class="card-testimonial">
                                    <div class="content">
                                        Capacité : {{ $salleClasse->capacite }}<br>
                                        Numéro : {{ $salleClasse->numero_salle }}<br>
                                        Description : {{ $salleClasse->description }}<br>
                                        État : {{ $salleClasse->etatRessource }}
                                    </div>
                                    <div class="d-inline-block ml-2">
                                        <div class="author-name">Salle de Classe</div>
                                        <div class="author-info">{{ $salleClasse->numero_salle }}</div>
                                    </div>
                                    {{-- <div class="author"> --}}
                                    {{-- <div class="avatar"> --}}
                                    <img src="data:image/jpeg;base64,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"
                                        alt="">
                                    <!-- Assurez-vous que l'icône est correctement référencée -->
                                    {{-- </div> --}}

                                    {{-- </div> --}}
                                    <div class="reservation-button">
                                        <a href="{{ route('reservationSalleClasse.create', ['id' => $salleClasse->id]) }}"
                                            class="btn btn-primary mt-3">Réserver</a>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Rallonges -->
                            @foreach ($rallonges as $rallonge)
                                <div class="card-testimonial">
                                    <div class="content">
                                        Description : {{ $rallonge->Description }}<br>
                                        Type de prise : {{ $rallonge->typeDePrise }}<br>
                                        Longueur : {{ $rallonge->longueur }}<br>
                                        Nombre de prises : {{ $rallonge->nombreDePrise }}
                                    </div>
                                    <div class="d-inline-block ml-2">
                                        <div class="author-name">Rallonge</div>
                                        <div class="author-info">{{ $rallonge->typeDePrise }}</div>
                                    </div>
                                    {{-- <div class="author"> --}}
                                    {{-- <div class="avatar"> --}}
                                    <img src="data:image/jpeg;base64,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"
                                        alt="">
                                    <!-- Assurez-vous que l'icône est correctement référencée -->
                                    {{-- </div> --}}

                                    {{-- </div> --}}
                                    <div class="reservation-button">
                                        <a href="{{ route('reservationRallonge.create', ['id' => $rallonge->id]) }}"
                                            class="btn btn-primary">Réserver</a>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Câbles -->
                            @foreach ($cables as $cable)
                                <div class="card-testimonial">
                                    <div class="content">
                                        Longueur : {{ $cable->longueur }}<br>
                                        Connecteur : {{ $cable->Description }}
                                    </div>
                                    <div class="d-inline-block ml-2">
                                        <div class="author-name">Câblelate</div>
                                        <div class="author-info">{{ $cable->nomRessource }}</div>
                                    </div>
                                    {{-- <div class="author">
                                        <div class="avatar"> --}}
                                    <img src="https://th.bing.com/th/id/OIP.0F1dCCaCYDkuGnWRpWDc1gHaFT?rs=1&pid=ImgDetMain"
                                        alt="">
                                    <!-- Assurez-vous que l'icône est correctement référencée -->
                                    {{-- </div> --}}

                                    {{-- </div> --}}
                                    <div class="reservation-button">
                                        <a href="{{ route('reservationCable.create', ['id' => $cable->id]) }}"
                                            class="btn btn-primary">Réserver</a>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Vidéoprojecteurs -->
                            @foreach ($videoProjecteurs as $videoProjecteur)
                                <div class="card-testimonial">
                                    <div class="content">
                                        Nom : {{ $videoProjecteur->nomVideoProjecteur }}<br>
                                        Modèle : {{ $videoProjecteur->modele }}<br>
                                        Résolution : {{ $videoProjecteur->resolution }}
                                    </div>
                                    <div class="d-inline-block ml-2">
                                        <div class="author-name">Vidéoprojecteur</div>
                                        <div class="author-info">{{ $videoProjecteur->nomRessource }}</div>
                                    </div>
                                    {{-- <div class="author">
                                        <div class="avatar"> --}}
                                    <img src="data:image/jpeg;base64,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"
                                        alt="">
                                    <!-- Assurez-vous que l'icône est correctement référencée -->
                                    {{-- </div> --}}

                                    {{-- </div> --}}
                                    <div class="reservation-button">
                                        <a href="{{ route('reservationProjecteur.create', ['id' => $videoProjecteur->id]) }}"
                                            class="btn btn-primary">Réserver</a>
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
