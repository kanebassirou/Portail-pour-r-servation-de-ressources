@extends('layouts.admin')

@section('title', 'ajouter une salle de classe')

@section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-2">

                <form action="{{ route('rallonge.store') }}" method="POST" class="py-2">
                    @csrf
                    <div class="mb-4">
                        {{-- <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom de la salle:</label> --}}
                        <input type="hidden" name="nomRessource" id="nom" value="Rallonge"
                            class="form-input rounded-md shadow-sm w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="nombreDePrise" class="block text-gray-700 text-sm font-bold mb-2">Nombre de prise
                            :</label>
                        <input type="number" name="nombreDePrise" id="nombreDePrise"
                            class="form-input rounded-md shadow-sm w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="Description" class="block text-gray-700 text-sm font-bold mb-2">Description :</label>
                        <textarea name="Description" id="Description" class="form-textarea rounded-md shadow-sm w-full" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="longueur" class="block text-gray-700 text-sm font-bold mb-2">longueur:</label>
                        <input type="number" name="longueur" id="longueur" class="form-input rounded-md shadow-sm w-full"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="typeDePrise" class="block text-gray-700 text-sm font-bold mb-2">type de prise :</label>
                        <input type="text" name="typeDePrise" id="typeDePrise" class="form-input rounded-md shadow-sm w-full"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="Etat" class="block text-gray-700 text-sm font-bold mb-2">Etat:</label>
                        <select name="Etat" id="Etat" class="form-select rounded-md shadow-sm w-full" required>
                            <option value="Disponible">Disponible</option>
                            <option value="Indisponible">Indisponible</option>
                        </select>
                    </div>

                    <button type ="submit" class="btn btn-primary" style="color: black;">
                        Ajouter
                    </button>

                </form>
            </div>
        </div>
    </div>




@endsection
