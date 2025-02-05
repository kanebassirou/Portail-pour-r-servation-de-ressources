{{-- resources/views/reservations/index.blade.php --}}

@extends('layouts.base')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center py-2">
            <li class="breadcrumb-item"><a href="#Mes reservation" style="color: #007bff;">Réservation</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: #6c757d;">Voir mes réservations</li>
        </ol>
    </nav>
    <h1 class="fg-white text-center">Toutes vos réservations pour les différentes ressources</h1>
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center" style="color: #007bff;">Mes Réservations</h1>
        @if ($sallesClasses->isEmpty() && $rallonges->isEmpty() && $cables->isEmpty() && $projecteurs->isEmpty() && $laboratoires->isEmpty() && $sallesReunions->isEmpty())
            <div class="alert alert-info" role="alert">
                Vous n'avez aucune réservation pour le moment. <a href="{{ route('ressources.index') }}" class="alert-link">Faire une nouvelle réservation.</a>
            </div>
        @else
            <div class="row">
                @foreach (['sallesClasses' => 'Salles de Classe', 'rallonges' => 'Rallonges', 'cables' => 'Câbles', 'projecteurs' => 'Vidéo Projecteurs', 'laboratoires' => 'Laboratoires', 'sallesReunions' => 'Salles de Réunion'] as $key => $title)
                    @if (!$$key->isEmpty())
                        <div class="col-12 col-sm-6 col-lg-4 mb-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-body d-flex flex-column">
                                    <h2 class="card-title h5">{{ $title }}</h2>
                                    <ul class="list-unstyled flex-grow-1">
                                        @foreach ($$key as $reservation)
                                            <li class="mb-3">
                                                <strong>{{ $reservation->{$key}->nomRessource ?? ucfirst($key) }}</strong> - réservé pour le {{ \Carbon\Carbon::parse($reservation->date_de_reservation)->format('d/m/Y') }} de {{ \Carbon\Carbon::parse($reservation->heure_de_debut)->format('H:i') }} à {{ \Carbon\Carbon::parse($reservation->heure_de_fin)->format('H:i') }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
@endsection
