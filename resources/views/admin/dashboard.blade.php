@extends('layouts.admin')

@section('title', 'Dashboard')


@section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Génrer une Rapport</h3>
                                <div class="mt-2 max-w-xl text-sm text-white-500 btn btn-info">
                                    <p>generer une rapport ce mois-ci : #</p>
                                </div>
                            </div>
                        </div>

                        <!-- Commandes -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Reservation</h3>
                                <div class="mt-2 max-w-xl text-sm text-white-500 btn btn-info">
                                    <p>Nombre total de reservation :#</p>
                                </div>
                                <div class="mt-5">
                                    <a href="{{ route('admin.reservationRessource') }}" class="text-white-500 btn btn-success">Voir les
                                        reservations</a>
                                </div>
                            </div>
                        </div>

                        <!-- Clients -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">les utilisateur</h3>
                                <div class="mt-2 max-w-xl text-sm text-white-500 btn btn-info">
                                    <p>Nombre total de clients : #</p>
                                </div>
                                <div class="mt-5">
                                    <a href="#" class="text-white-500 btn btn-success">Gestion des
                                        utilisaeurs</a>
                                </div>
                            </div>
                        </div>

                        <!-- Produits -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Les ressources</h3>
                                <div class="mt-2 max-w-xl text-sm text-white-500 btn btn-info">
                                    <p>Nombre total de produits : 679000</p>
                                </div>
                                <div class="mt-5">
                                    <a href="{{ route('admin.ressources') }}" class="text-white-500 btn btn-success">GESTION
                                        RESSOURCES</a>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
