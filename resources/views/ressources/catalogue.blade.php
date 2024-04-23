@extends('layouts.base')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center py-2">
            <li class="breadcrumb-item"><a href="{{ route('ressources.index') }}" style="color: #007bff;">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: #6c757d;">Catalogue des Ressources</li>
        </ol>
    </nav>
    <h1 class="text-center">Catalogue des Ressources</h1>
@endsection

@section('content')
 <div class="container mt-5 text-center text-muted">
        <div class="row mb-3">
            <div class="col-lg-12">
                <h2 class="text-center text-muted">Découvrez nos ressources disponibles</h2>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-12">
                <h3>Salles de classe</h3>
                <p>Nombre total : 21 salles</p>
            </div>
            <div class="col-lg-12">
                <h3>Laboratoires</h3>
                <p>Nombre total : 3 laboratoires spécialisés</p>
            </div>
            <div class="col-lg-12">
                <h3>Équipement audiovisuel</h3>
                <p>Nombre total de vidéoprojecteurs : 19</p>
                <p>Nombre total de rallonges : 19</p>
                <p>Nombre total de câbles : 19</p>
            </div>
            <div class="col-lg-12">
                <h3>Accessoires</h3>
                <p>Marqueurs et effaceurs en quantité suffisante pour toutes les salles</p>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-lg-12">
                <h2 class="text-center text-muted">Découvrez qu'elle que image de nos ressources </h2>
            </div>
        </div>

        <div class="row mb-5 mt-4">
            <div class="col-lg-12">
                <h3>Salles de classe</h3>
                <div class="row">
                    @foreach ($salleClasses as $salleClasse)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/img/salle de classe.jpeg') }}" class="card-img-top" alt="Salle de Classe">
                            <div class="card-body">
                                <h5 class="card-title">{{ $salleClasse->nomRessource }}</h5>
                                <p class="card-text">Capacité : {{ $salleClasse->capacite }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-12">
                <h3>Rallonges</h3>
                <div class="row">
                    @foreach ($rallonges as $rallonge)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/img/rallonge.jpeg') }}" class="card-img-top" alt="Rallonge">
                            <div class="card-body">
                                <h5 class="card-title">Rallonge - {{ $rallonge->type }}</h5>
                                <p class="card-text">Longueur : {{ $rallonge->longueur }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-12">
                <h3>Vidéoprojecteurs</h3>
                <div class="row">
                    @foreach ($videoProjecteurs as $videoProjecteur)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/img/videoProjecteur.jpeg') }}" class="card-img-top" alt="Vidéoprojecteur">
                            <div class="card-body">
                                <h5 class="card-title">{{ $videoProjecteur->nomRessource }}</h5>
                                <p class="card-text">Modèle : {{ $videoProjecteur->modele }}</p>
                                <p class="card-text">Résolution : {{ $videoProjecteur->resolution }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h3>Câbles</h3>
                <div class="row">
                    @foreach ($cables as $cable)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/img/cable1.jpeg') }}" class="card-img-top" alt="Câble">
                            <div class="card-body">
                                <h5 class="card-title">Câble - {{ $cable->type }}</h5>
                                <p class="card-text">Longueur : {{ $cable->longueur }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
