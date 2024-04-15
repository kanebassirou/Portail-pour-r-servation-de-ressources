@extends('layouts.admin')

@section('title', 'gerer les projecteur')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-8">
        <a href="{{ route('projecteur.create') }}" class="btn btn-primary mb-2">Ajouter une nouvelle projecteur</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>modele</th>
                    <th>resolution</th>
                    {{-- <th>Nombre de prise</th> --}}
                    {{-- <th>Disponiblité</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projecteurs as $projecteur)
                    <tr>
                        <td>{{ $projecteur->nomRessource }}</td>
                        {{-- <td> Salle {{ $projecteur->Description }}</td> --}}
                        <td>{{ $projecteur->modele}}</td>
                        <td>{{ $projecteur->resolution }}</td>

                        <td>
                            <a href="{{ route('projecteur.edit', $projecteur->id) }}" class="btn btn-info btn-sm"><i
                                    class="fa fa-edit"></i></a>
                            <a href="{{ route('projecteur.show', $projecteur->id) }}" class="btn btn-primary btn-sm"><i
                                    class="fa fa-eye"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#confirmDeleteModal{{ $projecteur->id }}"><i
                                    class="fa fa-trash"style="color: black;"></i></button>
                            <!-- Confirm Delete Modal -->
                            <div class="modal fade" id="confirmDeleteModal{{ $projecteur->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="confirmDeleteModalLabel{{ $projecteur->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $projecteur->id }}">
                                                Confirmation de suppression</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes-vous sûr de vouloir supprimer cette projecteur ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                style="color: black;">Annuler</button>
                                            <form action="{{ route('projecteur.destroy', $projecteur->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    style="color: black;">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
