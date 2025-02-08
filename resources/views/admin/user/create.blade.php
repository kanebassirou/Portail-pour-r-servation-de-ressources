@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Ajouter un utilisateur autorisé</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="prenom">Prénom</label>
                            <input type="text" name="prenom" class="form-control" id="prenom" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" class="form-control" id="nom" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="profil">Profil</label>
                            <select name="profil" class="form-control" id="profil" required onchange="toggleFields()">
                                <option value="">Sélectionnez un profil</option>
                                <option value="PAT">PAT</option>
                                <option value="PER">PER</option>
                                <option value="etudiant">Etudiant</option>
                            </select>
                        </div>
                        <div id="etudiantFields" style="display: none;">
                            <div class="form-group mb-3">
                                <label for="numero_dossier">Numéro de dossier</label>
                                <input type="text" name="numero_dossier" class="form-control" id="numero_dossier">
                            </div>
                            <div class="form-group mb-3">
                                <label for="classe">Niveau</label>
                                <select name="classe" class="form-control" id="classe">
                                    <option value="Licence 1">Licence 1</option>
                                    <option value="Licence 2">Licence 2</option>
                                    <option value="Licence 3">Licence 3</option>
                                    <option value="Master 1">Master 1</option>
                                    <option value="Master 2">Master 2</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="filiere">Filière</label>
                                <select name="filiere" class="form-control" id="filiere">
                                    <option value="Informatique">Informatique</option>
                                    <option value="Mathematique">Mathématique</option>
                                    <option value="Science Physique et Chimie">Science Physique et Chimie</option>
                                    <option value="Science de l'eau">Science de l'eau</option>
                                </select>
                            </div>
                        </div>
                        <div id="patFields" style="display: none;">
                            <div class="form-group mb-3">
                                <label for="poste">Choisissez un poste</label>
                                <select name="poste" class="form-control" id="poste">
                                    <option value="Directeur">Directeur</option>
                                    <option value="Directeur Adjoint">Directeur Adjoint</option>
                                    <option value="Chef des Services Administratifs">Chef des Services Administratifs</option>
                                    <option value="Comptable Matières">Comptable Matières</option>
                                    <option value="Assistante de la Scolarité">Assistante de la Scolarité</option>
                                    <option value="Assistante de Direction">Assistante de Direction</option>
                                    <option value="Assistante Pédagogique">Assistante Pédagogique</option>
                                </select>
                            </div>
                        </div>
                        <div id="perFields" style="display: none;">
                            <div class="form-group mb-3">
                                <label for="matricule">Matricule</label>
                                <input type="text" name="matricule" class="form-control" id="matricule">
                            </div>
                            <div class="form-group mb-3">
                                <label for="departement">Département</label>
                                <select name="departement" class="form-control" id="departement">
                                    <option value="Informatique">Informatique</option>
                                    <option value="Mathematique">Mathématique</option>
                                    <option value="Physique">Physique</option>
                                    <option value="Science de l'eau">Science de l'eau</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: blue;">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleFields() {
        var profil = document.getElementById('profil').value;
        document.getElementById('etudiantFields').style.display = profil === 'etudiant' ? 'block' : 'none';
        document.getElementById('patFields').style.display = profil === 'PAT' ? 'block' : 'none';
        document.getElementById('perFields').style.display = profil === 'PER' ? 'block' : 'none';
    }
</script>
@endsection
