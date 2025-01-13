<!DOCTYPE html>
<html>
<head>
    <title>Rapport de Réservations</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
   <h1>Rapport de Réservations des differentes  ressources</h1>
    <h2>Période : du {{$startDate }} au {{$endDate }}</h2>
    <h2>Réservations Salles Classes</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Nom du ressource</th>
                <th>Nom utilisateur</th>
                 <th>Email utilisateur</th>

            </tr>
        </thead>
        <tbody>
            @forelse($reservationsSallesClasses as $reservation)
                <tr>
                    <td>{{ $reservation->date_de_reservation }}</td>
                    <td>{{ $reservation->heure_de_debut}}</td>
                    <td>{{ $reservation->salleClasse->nomRessource }}</td>
                    <td>{{  $reservation->utilisateur->name }}</td>
                    <td>{{  $reservation->utilisateur->email }}</td>

                </tr>
            @empty
                <tr><td colspan="4">Aucune réservation de salle de classe trouvée.</td></tr>
            @endforelse
        </tbody>
    </table>
    <br>

    <h2>Réservations Rallonges</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Nom du ressource</th>
                <th>nom d'utilisateur</th>
                <th>Email d'utilisateur</th>

            </tr>
        </thead>
        <tbody>
            @forelse($reservationRallonges as $reservation)
                <tr>
                    <td>{{ $reservation->date_de_reservation }}</td>
                    <td>{{ $reservation->heure_de_debut}}</td>
                    <td>{{ $reservation->rallonges->nomRessource }}</td>
                    <td>{{  $reservation->utilisateur->name }}</td>
                    <td>{{  $reservation->utilisateur->email }}</td>

                </tr>
            @empty
                <tr><td colspan="4">Aucune réservation de rallonge trouvée.</td></tr>
            @endforelse
        </tbody>
    </table>
    <br>

    <h2>Réservations Cables</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Nom du ressource</th>
                <th>Nom utilisateur</th>
                <th>Email utilisateur</th>

            </tr>
        </thead>
        <tbody>
            @forelse($reservationCables as $reservation)
                <tr>
                    <td>{{ $reservation->date_de_reservation }}</td>
                    <td>{{ $reservation->heure_de_debut}}</td>
                    <td>{{ $reservation->cables->nomRessource }}</td>
                    <td>{{  $reservation->utilisateur->name }}</td>
                    <td>{{  $reservation->utilisateur->email }}</td>

                </tr>
            @empty
                <tr><td colspan="4">Aucune réservation de cable trouvée.</td></tr>
            @endforelse
        </tbody>
    </table>
    <br>
     <h2>Réservations pour les video-projecteur</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Nom du ressource</th>
                <th>Nom d'utilisateur</th>
                <th>Email d'utilisateur</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservationProjecteurs as $reservation)
                <tr>
                    <td>{{ $reservation->date_de_reservation }}</td>
                    <td>{{ $reservation->heure_de_debut}}</td>
                    <td>{{ $reservation->projecteurs->nomRessource }}</td>
                    <td>{{  $reservation->utilisateur->name }}</td>
                    <td>{{  $reservation->utilisateur->email }}</td>
                </tr>
            @empty
                <tr><td colspan="4">Aucune réservation de video_projecteur trouvée.</td></tr>
            @endforelse
        </tbody>
    </table>
     <br>
     <h2>Réservations pour les laboratoires</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Nom du ressource</th>
                <th>Nom utilisateur</th>
                <th>Email d'utilisateur</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservationLaboratoires as $reservation)
                <tr>
                    <td>{{ $reservation->date_de_reservation }}</td>
                    <td>{{ $reservation->heure_de_debut}}</td>
                    <td>{{ $reservation->laboratoires->nomRessource }}</td>
                    <td>{{  $reservation->utilisateur->name }}</td>
                    <td>{{  $reservation->utilisateur->email }}</td>

                </tr>
            @empty
                <tr><td colspan="4">Aucune réservation de laboratoire trouvée.</td></tr>
            @endforelse
        </tbody>
    </table>
         <h2>Réservations pour les salles de reunion </h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Nom du ressource</th>
                <th>Nom d'utilisateur</th>
                <th>email d'utilisateur</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservationSallesReunions as $reservation)
                <tr>
                    <td>{{ $reservation->date_de_reservation }}</td>
                    <td>{{ $reservation->heure_de_debut}}</td>
                    <td>{{ $reservation->salleReunion->nomRessource }}</td>
                    <td>{{  $reservation->utilisateur->name }}</td>
                    <td>{{  $reservation->utilisateur->email }}</td>

                </tr>
            @empty
                <tr><td colspan="4">Aucune réservation de laboratoire trouvée.</td></tr>
            @endforelse
        </tbody>
    </table>


</body>
</html>
