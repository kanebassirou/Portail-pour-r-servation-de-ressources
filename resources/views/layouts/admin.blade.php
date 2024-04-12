<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Espace Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <x-app-layout>

        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                {{-- @if (auth()->user()->hasRole('user')) --}}
                    <div class="col-md-3">
                        @include('layouts.sidebar') <!-- Inclure le code de la sidebar ici -->
                    </div>
                {{-- @endif --}}

                <!-- Contenu principal -->
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
