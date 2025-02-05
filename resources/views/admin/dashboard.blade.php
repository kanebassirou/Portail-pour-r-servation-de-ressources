@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        {{-- Affichage des alertes --}}
        @if (session('warning'))
            <div class="alert alert-warning" role="alert">
                {{ session('warning') }}
            </div>
        @endif

        {{-- Grid pour organiser les cartes --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

            {{-- Génération de rapport --}}
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                    📊 Générer un Rapport
                </h3>
                <form action="{{ route('admin.rapport.generer') }}" method="POST" class="mt-4 space-y-3">
                    @csrf
                    <div>
                        <label for="startDate" class="block text-sm font-medium text-gray-700">Date de début:</label>
                        <input type="date" id="startDate" name="startDate" required
                               class="mt-1 p-2 w-full border rounded-lg">
                    </div>
                    <div>
                        <label for="endDate" class="block text-sm font-medium text-gray-700">Date de fin:</label>
                        <input type="date" id="endDate" name="endDate" required
                               class="mt-1 p-2 w-full border rounded-lg">
                    </div>
                    <button type="submit" class="btn btn-success text-gray-900 w-100 py-2 rounded-lg">
            Générer le rapport
        </button>
                </form>
            </div>

            {{-- Réservations --}}
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                    📅 Réservations
                </h3>
                <p class="mt-2 text-gray-600">Nombre total de réservations :</p>
                <ul class="mt-3 space-y-1">
                    <li>🎥 VIDEO-PROJECTEUR: <strong>{{ $totalprojecteur }}</strong></li>
                    <li>🏫 SALLE DE CLASSE: <strong>{{ $totalclasse }}</strong></li>
                    <li>🏢 SALLE DE RÉUNION: <strong>{{ $totalSalleReunion }}</strong></li>
                    <li>🔌 RALLONGE: <strong>{{ $totalrallonge }}</strong></li>
                    <li>📡 CÂBLES: <strong>{{ $totalcable }}</strong></li>
                </ul>
                <a href="{{ route('admin.reservationRessource') }}"
                   class="mt-4 block text-center bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                    Voir les réservations
                </a>
            </div>

            {{-- Utilisateurs --}}
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                    👤 Utilisateurs
                </h3>
                <p class="mt-2 text-gray-600">Nombre total d'utilisateurs : <strong>{{ $totalUsers }}</strong></p>
                <a href="{{ route('admin.users.index') }}"
                   class="mt-4 block text-center bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                    Gestion des utilisateurs
                </a>
            </div>

            {{-- Ressources --}}
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                    🛠️ Ressources
                </h3>
                <p class="mt-2 text-gray-600">Nombre total de ressources à gérer : <strong>6</strong></p>
                <a href="{{ route('admin.ressources') }}"
                   class="mt-4 block text-center bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                    Gestion des ressources
                </a>
            </div>

        </div> {{-- Fin du Grid --}}

    </div>
</div>
@endsection
