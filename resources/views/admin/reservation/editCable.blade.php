







@extends('layouts.admin')

@section('title', 'gerer les reservations')

@section('content')
     @if (session('error'))
   <div class="alert alert-danger">
       {{ session('error') }}
   </div>
@endif

    <form action="{{ route('admin.reservationCable.update', $Reservations_cable->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="date_de_reservation">Date de réservation:</label>
            <input type="date" class="form-control" id="date_de_reservation" name="date_de_reservation" value="{{ $Reservations_cable->date_de_reservation }}" required>
        </div>

        <div class="form-group">
            <label for="heure_de_debut">Heure de début:</label>
            <input type="time" class="form-control" id="heure_de_debut" name="heure_de_debut" value="{{ $Reservations_cable->heure_de_debut }}" required>
        </div>

        <div class="form-group">
            <label for="heure_de_fin">Heure de fin:</label>
            <input type="time" class="form-control" id="heure_de_fin" name="heure_de_fin" value="{{ $Reservations_cable->heure_de_fin }}" required>
        </div>

        <div class="form-group">
            <label for="Cable_ID">Câble:</label>
            <input class="form-control" id="Cable_ID" name="Cable_ID" value="{{ $Reservations_cable->Cable_ID }}">


        </div>

        <div class="form-group">
            <label for="Utilisateur_ID">Utilisateur:</label>
            <input class="form-control" id="Utilisateur_ID" name="Utilisateur_ID" value="{{ $Reservations_cable->Utilisateur_ID }}">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>






@endsection




