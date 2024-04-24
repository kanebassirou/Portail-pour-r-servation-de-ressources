@extends('layouts.admin')

@section('title', 'Modifier une salle de réunion')

@section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-2">

                <form action="{{ route('salleReunion.update', $salleReunion->id) }}" method="POST" class="py-2">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom de la salle de réunion:</label>
                        <input type="text" name="nomRessource" id="nom" value="{{ $salleReunion->nomRessource }}" class="form-input rounded-md shadow-sm w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="numero_salle" class="block text-gray-700 text-sm font-bold mb-2">Numéro de salle :</label>
                        <input type="text" name="numero_salle" id="numero_salle" value="{{ $salleReunion->numero_salle }}" class="form-input rounded-md shadow-sm w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="Description" class="block text-gray-700 text-sm font-bold mb-2">Description :</label>
                        <textarea name="Description" id="Description" class="form-textarea rounded-md shadow-sm w-full" required>{{ $salleReunion->Description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="capacite" class="block text-gray-700 text-sm font-bold mb-2">Capacité:</label>
                        <input type="number" name="capacite" id="capacite" value="{{ $salleReunion->capacite }}" class="form-input rounded-md shadow-sm w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="Etat" class="block text-gray-700 text-sm font-bold mb-2">État:</label>
                        <select name="Etat" id="Etat" class="form-select rounded-md shadow-sm w-full" required>
                            <option value="Disponible" {{ $salleReunion->Etat == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                            <option value="Indisponible" {{ $salleReunion->Etat == 'Indisponible' ? 'selected' : '' }}>Indisponible</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" style="color: black;">
                        Enregistrer
                    </button>

                </form>
            </div>
        </div>
    </div>

@endsection
