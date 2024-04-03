@extends('layouts.base')

@section('content')
    <div class="container">
        <h2>Résultats de la recherche</h2>
        @if($results->isEmpty())
            <p>Aucune ressource trouvée.</p>
        @else
            <div class="list-group">
                @foreach($results as $result)
                    <a href="#" class="list-group-item list-group-item-action">
                        {{ $result->nom }} <!-- Ajustez en fonction de votre structure de données -->
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection
