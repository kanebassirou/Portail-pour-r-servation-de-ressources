@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Liste des utilisateurs autorisés</h1>

    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between mb-4">
        <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Ajouter un utilisateur autorisé</a>
        <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Retour</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
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
                            <a href="{{ route('admin.users.edit', $utilisateur->id) }}" class="text-blue-500 hover:underline">Modifier</a>
                            <button onclick="openModal({{ $utilisateur->id }})" class="text-red-500 hover:underline">Supprimer</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $utilisateurs->links() }}
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div id="confirmationModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4">Confirmer la suppression</h2>
        <p class="mb-6">Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
        <form id="deleteForm" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Annuler</button>
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-800">Supprimer</button>
        </form>
    </div>
</div>
@endsection

<script>
    // Fonction pour ouvrir la modal
    function openModal(userId) {
        const modal = document.getElementById('confirmationModal');
        const form = document.getElementById('deleteForm');
        form.action = `/admin/users/${userId}`; // Définir l'URL de suppression
        modal.classList.remove('hidden');
    }

    // Fonction pour fermer la modal
    function closeModal() {
        const modal = document.getElementById('confirmationModal');
        modal.classList.add('hidden');
    }
</script>
{{-- @endsection --}}
