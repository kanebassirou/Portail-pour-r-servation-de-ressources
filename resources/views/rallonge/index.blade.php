@extends('layouts.admin')

@section('title', 'gerer les Rallonge')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-8">
        <a href="{{ route('rallonge.create') }}" class="btn btn-primary mb-2">Ajouter une nouvelle rallonge</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>type de prise</th>
                    <th>Longueur</th>
                    <th>Nombre de prise</th>
                    <th>Disponiblité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rallonges as $rallonge)
                    <tr>
                        <td>{{ $rallonge->nomRessource }}</td>
                        {{-- <td> Salle {{ $rallonge->Description }}</td> --}}
                        <td>{{ $rallonge->typeDePrise}}</td>
                        <td>{{ $rallonge->longueur }}</td>
                        <td>{{ $rallonge->nombreDePrise }}</td>
                        <td>{{ $rallonge->Etat }}</td>
                        <td>
                            <a href="{{ route('rallonge.edit', $rallonge->id) }}" class="btn btn-info btn-sm"><i
                                    class="fa fa-edit"></i></a>
                            <a href="{{ route('rallonge.show', $rallonge->id) }}" class="btn btn-primary btn-sm"><i
                                    class="fa fa-eye"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#confirmDeleteModal{{ $rallonge->id }}"><i
                                    class="fa fa-trash"style="color: black;"></i></button>
                            <!-- Confirm Delete Modal -->
                            <div class="modal fade" id="confirmDeleteModal{{ $rallonge->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="confirmDeleteModalLabel{{ $rallonge->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $rallonge->id }}">
                                                Confirmation de suppression</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes-vous sûr de vouloir supprimer cette rallonge ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                style="color: black;">Annuler</button>
                                            <form action="{{ route('rallonge.destroy', $rallonge->id) }}" method="POST"
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
