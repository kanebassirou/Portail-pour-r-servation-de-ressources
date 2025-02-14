<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RRSET - Rapport de Réservations</title>
        <link rel="icon" href="{{ asset('assets/img/logoSET.jpeg') }}" type="image/jpeg">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .header h1 {
            font-size: 24px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #343a40;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('assets/img/logoSET.jpeg') }}" alt="Logo UFR SET">
            <h1>Rapport de Réservations des Ressources</h1>
            <p>Université Iba Der Thiam de Thiès - UFR SET</p>
            <p>Période : du {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }} au {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}</p>
        </div>

        @php
            $categories = [
                'Salles de Classe' => $reservationsSallesClasses,
                'Rallonges' => $reservationRallonges,
                'Câbles' => $reservationCables,
                'Vidéoprojecteurs' => $reservationProjecteurs,
                'Laboratoires' => $reservationLaboratoires,
                'Salles de Réunion' => $reservationSallesReunions,
            ];
        @endphp

        @foreach ($categories as $titre => $reservations)
            @if ($reservations->isNotEmpty())
                <h2>{{ $titre }}</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Heure de début</th>
                            <th>Heure de fin</th>
                            <th>Utilisateur</th>
                            <th>Email</th>
                                <th>Profil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->date_de_reservation }}</td>
                                <td>{{ $reservation->heure_de_debut }}</td>
                                <td>{{ $reservation->heure_de_fin }}</td>
                                <td>{{ $reservation->Utilisateur->name }}</td>
                                <td>{{ $reservation->Utilisateur->email }}</td>
                                <td>{{ $reservation->Utilisateur->statusUser }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @endforeach

    </div>
</body>
</html>
