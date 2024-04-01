@extends('layouts.base')

@section('content')

  <div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <form action="{{ route('reservation.store', ['nomRessource' => $salleClasse->nomRessource]) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="text" name="Utilisateur_ID_Utilisateur" id="Utilisateur_ID_Utilisateur" class="form-control" value="{{ auth()->id() }}" readonly>
            </div>



            <div class="form-group">
                <label for="start_date">Date</label>
                <input type="date" name="date_de_réservation" id="date_de_réservation" class="form-control">
            </div>

            <div class="form-group">
                <label for="heure_debut">Heure début:</label>
                <input type="time" id="heure_de_début" name="heure_de_début" class="form-control">

                <label for="heure_fin">Heure Fin:</label>
                <input type="time" id="heure_de_fin" name="heure_de_fin" class="form-control">
            </div>
            <input type="hidden" name="Ressource_ID_Ressource" value="{{ $salleClasse->id }}">


            {{-- <div class="form-group">
                <label for="resource">Ressource</label>
                <select name="Ressource_ID_Ressource" id="Ressource_ID_Ressource" class="form-control">
                    <option value="1">Ressource 1</option>
                    <option value="2">Ressource 2</option>
                    <option value="3">Ressource 3</option>
                </select>
            </div> --}}

            <button type="submit" class="btn btn-primary mt-5">Valider votre Réservation</button>
        </form>

    <div class="mt-5"></div>
    </div>
</div>



@endsection

