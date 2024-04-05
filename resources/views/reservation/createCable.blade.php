@extends('layouts.base')

@section('content')
   {{-- Message d'erreur --}}
   @if (session('error'))
   <div class="alert alert-danger">
       {{ session('error') }}
   </div>
@endif

  <div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <form action="{{ route('reservationCable.store', ['id' =>  $cable->id]) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="text" name="Utilisateur_ID" id="Utilisateur_ID" class="form-control" value="{{ auth()->id() }}" readonly>
            </div>



            <div class="form-group">
                <label for="start_date">Date</label>
                <input type="date" name="date_de_reservation" id="date_de_reservation" class="form-control">
            </div>

            <div class="form-group">
                <label for="heure_debut">Heure début:</label>
                <input type="time" id="heure_de_debut" name="heure_de_debut" class="form-control">

                <label for="heure_fin">Heure Fin:</label>
                <input type="time" id="heure_de_fin" name="heure_de_fin" class="form-control">
            </div>
            <input type="text" name="Cable_ID" value="{{ $cable->id }}">



            {{-- <div class="form-group">
                <label for="resource">Ressource</label>
                 <select name="Rallonge_ID" id="Rallonge_ID" class="form-control">
                    <option value="{{ $rallonge->id }}">{{ $rallonge->nomRessource }}</option>
                    {{-- <option value="{{ $rallonge->id }}">{{ $rallonge->nomRessource }}</option> --}}
                {{-- </select>
            </div>
            <input type="text" name="Rallonge_ID" value="{{ $rallonge->id }}"> --}}


            <button type="submit" class="btn btn-primary mt-5">Valider votre Réservation</button>
        </form>

    <div class="mt-5"></div>
    </div>
</div>



@endsection

