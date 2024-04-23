@extends('layouts.admin')

@section('title', 'Modifier un vidéo projecteur')

@section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-2">
                <form action="{{ route('projecteur.update', $projecteur->id) }}" method="POST" class="py-2">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <input type="hidden" name="nomRessource" id="nom" value="projecteur"
                            class="form-input rounded-md shadow-sm w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="modele" class="block text-gray-700 text-sm font-bold mb-2">Modèle:</label>
                        <input type="number" name="modele" id="modele" class="form-input rounded-md shadow-sm w-full"
                            value="{{ old('modele', $projecteur->modele) }}" required>
                    </div>
                    {{-- <div class="mb-4">
                        <label for="marque" class="block text-gray-700 text-sm font-bold mb-2">Marque:</label>
                        <input type="number" name="marque" id="marque" class="form-input rounded-md shadow-sm w-full"
                            value="{{ old('marque', $projecteur->marque) }}" required>
                    </div> --}}
                    <div class="mb-4">
                        <label for="resolution" class="block text-gray-700 text-sm font-bold mb-2">Résolution:</label>
                        <input type="number" name="resolution" id="resolution"
                            class="form-input rounded-md shadow-sm w-full"
                            value="{{ old('resolution', $projecteur->resolution) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary" style="color: black;">
                        Modifier
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
