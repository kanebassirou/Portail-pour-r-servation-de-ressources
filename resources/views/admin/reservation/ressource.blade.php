@extends('layouts.admin')

@section('title', 'les réservations')

@section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- salle de classe  -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Gestion des réservations pour les salles de classe</h3>
                                <p>Consultez les différentes réservations pour les salles de classe.</p>
                                <div class="mt-5">
                                    <a href="{{ route('admin.reservationsSalle') }}" class="btn btn-success">Voir les réservations</a>
                                </div>
                            </div>
                        </div>

                        <!-- Rallonge -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Gestion des réservations pour les rallonges</h3>
                                <p>Consultez les différentes réservations pour les rallonges.</p>
                                <div class="mt-5">
                                    <a href="{{ route('admin.reservationsRallonge') }}" class="btn btn-success">Voir les réservations</a>
                                </div>
                            </div>
                        </div>

                        <!-- Cable -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Gestion des réservations pour les câbles</h3>
                                <p>Consultez les différentes réservations pour les câbles.</p>
                                <div class="mt-5">
                                    <a href="{{ route('admin.reservationsCable') }}" class="btn btn-success">Voir les réservations</a>
                                </div>
                            </div>
                        </div>

                        <!-- Projecteur -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Gestion des réservations pour les projecteurs</h3>
                                <p>Consultez les différentes réservations pour les projecteurs.</p>
                                <div class="mt-5">
                                    <a href="{{ route('admin.reservationsProjecteur') }}" class="btn btn-success">Voir les réservations</a>
                                </div>
                            </div>
                        </div>

                        <!-- labo -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Gestion des réservations pour des labo</h3>
                                <p>Consultez les différentes réservations pour les laboratoires.</p>
                                <div class="mt-5">
                                    <a href="{{ route('admin.reservationsLaboratoire') }}" class="btn btn-success">Voir les réservations</a>
                                </div>
                            </div>
                        </div>
                        <!-- salle de reunion -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Gestion des réservations pour la salle de reunions</h3>
                                <p>Consultez les différentes réservations pour la salle de reunion.</p>
                                <div class="mt-5">
                                    <a href="{{ route('admin.reservationsReunion') }}" class="btn btn-success">Voir les réservations</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
