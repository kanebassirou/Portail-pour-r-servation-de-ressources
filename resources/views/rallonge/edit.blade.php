@extends('layouts.admin')

@section('title', 'Modifier une salle de classe')

@section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-2">

                <form action="{{ route('rallonge.update', $rallonge->id) }}" method="POST" class="py-2">
                    @csrf
                    @method('PUT') {{-- Add this line to specify the HTTP method --}}
                    <div class="mb-4">
                        <input type="hidden" name="nomRessource" id="nom" value="rallonge"
                            class="form-input rounded-md shadow-sm w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="nombreDePrise" class="block text-gray-700 text-sm font-bold mb-2">Nombre de prise
                            :</label>
                        <input type="number" name="nombreDePrise" id="nombreDePrise"
                            class="form-input rounded-md shadow-sm w-full" value="{{ $rallonge->nombreDePrise }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="Description" class="block text-gray-700 text-sm font-bold mb-2">Description :</label>
                        <textarea name="Description" id="Description" class="form-textarea rounded-md shadow-sm w-full" required>{{ $rallonge->Description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="longueur" class="block text-gray-700 text-sm font-bold mb-2">Longueur:</label>
                        <input type="number" name="longueur" id="longueur" class="form-input rounded-md shadow-sm w-full"
                            value="{{ $rallonge->longueur }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="typeDePrise" class="block text-gray-700 text-sm font-bold mb-2">Type de prise :</label>
                        <input type="text" name="typeDePrise" id="typeDePrise" class="form-input rounded-md shadow-sm w-full"
                            value="{{ $rallonge->typeDePrise }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="Etat" class="block text-gray-700 text-sm font-bold mb-2">Etat:</label>
                        <select name="Etat" id="Etat" class="form-select rounded-md shadow-sm w-full" required>
                            <option value="Disponible" {{ $rallonge->Etat == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                            <option value="Indisponible" {{ $rallonge->Etat == 'Indisponible' ? 'selected' : '' }}>Indisponible</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" style="color: black;">
                       Modifier
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
