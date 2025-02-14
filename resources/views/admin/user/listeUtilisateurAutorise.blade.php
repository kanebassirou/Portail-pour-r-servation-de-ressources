@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Liste des utilisateurs autorisés</h1>

    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Ajouter un utilisateur autorisé</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    {{-- <th class="py-2 px-4 border-b">ID</th> --}}
                    <th class="py-2 px-4 border-b">Prénom</th>
                    <th class="py-2 px-4 border-b">Nom</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Profil</th>
                    <th class="py-2 px-4 border-b">Matricule ou Numero dossier</th>
                    <th class="py-2 px-4 border-b">Niveau</th>
                    <th class="py-2 px-4 border-b">Filière</th>
                    <th class="py-2 px-4 border-b">Poste</th>
                    <th class="py-2 px-4 border-b">Département</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($utilisateurs as $utilisateur)
                    <tr>
                        {{-- <td>{{ $utilisateur->id }}</td> --}}
                        <td class="py-2 px-4 border-b">{{ $utilisateur->prenom }}</td>
                        <td class="py-2 px-4 border-b">{{ $utilisateur->nom }}</td>
                        <td class="py-2 px-4 border-b">{{ $utilisateur->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $utilisateur->profil }}</td>
                        <td class="py-2 px-4 border-b">{{ $utilisateur->matricule }}</td>
                        <td class="py-2 px-4 border-b">{{ $utilisateur->classe }}</td>
                        <td class="py-2 px-4 border-b">{{ $utilisateur->filiere }}</td>
                        <td class="py-2 px-4 border-b">{{ $utilisateur->poste }}</td>
                        <td class="py-2 px-4 border-b">{{ $utilisateur->departement }}</td>
                        <td class="py-2 px-4 border-b">
                            <!-- Ajouter des actions si nécessaire -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
