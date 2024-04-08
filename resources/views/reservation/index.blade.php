{{-- resources/views/reservations/index.blade.php --}}

@extends('layouts.base')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Mes Réservations</h1>
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title h5">Salles de Classe</h2>
                        <ul class="list-unstyled">
                            @forelse ($sallesClasses as $reservation)
                                <li>
                                   !!!! {{ $reservation->salleClasse->nomRessource ?? 'Salle non trouvée' }} -
                                    est reserver pour le
                                    - {{ \Carbon\Carbon::parse($reservation->date_de_reservation)->format('d/m/Y') }}
                                    à {{ \Carbon\Carbon::parse($reservation->heure_de_debut)->format('H:i') }} jusqu'à
                                    {{ \Carbon\Carbon::parse($reservation->heure_de_fin)->addHour()->format('H:i') }}
                                    <a href="#" class="btn btn-primary mt-5">Voir les détails</a>

                                </li>
                            @empty
                                <li>Pas de réservations</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title h5">Rallonges</h2>
                        <ul class="list-unstyled">
                            @forelse ($rallonges as $reservation)
                                <li>
                                   !!!! {{ $reservation->rallonges->nomRessource ?? 'Rallonge non trouvée' }} -
                                    est reserver pour le -
                                    {{ \Carbon\Carbon::parse($reservation->date_de_reservation)->format('d/m/Y') }}
                                    à {{ \Carbon\Carbon::parse($reservation->heure_de_debut)->format('H:i') }} jusqu'à
                                    {{ \Carbon\Carbon::parse($reservation->heure_de_fin)->addHour()->format('H:i') }}
                                    <a href="#" class="btn btn-primary mt-5">Voir les détails</a>


                                </li>
                            @empty
                                <li>Pas de réservations</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title h5">Câbles</h2>
                        <ul class="list-unstyled">
                            @forelse ($cables as $reservation)
                                <li>
                                  !!!!   {{ $reservation->cables->nomRessource ?? 'Rallonge non trouvée' }}  -
                                    est reserver pour le -
                                    {{ \Carbon\Carbon::parse($reservation->date_de_reservation)->format('d/m/Y') }}
                                    à {{ \Carbon\Carbon::parse($reservation->heure_de_debut)->format('H:i') }} jusqu'à
                                    {{ \Carbon\Carbon::parse($reservation->heure_de_fin)->addHour()->format('H:i') }}
                                    <a href="#" class="btn btn-primary mt-5">Voir les détails</a>

                                </li>
                            @empty
                                <li>Pas de réservations</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title h5">Vidéo Projecteurs</h2>
                        <ul class="list-unstyled">
                            @forelse ($projecteurs as $reservation)
                                <li>
                                   !!!! {{ $reservation->projecteurs->nomRessource ?? 'Salle non trouvée' }} -
                                    est reserver pour le
                                    -{{ \Carbon\Carbon::parse($reservation->date_de_reservation)->format('d/m/Y') }}
                                    à {{ \Carbon\Carbon::parse($reservation->heure_de_debut)->format('H:i') }} jusqu'à
                                    {{ \Carbon\Carbon::parse($reservation->heure_de_fin)->addHour()->format('H:i') }}
                                    <a href="#" class="btn btn-primary mt-5">Voir les détails</a>

                                </li>
                            @empty
                                <li>Pas de réservations</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
