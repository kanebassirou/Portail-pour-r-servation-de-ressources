







@extends('layouts.admin')

@section('title', 'gerer les reservations')

@section('content')
     @if (session('error'))
   <div class="alert alert-danger">
       {{ session('error') }}
   </div>
@endif

    <form action="{{ route('admin.reservationRallonge.update',  $Reservations_rallonge->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date_de_reservation">Date de réservation:</label>
            <input type="date" class="form-control" id="date_de_reservation" name="date_de_reservation" value="{{  $Reservations_rallonge->date_de_reservation }}" required>
        </div>

        <div class="form-group">
            <label for="heure_de_debut">Heure de début:</label>
            <input type="time" class="form-control" id="heure_de_debut" name="heure_de_debut" value="{{  $Reservations_rallonge->heure_de_debut }}" required>
        </div>

        <div class="form-group">
            <label for="heure_de_fin">Heure de fin:</label>
            <input type="time" class="form-control" id="heure_de_fin" name="heure_de_fin" value="{{  $Reservations_rallonge->heure_de_fin }}" required>
        </div>

        <div class="form-group">
            <label for="Rallonge_ID">Rallonge: </label>
            <input class="form-control" id="Rallonge_ID" name="Rallonge_ID" value="{{  $Reservations_rallonge->Rallonge_ID }}">


        </div>

        <div class="form-group">
            <label for="Utilisateur_ID">Utilisateur:</label>
            <input class="form-control" id="Utilisateur_ID" name="Utilisateur_ID" value="{{  $Reservations_rallonge->Utilisateur_ID }}">
        </div>

        <button type="submit"  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-3">
        Enregistrer les modifications
    </form>
</div>


@endsection




