@extends('layouts.admin')

@section('title', 'gerer les Cables')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-8">
<div class="row">
        <div class="col-md-10">
            <a href="{{ route('cable.create') }}" class="btn btn-primary mb-2">Ajouter une nouvelle cable</a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('admin.ressources') }}" class="btn btn-primary">Retour</a>
        </div>
        </div>


        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Type de Cable</th>
                    <th>Longueur</th>
                    <th>Disponiblité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cables as $cable)
                    <tr>
                        <td>{{ $cable->nomRessource }}</td>
                        {{-- <td> Salle {{ $cable->Description }}</td> --}}
                        <td>{{ $cable->typeDeCable}}</td>
                        <td>{{ $cable->longueur }}</td>
                        <td>{{ $cable->Etat }}</td>
                        <td>
                            <a href="{{ route('cable.edit', $cable->id) }}" class="btn btn-info btn-sm"><i
                                    class="fa fa-edit"></i></a>
                            <a href="{{ route('cable.show', $cable->id) }}" class="btn btn-primary btn-sm"><i
                                    class="fa fa-eye"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#confirmDeleteModal{{ $cable->id }}"><i
                                    class="fa fa-trash"style="color: black;"></i></button>
                            <!-- Confirm Delete Modal -->
                            <div class="modal fade" id="confirmDeleteModal{{ $cable->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="confirmDeleteModalLabel{{ $cable->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $cable->id }}">
                                                Confirmation de suppression</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes-vous sûr de vouloir supprimer cette cable ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                style="color: black;">Annuler</button>
                                            <form action="{{ route('cable.destroy', $cable->id) }}" method="POST"
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
           <div class="mt-5">
           {{ $cables->links() }}
            </div>
    </div>
@endsection
