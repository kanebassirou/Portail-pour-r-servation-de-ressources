@extends('layouts.admin')

@section('title', 'modifier laboratoire')

@section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-2">

                <form action="{{ route('laboratoire.update', $laboratoire->id) }}" method="POST" class="py-2">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <input type="hidden" name="nomRessource" id="nom" value="Laboratoire">
                    </div>
                    <div class="mb-4">
                        <label for="nomLaboratoire" class="block text-gray-700 text-sm font-bold mb-2">nom du Laboratoire :</label>
                        <input type="text" name="nomLaboratoire" id="nomLaboratoire" class="form-input rounded-md shadow-sm w-full" value="{{ $laboratoire->nomLaboratoire }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="Description" class="block text-gray-700 text-sm font-bold mb-2">Description :</label>
                        <textarea name="Description" id="Description" class="form-textarea rounded-md shadow-sm w-full" required>{{ $laboratoire->Description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="capacite" class="block text-gray-700 text-sm font-bold mb-2">Capacité:</label>
                        <input type="number" name="capacite" id="capacite" class="form-input rounded-md shadow-sm w-full" value="{{ $laboratoire->capacite }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="Etat" class="block text-gray-700 text-sm font-bold mb-2">Etat:</label>
                        <select name="Etat" id="Etat" class="form-select rounded-md shadow-sm w-full" required>
                            <option value="Disponible" {{ $laboratoire->Etat == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                            <option value="Indisponible" {{ $laboratoire->Etat == 'Indisponible' ? 'selected' : '' }}>Indisponible</option>
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
