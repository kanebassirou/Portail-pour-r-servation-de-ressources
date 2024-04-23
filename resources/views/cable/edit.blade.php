@extends('layouts.admin')

@section('title', 'Modifier un câble')

@section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-2">

                <form action="{{ route('cable.update', $cable->id) }}" method="POST" class="py-2">
                    @csrf
                    @method('PUT') {{-- Add this line to specify the HTTP method as PUT --}}
                    <div class="mb-4">
                        <input type="hidden" name="nomRessource" id="nom" value="cable"
                            class="form-input rounded-md shadow-sm w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="typeDeCable" class="block text-gray-700 text-sm font-bold mb-2">Type de câble:</label>
                        <input type="text" name="typeDeCable" id="typeDeCable"
                            class="form-input rounded-md shadow-sm w-full" value="{{ $cable->typeDeCable }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="Description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                        <textarea name="Description" id="Description" class="form-textarea rounded-md shadow-sm w-full" required>{{ $cable->Description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="longueur" class="block text-gray-700 text-sm font-bold mb-2">Longueur:</label>
                        <input type="number" name="longueur" id="longueur" class="form-input rounded-md shadow-sm w-full"
                            value="{{ $cable->longueur }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="Etat" class="block text-gray-700 text-sm font-bold mb-2">État:</label>
                        <select name="Etat" id="Etat" class="form-select rounded-md shadow-sm w-full" required>
                            <option value="Disponible" {{ $cable->Etat == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                            <option value="Indisponible" {{ $cable->Etat == 'Indisponible' ? 'selected' : '' }}>Indisponible</option>
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
