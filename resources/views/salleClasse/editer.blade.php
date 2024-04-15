@extends('layouts.admin')

@section('title', 'modifier une salle de classe')

@section('content')
    <div class="py-2">
        <form action="{{ route('salleClasse.update', $salleClasse->id) }}" method="POST" class="py-2">
            @csrf
            @method('PUT')
            <div class="mb-4">
            <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom de la salle:</label>
            <input type="text" name="nomRessource" id="nom" class="form-input rounded-md shadow-sm w-full"
                value="{{ old('nomRessource', $salleClasse->nomRessource) }}" required>
            </div>
            <div class="mb-4">
            <label for="numero_salle" class="block text-gray-700 text-sm font-bold mb-2">Numero de salle :</label>
            <input type="text" name="numero_salle" id="numero_salle" class="form-input rounded-md shadow-sm w-full"
                value="{{ old('numero_salle', $salleClasse->numero_salle) }}" required>
            </div>
            <div class="mb-4">
            <label for="Description" class="block text-gray-700 text-sm font-bold mb-2">Description :</label>
            <textarea name="Description" id="Description" class="form-textarea rounded-md shadow-sm w-full" required>{{ old('Description', $salleClasse->Description) }}</textarea>
            </div>
            <div class="mb-4">
            <label for="capacite" class="block text-gray-700 text-sm font-bold mb-2">Capacité:</label>
            <input type="number" name="capacite" id="capacite" class="form-input rounded-md shadow-sm w-full"
                value="{{ old('capacite', $salleClasse->capacite) }}" required>
            </div>
            <div class="mb-4">
            <label for="Etat" class="block text-gray-700 text-sm font-bold mb-2">Etat:</label>
            <select name="Etat" id="Etat" class="form-select rounded-md shadow-sm w-full" required>
                <option value="Disponible" @if(old('Etat', $salleClasse->Etat) == 'Disponible') selected @endif>Disponible</option>
                <option value="Indisponible" @if(old('Etat', $salleClasse->Etat) == 'Indisponible') selected @endif>Indisponible</option>
            </select>
            </div>

            <button type ="submit" class="btn btn-primary "style="color: black;">
            Modifier
            </button>
        </form>

        </form>
    </div>
@endsection
