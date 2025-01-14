@extends('layouts.admin')

@section('title', 'gerer les reservations')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{-- Vérifie si des réservations sont présentes --}}
    @if ($reservationLaboratoires->isEmpty())
        <p>Pas de réservations pour cette laboratoire.</p>
    @else
        <div class="overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900"> Labo</h3>
                            <a href="{{ route('admin.reservationRessource') }}" class="btn btn-primary">Retour</a>

                <div class="mt-2 max-w-xl text-sm text-gray-500">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Utilisateur
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date de réservation
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Heure de début
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Heure de fin
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($reservationLaboratoires as $reservation)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $reservation->utilisateur->name ?? 'Utilisateur inconnu' }} </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $reservation->date_de_reservation }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $reservation->heure_de_debut }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $reservation->heure_de_fin }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.reservationLaboratoire.edit', $reservation->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                             <button type="button" class="text-red-600 hover:text-red-900 ml-4" data-toggle="modal"
                                data-target="#confirmDeleteModal{{ $reservation->id }}"><i
                                    class="fa fa-trash"style="color: black;"></i></button>
                            <!-- Confirm Delete Modal -->
                            <div class="modal fade" id="confirmDeleteModal{{ $reservation->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="confirmDeleteModalLabel{{ $reservation->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $reservation->id }}">
                                                Confirmation de suppression</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes-vous sûr de vouloir supprimer cette reservation de laboratoire ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                style="color: black;">Annuler</button>
                                            <form action="{{ route('admin.reservationLaboratoire.destroy', $reservation->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    style="color: black;">Supprimer</button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif


@endsection
