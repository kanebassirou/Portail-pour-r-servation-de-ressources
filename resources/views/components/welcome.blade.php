{{-- dashboard.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tableau de bord du client')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        {{-- @if (auth()->user()->hasRole('user')) --}}
            {{-- Contenu spécifique au client --}}
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2 ">
                <div class="flex items-center">
                    <h2 class="ms-3 text-xl font-semibold text-gray-900">Tableau de bord du client</h2>
                </div>
                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    Bienvenue dans votre espace client. Vous pouvez ici gérer vos informations personnelles, consulter vos
                    réservations et accéder à d'autres services.
                </p>

                {{-- Informations détaillées du client --}}
                <div class="mt-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        {{-- Réservations --}}
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Vos réservations</h3>
                                <div class="mt-2 max-w-xl text-sm text-gray-500">
                                    <p>Vous avez actuellement <span class="font-semibold">X réservations</span> à venir.</p>
                                </div>
                                <div class="mt-5">
                                    <a href="{{ route('reservations.all') }}" class="btn btn-primary">Voir les
                                        réservations</a>
                                </div>
                            </div>
                        </div>
                        {{-- gestion des messages --}}
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    <i class="fas fa-envelope"></i> Vos messages
                                </h3>
                                <div class="mt-2 max-w-xl text-sm text-gray-500">
                                    <p>Voir les messages</p>
                                </div>
                                <div class="mt-5">
                                    <a href="#" class="btn btn-primary">consulter</a>
                                </div>
                            </div>
                        </div>
                        {{-- notifications --}}
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    <i class="fas fa-bell"></i> Notification
                                </h3>
                                <div class="mt-2 max-w-xl text-sm text-gray-500">
                                    <p>Voir les notifications</p>
                                </div>
                                <div class="mt-5">
                                    <a href="#" class="btn btn-primary">consulter</a>
                                </div>
                            </div>
                        </div>

                        {{-- Gestion du compte --}}
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Gérer votre compte</h3>
                                <div class="mt-2 max-w-xl text-sm text-gray-500">
                                    <p>Accédez à vos informations personnelles et mettez-les à jour si nécessaire.</p>
                                </div>
                                <div class="mt-5">
                                    <a href="{{ route('profile.show') }}" class="btn btn-primary">Modifier le profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
{{-- @else
    {{-- Contenu pour les autres rôles ou utilisateurs sans rôle spécifique --}}
    <div>
        <p class="text-gray-500 text-sm">Vous n'avez pas les permissions nécessaires pour voir cette page.</p>
    </div>
    {{-- @endif --}}
    </div>
@endsection
