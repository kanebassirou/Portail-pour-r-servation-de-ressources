@extends('layouts.base')

@section('content')
    <div class="container mt-5">
        <h2>Ressources Disponible </h2>
        @if($results->isEmpty())
            <p>Aucune ressource trouvée.</p>
        @else
            <div class="list-group">
                @foreach($results as $result)
                <a href="#" class="list-group-item list-group-item-action">
                    <strong>Nom de la ressource:</strong> {{ $result->nomRessource }}<br>
                    <strong>Description:</strong> {{ $result->description }}<br>
                    <strong>Capacité:</strong> {{ $result->capacite }}<br>
                </a>
                <form action="{{ route('reservationSalleClasse.store', ['nomRessource' => $result->nomRessource ]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="SalleClasse_ID" value="{{ $result->id }}">
                    <input type="hidden" name="Utilisateur_ID" value="{{ auth()->id() }}">
                    <input type="hidden" name="date_de_reservation" value="{{ $searchParams['date'] }}">

                    <input type="hidden" name="heure_de_debut" value="{{ $searchParams['heure_debut'] }}">
                    <input type="hidden" name="heure_de_fin" value="{{ $searchParams['heure_fin'] }}">

                    <button type="submit" class="btn btn-primary mt-5">Réserver</button>
                </form>

                @endforeach
            </div>
        @endif
    </div>
    <div class="mt-5"></div>
@endsection
