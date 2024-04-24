@extends('layouts.admin')

@section('title', 'gerer les labo')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-8">
        <div class="row">
            <div class="col-md-10">
                <a href="{{ route('laboratoire.create') }}" class="btn btn-primary mb-2">Ajouter une nouvelle laboratoire</a>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.ressources') }}" class="btn btn-primary">Retour</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>nom du Laboratoire</th>
                        <th>Capacite</th>
                        <th>Disponiblité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laboratoires as $laboratoire)
                        <tr>
                            <td>{{ $laboratoire->nomLaboratoire }}</td>
                            <td> {{ $laboratoire->capacite }}</td>
                            <td>{{ $laboratoire->Etat }}</td>

                            <td>
                                <a href="{{ route('laboratoire.edit', $laboratoire->id) }}" class="btn btn-info btn-sm"><i
                                        class="fa fa-edit"></i></a>
                                <a href="{{ route('laboratoire.show', $laboratoire->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fa fa-eye"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#confirmDeleteModal{{ $laboratoire->id }}"><i
                                        class="fa fa-trash"style="color: black;"></i></button>
                                <!-- Confirm Delete Modal -->
                                <div class="modal fade" id="confirmDeleteModal{{ $laboratoire->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $laboratoire->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteModalLabel{{ $laboratoire->id }}">
                                                    Confirmation de suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer cette laboratoire ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                    style="color: black;">Annuler</button>
                                                <form action="{{ route('laboratoire.destroy', $laboratoire->id) }}"
                                                    method="POST" style="display: inline-block;">
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
            <div class = "mt-5">
            {{ $laboratoires->links() }}
            </div>
        </div>
    @endsection
