@extends('layouts.admin')

@section('title', 'gerer les utilisateurs')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900"> Gestion des utilisateurs</h3>
            <div class="mt-2 max-w-xl text-sm text-gray-500">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nom
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Rôle
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @foreach ($user->roles as $role)
                                        <span
                                            class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs">{{ $role->name }}</span>
                                    @endforeach


                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <!-- Actions -->
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Changer le role</a>
                                    <button type="button" class="text-red-600 hover:text-red-900 ml-4" data-toggle="modal"
                                        data-target="#confirmDeleteModal{{ $user->id }}"><i
                                            class="fa fa-trash"style="color: black;"></i></button>
                                    <!-- Confirm Delete Modal -->
                                    <div class="modal fade" id="confirmDeleteModal{{ $user->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $user->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmDeleteModalLabel{{ $user->id }}">
                                                        Confirmation de suppression</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Êtes-vous sûr de vouloir supprimer l'utilisateur {{ $user->name }} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                        style="color: black;">Annuler</button>
                                                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            style="color: black;">Supprimer</button>
                                                    </form>
                                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
