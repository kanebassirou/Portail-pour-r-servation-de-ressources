<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapport de Réservations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333333;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
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
            margin: 0;
        }

        .header p {
            font-size: 14px;
            margin: 2px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th, table td {
            padding: 8px 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #343a40;
            color: #ffffff;
        }

        table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .section-title {
            font-size: 18px;
            margin-top: 30px;
            margin-bottom: 10px;
            color: #333333;
            border-bottom: 2px solid #343a40;
            display: inline-block;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666666;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- En-tête du rapport -->
        <div class="header">
            <img src="{{ public_path('assets/img/logoSET.jpeg') }}" alt="Logo UFR SET">
            <h1>Rapport de Réservations des Ressources</h1>
            <p>Université Iba Der Thiam de Thiès - UFR SET</p>
            <p>Période : du {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }} au {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}</p>
        </div>

        <!-- Section : Réservations par catégorie -->
        @foreach ([
            ['title' => 'Salles de Classes', 'reservations' => $reservationsSallesClasses],
            ['title' => 'Rallonges', 'reservations' => $reservationRallonges],
            ['title' => 'Câbles', 'reservations' => $reservationCables],
            ['title' => 'Vidéoprojecteurs', 'reservations' => $reservationProjecteurs],
            ['title' => 'Laboratoires', 'reservations' => $reservationLaboratoires],
            ['title' => 'Salles de Réunion', 'reservations' => $reservationSallesReunions]
        ] as $category)
            <h2 class="section-title">Réservations {{ $category['title'] }}</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Nom </th>
                        <th>Email</th>
                      <th>Profil</th>


                    </tr>
                </thead>
                <tbody>
                    @forelse ($category['reservations'] as $reservation)
                        <tr>
                            <td>{{ $reservation->date_de_reservation }}</td>
                            <td>{{ $reservation->heure_de_debut }}</td>
                            {{-- <td>{{ $reservation->salleClasse->nomRessource ?? $reservation->rallonges->nomRessource ?? $reservation->cables->nomRessource ?? $reservation->projecteurs->nomRessource ?? $reservation->laboratoires->nomRessource ?? $reservation->salleReunion->nomRessource }}</td> --}}
                            <td>{{ $reservation->utilisateur->name }}</td>
                            <td>{{ $reservation->utilisateur->email }}</td>
                            <td>{{ $reservation->utilisateur->statusUser }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Aucune réservation trouvée pour cette catégorie.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        @endforeach

        <!-- Pied de page -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Université Iba Der Thiam - UFR SET. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
