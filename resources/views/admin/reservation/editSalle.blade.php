







@extends('layouts.admin')

@section('title', 'gerer les reservations')

@section('content')
     @if (session('error'))
   <div class="alert alert-danger">
       {{ session('error') }}
   </div>
@endif

    <form action="{{ route('admin.reservationSalle.update', $Reservations_salles_classes->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date_de_reservation">Date de réservation:</label>
            <input type="date" class="form-control" id="date_de_reservation" name="date_de_reservation" value="{{ $Reservations_salles_classes->date_de_reservation }}" required>
        </div>

        <div class="form-group">
            <label for="heure_de_debut">Heure de début:</label>
            <input type="time" class="form-control" id="heure_de_debut" name="heure_de_debut" value="{{ $Reservations_salles_classes->heure_de_debut }}" required>
        </div>

        <div class="form-group">
            <label for="heure_de_fin">Heure de fin:</label>
            <input type="time" class="form-control" id="heure_de_fin" name="heure_de_fin" value="{{ $Reservations_salles_classes->heure_de_fin }}" required>
        </div>

        <div class="form-group">
            <label for="SalleClasse_ID">Salle de classe : </label>
            <input class="form-control" id="SalleClasse_ID" name="SalleClasse_ID" value="{{ $Reservations_salles_classes->SalleClasse_ID }}">


        </div>

        <div class="form-group">
            <label for="Utilisateur_ID">Utilisateur:</label>
            <input class="form-control" id="Utilisateur_ID" name="Utilisateur_ID" value="{{ $Reservations_salles_classes->Utilisateur_ID }}">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>


@endsection




