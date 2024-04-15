@extends('layouts.admin')

@section('title', 'Projecteur')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mt-5">
        <div class="card-body ">

            <div>
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <h2>Détails d'un projecteur</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-3">
                    <img src="data:image/jpeg;base64,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"
                                        alt="">
                    </div>

                    <div class="col-md-6 mt-5">

                         <p><strong>Nom :</strong> {{ $projecteur->nomRessource }}</p>
                        <p><strong>Modele :</strong> {{ $projecteur->modele }}</p>
                        {{-- <p><strong>Decrisption :</strong> {{  $projecteur->Description }}</p> --}}
                        <p><strong>Resolution :</strong> {{ $projecteur->resolution }}</p>
                        {{-- <p><strong>Nombre de prise :</strong> {{  $projecteur->nombreDePrise	}}</p>
                        <p><strong>Disponibilité :</strong> {{  $projecteur->Etat }}</p> --}}
                        <a href="{{ route('projecteur.index') }}" class="btn btn-primary mt-3">Retour</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
