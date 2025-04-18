@extends('layouts.base')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center py-2">
            <li class="breadcrumb-item"><a href="#" style="color: #007bff;">Réservation une salle de classe </a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: #6c757d;">reserver </li>
        </ol>
    </nav>
        <h1 class="fg-white text-center">creation de  votre réservation</h1>

@endsection




@section('content')
   {{-- Message d'erreur --}}
   @if (session('error'))
   <div class="alert alert-danger">
       {{ session('error') }}
   </div>
@endif

  <div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <form action="{{ route('reservationSalleClasse.store', ['id' => $salleClasse->id]) }}" method="POST">
            @csrf

            <div class="form-group">
                {{-- <label for="user_id">User ID</label> --}}
                <input type="hidden" name="Utilisateur_ID" id="Utilisateur_ID" class="form-control" value="{{ auth()->id() }}" readonly>
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
            <input type="hidden" name="SalleClasse_ID" value="{{ $salleClasse->id }}">


            {{-- <div class="form-group">
                <label for="resource">Ressource</label>
                 <select name="SalleClasse_ID" id="SalleClasse_ID" class="form-control">
                    <option value="{{ $salleClasse->id }}">{{ $salleClasse->nomRessource }}</option>
                    {{-- <option value="{{ $rallonge->id }}">{{ $rallonge->nomRessource }}</option> --}}
                {{-- </select>
                <input type="text" name="SalleClasse_ID" value="{{ $salleClasse->id }}">
            </div>  --}}

            <button type="submit" class="btn btn-primary mt-5">Valider votre Réservation</button>
        </form>

    <div class="mt-5"></div>
    </div>
</div>



@endsection

