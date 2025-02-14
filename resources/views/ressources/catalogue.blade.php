@extends('layouts.base')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center py-2 bg-light">
            <li class="breadcrumb-item"><a href="{{ route('ressources.index') }}" class="text-decoration-none text-primary">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: #6c757d;">Catalogue des Ressources</li>
        </ol>
    </nav>
    <h1 class="fg-white text-center">Catalogue des Ressources</h1>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-lg-12 text-center">
                <h2 class="display-5 text-muted mb-4">Découvrez nos ressources disponibles</h2>
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h3 class="card-title text-primary">Salles de classe</h3>
                                <p class="card-text text-secondary">Nombre total : 21 salles</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h3 class="card-title text-primary">Laboratoires</h3>
                                <p class="card-text text-secondary">Nombre total : 3 laboratoires spécialisés</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h3 class="card-title text-primary">Équipement audiovisuel</h3>
                                <p class="card-text text-secondary">Vidéoprojecteurs : 19</p>
                                <p class="card-text text-secondary">Rallonges : 19</p>
                                <p class="card-text text-secondary">Câbles : 19</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h3 class="card-title text-primary">Accessoires</h3>
                                <p class="card-text text-secondary">Marqueurs et effaceurs en quantité suffisante</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row mb-5">
        <div class="col-lg-12 text-center">
            <h2 class="display-5 text-muted mb-4">Découvrez nos ressources</h2>
            <!-- Filtres -->
            <div class="btn-group mb-4" role="group" aria-label="Filtres des ressources">
                <button type="button" class="btn btn-outline-primary filter-button active" data-filter="all">Tout afficher</button>
                <button type="button" class="btn btn-outline-primary filter-button" data-filter="salleClasse">Salles de classe</button>
                <button type="button" class="btn btn-outline-primary filter-button" data-filter="rallonge">Rallonges</button>
                <button type="button" class="btn btn-outline-primary filter-button" data-filter="videoProjecteur">Vidéoprojecteurs</button>
                <button type="button" class="btn btn-outline-primary filter-button" data-filter="cable">Câbles</button>
                <button type="button" class="btn btn-outline-primary filter-button" data-filter="salleReunion">Salle de réunion</button>
            </div>
        </div>
    </div>

    <!-- Contenu filtré -->
    <div class="row" id="ressources-container">
        <!-- Salles de classe -->
        @foreach ($salleClasses as $salleClasse)
            <div class="col-md-4 mb-4 filter salleClasse animate__animated animate__fadeIn">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('assets/img/salle de classe.jpeg') }}" class="card-img-top" alt="Salle de Classe">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $salleClasse->nomRessource }}</h5>
                        <p class="card-text text-secondary">Capacité : {{ $salleClasse->capacite }}</p>
                        <a href="#" class="btn btn-primary">Réserver</a>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Rallonges -->
        @foreach ($rallonges as $rallonge)
            <div class="col-md-4 mb-4 filter rallonge animate__animated animate__fadeIn">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('assets/img/rallonge.jpeg') }}" class="card-img-top" alt="Rallonge">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Rallonge - {{ $rallonge->type }}</h5>
                        <p class="card-text text-secondary">Longueur : {{ $rallonge->longueur }}</p>
                        <a href="#" class="btn btn-primary">Réserver</a>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Vidéoprojecteurs -->
        @foreach ($videoProjecteurs as $videoProjecteur)
            <div class="col-md-4 mb-4 filter videoProjecteur animate__animated animate__fadeIn">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('assets/img/videoProjecteur.jpeg') }}" class="card-img-top" alt="Vidéoprojecteur">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $videoProjecteur->nomRessource }}</h5>
                        <p class="card-text text-secondary">Modèle : {{ $videoProjecteur->modele }}</p>
                        <p class="card-text text-secondary">Résolution : {{ $videoProjecteur->resolution }}</p>
                        <a href="#" class="btn btn-primary">Réserver</a>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Câbles -->
        @foreach ($cables as $cable)
            <div class="col-md-4 mb-4 filter cable animate__animated animate__fadeIn">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('assets/img/cable1.jpeg') }}" class="card-img-top" alt="Câble">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Câble - {{ $cable->type }}</h5>
                        <p class="card-text text-secondary">Longueur : {{ $cable->longueur }}</p>
                        <a href="#" class="btn btn-primary">Réserver</a>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Salle de réunion -->
        <div class="col-md-4 mb-4 filter salleReunion animate__animated animate__fadeIn">
            <div class="card border-0 shadow-sm h-100">
                <img src="{{ asset('assets/img/salleReunonSet.avif') }}" class="card-img-top" alt="Salle de réunion">
                <div class="card-body">
                    <h5 class="card-title text-primary">Salle de réunion</h5>
                    <p class="card-text text-secondary">Nous avons une seule salle de réunion.</p>
                    <a href="#" class="btn btn-primary">Réserver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

