@extends('layouts.base')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0">
            <li class="breadcrumb-item"><a href="{{ route('reservations.all') }}">Disponible</a></li>
            <li class="breadcrumb-item active" aria-current="page">Recherche</li>
        </ol>
    </nav>
    <h1 class="fg-white text-center">les ressources qui sont pas encore reservés</h1>
@endsection
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2> Voici les {{ $results[0]->nomRessource }} disponibles pour :</h2>
            </div>
            <div class="card-body">
                <p>Date: {{ $searchParams['date'] }}</p>
                <p>Ressource: {{ $results[0]->nomRessource }}</p>
                <p>Période: de {{ $searchParams['heure_debut'] }} à {{ $searchParams['heure_fin'] }}</p>
            </div>
        </div>
        @if ($results->isEmpty())
            <p>Aucune ressource trouvée.</p>
        @else
            <div class="list-group">
                @foreach ($results as $result)
                    @switch($result->nomRessource)
                        @case('salle de classe')
                            <a href="#" class="list-group-item list-group-item-action">
                                <strong>Numero du salle:</strong> {{ $result->id }}<br>
                                <strong>Description:</strong> {{ $result->description }}<br>
                                <strong>Capacité:</strong> {{ $result->capacite }}

                            <form action="{{ route('reservationSalleClasse.store', ['id' => $result->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="SalleClasse_ID" value="{{ $result->id }}">
                                <input type="hidden" name="Utilisateur_ID" value="{{ auth()->id() }}">
                                <input type="hidden" name="date_de_reservation" value="{{ $searchParams['date'] }}">
                                <input type="hidden" name="heure_de_debut" value="{{ $searchParams['heure_debut'] }}">
                                <input type="hidden" name="heure_de_fin" value="{{ $searchParams['heure_fin'] }}">
                                <button type="submit" class="btn btn-primary mt-5">Réserver</button>
                            </form>
                             </a>
                            @break

                        @case('Rallonge')
                            <a href="#" class="list-group-item list-group-item-action">
                                <strong>Nom de la ressource:</strong> {{ $result->nomRessource }}<br>
                                <strong>Description:</strong> {{ $result->description }}<br>
                                <strong>Longueur:</strong> {{ $result->longueur }}<br>
                                <strong>Longueur:</strong> {{ $result->typeDePrise }}

                            <form action="{{ route('reservationRallonge.store', ['id' => $result->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="Rallonge_ID" value="{{ $result->id }}">
                                <input type="hidden" name="Utilisateur_ID" value="{{ auth()->id() }}">
                                <input type="hidden" name="date_de_reservation" value="{{ $searchParams['date'] }}">
                                <input type="hidden" name="heure_de_debut" value="{{ $searchParams['heure_debut'] }}">
                                <input type="hidden" name="heure_de_fin" value="{{ $searchParams['heure_fin'] }}">
                                <button type="submit" class="btn btn-primary mt-5">Réserver</button>
                            </form>
                             </a>
                            @break

                        @case('Cable')
                            <a href="#" class="list-group-item list-group-item-action">
                                <strong>Nom de la ressource:</strong> {{ $result->nomRessource }}<br>
                                <strong>Description:</strong> {{ $result->description }}<br>
                                <strong>Longueur:</strong> {{ $result->longueur }}<br>
                                <strong>type de prise:</strong> {{ $result->typeDeCable }}<br>



                            <form action="{{ route('reservationCable.store', ['id' => $result->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="Cable_ID" value="{{ $result->id }}">
                                <input type="hidden" name="Utilisateur_ID" value="{{ auth()->id() }}">
                                <input type="hidden" name="date_de_reservation" value="{{ $searchParams['date'] }}">
                                <input type="hidden" name="heure_de_debut" value="{{ $searchParams['heure_debut'] }}">
                                <input type="hidden" name="heure_de_fin" value="{{ $searchParams['heure_fin'] }}">
                                <button type="submit" class="btn btn-primary mt-5">Réserver</button>
                            </form>
                             </a>
                            @break

                        @case('Projecteur')
                            <a href="#" class="list-group-item list-group-item-action">
                                <strong>Nom de la ressource:</strong> {{ $result->nomRessource }}<br>
                                <strong>Description:</strong> {{ $result->description }}<br>
                                <strong>MODELE:</strong> {{ $result->modele }}<br>
                                <strong>Résolution:</strong> {{ $result->resolution }}<br>

                            <form action="{{ route('reservationProjecteur.store', ['id' => $result->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="Projecteur_ID" value="{{ $result->id }}">
                                <input type="hidden" name="Utilisateur_ID" value="{{ auth()->id() }}">
                                <input type="hidden" name="date_de_reservation" value="{{ $searchParams['date'] }}">
                                <input type="hidden" name="heure_de_debut" value="{{ $searchParams['heure_debut'] }}">
                                <input type="hidden" name="heure_de_fin" value="{{ $searchParams['heure_fin'] }}">
                                <button type="submit" class="btn btn-primary mt-5">Réserver</button>
                            </form>
                             </a>
                            @break
                    @endswitch
                @endforeach
            </div>
        @endif
    </div>
    <div class="mt-5"></div>
@endsection
