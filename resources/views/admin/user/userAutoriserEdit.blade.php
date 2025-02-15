@extends('layouts.admin')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Modifier un utilisateur autorisé</h3>
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

                    <form action="{{ route('admin.users.update', $utilisateur->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="prenom">Prénom</label>
                            <input type="text" name="prenom" class="form-control" id="prenom" value="{{ $utilisateur->prenom }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" class="form-control" id="nom" value="{{ $utilisateur->nom }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $utilisateur->email }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="matricule">Matricule</label>
                            <input type="text" name="matricule" class="form-control" id="matricule" value="{{ $utilisateur->matricule }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="profil">Profil</label>
                            <select name="profil" class="form-control" id="profil" required onchange="toggleFields()">
                                <option value="">Sélectionnez un profil</option>
                                <option value="PAT" {{ $utilisateur->profil == 'PAT' ? 'selected' : '' }}>PAT</option>
                                <option value="PER" {{ $utilisateur->profil == 'PER' ? 'selected' : '' }}>PER</option>
                                <option value="etudiant" {{ $utilisateur->profil == 'etudiant' ? 'selected' : '' }}>Etudiant</option>
                            </select>
                        </div>
                        <div id="etudiantFields" style="display: {{ $utilisateur->profil == 'etudiant' ? 'block' : 'none' }};">
                            <div class="form-group mb-3">
                                <label for="classe">Niveau</label>
                                <select name="classe" class="form-control" id="classe">
                                    <option value="Licence 1" {{ $utilisateur->classe == 'Licence 1' ? 'selected' : '' }}>Licence 1</option>
                                    <option value="Licence 2" {{ $utilisateur->classe == 'Licence 2' ? 'selected' : '' }}>Licence 2</option>
                                    <option value="Licence 3" {{ $utilisateur->classe == 'Licence 3' ? 'selected' : '' }}>Licence 3</option>
                                    <option value="Master 1" {{ $utilisateur->classe == 'Master 1' ? 'selected' : '' }}>Master 1</option>
                                    <option value="Master 2" {{ $utilisateur->classe == 'Master 2' ? 'selected' : '' }}>Master 2</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="filiere">Filière</label>
                                <select name="filiere" class="form-control" id="filiere">
                                    <option value="Informatique" {{ $utilisateur->filiere == 'Informatique' ? 'selected' : '' }}>Informatique</option>
                                    <option value="Mathematique" {{ $utilisateur->filiere == 'Mathematique' ? 'selected' : '' }}>Mathématique</option>
                                    <option value="Science Physique et Chimie" {{ $utilisateur->filiere == 'Science Physique et Chimie' ? 'selected' : '' }}>Science Physique et Chimie</option>
                                    <option value="Science de l'eau" {{ $utilisateur->filiere == 'Science de l\'eau' ? 'selected' : '' }}>Science de l'eau</option>
                                </select>
                            </div>
                        </div>
                        <div id="patFields" style="display: {{ $utilisateur->profil == 'PAT' ? 'block' : 'none' }};">
                            <div class="form-group mb-3">
                                <label for="poste">Choisissez un poste</label>
                                <select name="poste" class="form-control" id="poste">
                                    <option value="Directeur" {{ $utilisateur->poste == 'Directeur' ? 'selected' : '' }}>Directeur</option>
                                    <option value="Directeur Adjoint" {{ $utilisateur->poste == 'Directeur Adjoint' ? 'selected' : '' }}>Directeur Adjoint</option>
                                    <option value="Chef des Services Administratifs" {{ $utilisateur->poste == 'Chef des Services Administratifs' ? 'selected' : '' }}>Chef des Services Administratifs</option>
                                    <option value="Comptable Matières" {{ $utilisateur->poste == 'Comptable Matières' ? 'selected' : '' }}>Comptable Matières</option>
                                    <option value="Assistante de la Scolarité" {{ $utilisateur->poste == 'Assistante de la Scolarité' ? 'selected' : '' }}>Assistante de la Scolarité</option>
                                    <option value="Assistante de Direction" {{ $utilisateur->poste == 'Assistante de Direction' ? 'selected' : '' }}>Assistante de Direction</option>
                                    <option value="Assistante Pédagogique" {{ $utilisateur->poste == 'Assistante Pédagogique' ? 'selected' : '' }}>Assistante Pédagogique</option>
                                </select>
                            </div>
                        </div>
                        <div id="perFields" style="display: {{ $utilisateur->profil == 'PER' ? 'block' : 'none' }};">
                            <div class="form-group mb-3">
                                <label for="departement">Département</label>
                                <select name="departement" class="form-control" id="departement">
                                    <option value="Informatique" {{ $utilisateur->departement == 'Informatique' ? 'selected' : '' }}>Informatique</option>
                                    <option value="Mathematique" {{ $utilisateur->departement == 'Mathematique' ? 'selected' : '' }}>Mathématique</option>
                                    <option value="Physique" {{ $utilisateur->departement == 'Physique' ? 'selected' : '' }}>Physique</option>
                                    <option value="Science de l'eau" {{ $utilisateur->departement == 'Science de l\'eau' ? 'selected' : '' }}>Science de l'eau</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: blue;">Mettre à jour</button>
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
