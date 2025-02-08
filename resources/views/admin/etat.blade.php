@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">📊 État des Ressources</h1>

    <!-- Filtre -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.ressources.etat') }}" method="GET">
                <div class="row align-items-end">
                    <div class="col-md-6">
                        <label for="Etat" class="form-label fw-bold">Filtrer par état :</label>
                        <select name="Etat" id="Etat" class="form-select">
                            <option value="">-- Sélectionnez un état --</option>
                            <option value="fonctionnelle" {{ $etat == 'fonctionnelle' ? 'selected' : '' }}>✅ Fonctionnelle</option>
                            <option value="panne" {{ $etat == 'panne' ? 'selected' : '' }}>❌ En panne</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100" style="background-color: blue;">Filtrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if($etat)
        @php
            $ressources = [
                'Salles de Classe' => $salleClasses,
                'Câbles' => $cables,
                'Rallonges' => $rallonges,
                'Vidéo Projecteurs' => $videoProjecteurs,
                'Laboratoires' => $laboratoires,
                'Salles de Réunion' => $salleReunions
            ];
        @endphp

        @foreach($ressources as $titre => $liste)
            @if($liste->where('Etat', $etat)->count() > 0)
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ $titre }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>📌 Nom</th>
                                    <th>🔍 État</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($liste as $ressource)
                                    @if ($ressource->Etat == $etat)
                                        <tr>
                                            <td>{{ $ressource->nomRessource }}</td>
                                            <td>
                                                <span class="badge bg-{{ $etat == 'fonctionnelle' ? 'success' : 'danger' }}">
                                                    {{ ucfirst($ressource->Etat) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        @endforeach

        @if(!collect($ressources)->flatMap(fn($list) => $list)->where('Etat', $etat)->count())
            <div class="alert alert-warning text-center">🚫 Aucune ressource trouvée pour l'état sélectionné.</div>
        @endif
    @else
        <div class="alert alert-info text-center">📢 Veuillez sélectionner un état pour filtrer les ressources.</div>
    @endif
</div>
@endsection
