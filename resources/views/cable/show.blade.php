@extends('layouts.admin')

@section('title', 'Salle de classe')

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
                        <h2>Détails de la salle de classe</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <img src="https://th.bing.com/th/id/OIP.0F1dCCaCYDkuGnWRpWDc1gHaFT?rs=1&pid=ImgDetMain"
                            alt="">
                    </div>

                    <div class="col-md-6 mt-5">
                        <p><strong>Nom :</strong> {{ $cable->nomRessource }}</p>
                        <p><strong>Capacité :</strong> {{ $cable->longueur }}</p>
                        <p><strong>Decrisption :</strong> {{ $cable->Description }}</p>
                        <p><strong>Type de prise :</strong> {{ $cable->typeDeCable }}</p>
                        <p><strong>Disponibilité :</strong> {{ $cable->Etat }}</p>
                        <a href="{{ route('cable.index') }}" class="btn btn-primary mt-3">Retour</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
