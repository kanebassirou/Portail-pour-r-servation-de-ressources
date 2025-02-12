@extends('layouts.base')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center py-2">
            <li class="breadcrumb-item"><a href="{{ route('ressources.index') }}" style="color: #007bff;">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: #6c757d;">Explorer nos ressources</li>
        </ol>
    </nav>
    <h1 class="fg-white text-center">Bienvenue sur la plateforme de réservation de ressources de l'UFR SET</h1>
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
        <div class="alert alert-btn btn-primary" role="alert">
            <h1 class="alert-heading text-center">Bienvenue!</h1>
            <h3 class="text-center"> Commencez dès maintenant à planifier vos réservations. Utilisez le formulaire ci-dessous
                pour trouver les ressources disponibles selon vos besoins .</h3>
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
                                    <option value="5">Laboratoire</option>
                                    <option value="6">Salle de Reunion</option>
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
                                    <img src="{{ asset('assets/img/salle de classe.jpeg') }}"
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
                                    <img src="{{ asset('assets/img/rallonge.jpeg') }}"
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
                                    <img src="{{ asset("assets/img/cable1.jpeg") }}"
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
                                        Nom : {{ $videoProjecteur->nomRessource }}<br>
                                        Modèle : {{ $videoProjecteur->modele }}<br>
                                        Résolution : {{ $videoProjecteur->resolution }}
                                    </div>
                                    <div class="d-inline-block ml-2">
                                        <div class="author-name">Vidéoprojecteur</div>
                                        <div class="author-info">{{ $videoProjecteur->nomRessource }}</div>
                                    </div>
                                    {{-- <div class="author">
                                        <div class="avatar"> --}}
                                    <img src="{{ asset('assets/img/projecteur.jpeg') }}"
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
                            {{-- Laboratoire --}}

                            @foreach ($laboratoires as $laboratoire)
                                <div class="card-testimonial">
                                    <div class="content">
                                        Nom : {{ $laboratoire->nomLaboratoire }}<br>
                                        Capacite : {{ $laboratoire->capacite }}
                                    </div>
                                    <div class="d-inline-block ml-2">
                                        <div class="author-name">Laboratoire</div>
                                        <div class="author-info">{{ $laboratoire->nomRessource }}</div>
                                    </div>
                                    {{-- <div class="author">
                                        <div class="avatar"> --}}
                                    <img src="{{ asset('assets/img/lobo.jpeg') }}"
                                        alt="">
                                    <!-- Assurez-vous que l'icône est correctement référencée -->
                                    {{-- </div> --}}

                                    {{-- </div> --}}
                                    <div class="reservation-button">
                                        <a href="{{ route('reservationLaboratoire.create', ['id' => $laboratoire->id]) }}"
                                            class="btn btn-primary">Réserver</a>
                                    </div>
                                </div>
                            @endforeach

                            {{-- Laboratoire --}}

                            @foreach ($salleReunions as $salleReunion)
                                <div class="card-testimonial">
                                    <div class="content">
                                        Nom : {{ $salleReunion->nomRessource }}<br>
                                        Capacite : {{ $salleReunion->capacite }}
                                    </div>
                                    <div class="d-inline-block ml-2">
                                        <div class="author-name">salleReunion</div>
                                        <div class="author-info">{{ $salleReunion->nomRessource }}</div>
                                    </div>
                                    {{-- <div class="author">
                                        <div class="avatar"> --}}
                                    <img src="{{ asset('assets/img/salleReunonSet.avif') }}"
                                        alt="">
                                    <!-- Assurez-vous que l'icône est correctement référencée -->
                                    {{-- </div> --}}

                                    {{-- </div> --}}
                                    <div class="reservation-button">
                                        <a href="{{ route('reservationSalleReunion.create', ['id' => $salleReunion->id]) }}"
                                            class="btn btn-primary">Réserver</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>






            @endsection



            </body>

            </html>
