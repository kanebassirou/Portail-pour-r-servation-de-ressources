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
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Gestion des salles de classe</h3>
                                <p>Vous pouvez gérer les salles de classe en ajoutant, modifiant et supprimant des informations.</p>
                                <div class="mt-5">
                                    <a href="{{ route('salleClasse.index') }}" class="btn btn-success">Accéder aux salles de classe</a>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Gestion des rallonges</h3>
                                <p>Vous pouvez ajouter, supprimer et modifier des informations sur les rallonges.</p>
                                <div class="mt-5">
                                    <a href="{{ route('rallonge.index') }}" class="btn btn-success">Accéder aux rallonges</a>
                                </div>
                            </div>
                        </div>

                        <!-- Clients -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Gestion des vidéoprojecteurs</h3>
                                <p>Vous pouvez ajouter, modifier et supprimer des informations sur les vidéoprojecteurs.</p>
                                <div class="mt-5">
                                    <a href="{{ route('projecteur.index') }}" class="btn btn-success">Accéder aux vidéoprojecteurs</a>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Gestion des câbles</h3>
                                <p>Vous pouvez ajouter, modifier et supprimer des informations sur les câbles.</p>
                                <div class="mt-5">
                                    <a href="{{ route('cable.index') }}" class="btn btn-success">Accéder aux câbles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
