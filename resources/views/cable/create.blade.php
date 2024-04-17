@extends('layouts.admin')

@section('title', 'ajouter une cable')

@section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-2">

                <form action="{{ route('cable.store') }}" method="POST" class="py-2">
                    @csrf
                    <div class="mb-4">
                        {{-- <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom de la salle:</label> --}}
                        <input type="hidden" name="nomRessource" id="nom" value="Cable"
                            class="form-input rounded-md shadow-sm w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="typeDeCable" class="block text-gray-700 text-sm font-bold mb-2">type De Cable
                            :</label>
                        <input type="text" name="typeDeCable" id="typeDeCable"
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
