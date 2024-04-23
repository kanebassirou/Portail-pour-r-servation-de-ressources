<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Rallonge;
use App\Models\Reservation;
use App\Models\reservation_projecteur;
use App\Models\Reservations_cable;
use App\Models\Reservations_rallonge;
use App\Models\Reservations_salles_classes;
use App\Models\SalleClasse;
use App\Models\VideoProjecteur;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexSalle()
    {
        $reservationSalles = Reservations_salles_classes::with(['salleClasse', 'utilisateur'])->orderBy('date_de_reservation', 'desc')->get();

        return view('admin.reservation.indexSalle', compact('reservationSalles'));
    }
    public function indexCable()
    {
        $reservationCables = Reservations_cable::with(['cables', 'utilisateur'])->orderBy('date_de_reservation', 'desc')->get();

        return view('admin.reservation.indexCable', compact('reservationCables'));
    }
    public function indexRallonge()
    {
        $reservationRallonges = Reservations_rallonge::with(['rallonges', 'utilisateur'])->orderBy('date_de_reservation', 'desc')->get();

        return view('admin.reservation.indexRallonge', compact('reservationRallonges'));
    }
    public function indexProjecteur()
    {
             $reservationProjecteurs = reservation_projecteur::with(['projecteurs', 'utilisateur'])->orderBy('date_de_reservation', 'desc')->get();

        return view('admin.reservation.indexProjecteur', compact('reservationProjecteurs'));
    }


    // App\Http\Controllers\ReservationController.php

    public function indexAllReservations()
    {
        $user = auth()->user();
        $sallesClasses = Reservations_salles_classes::with('salleClasse')->where('Utilisateur_ID', $user->id)->latest()->take(3)->get();
        $rallonges = Reservations_rallonge::with('rallonges')->where('Utilisateur_ID', $user->id)->latest()->take(3)->get();
        $projecteurs = reservation_projecteur::with('projecteurs')->where('Utilisateur_ID', $user->id)->latest()->take(3)->get();
        $cables = Reservations_cable::with('cables')->where('Utilisateur_ID', $user->id)->latest()->take(3)->get();

        return view('reservation.index', compact('sallesClasses', 'rallonges', 'projecteurs', 'cables'));
    }




    // public function indexReservationsSalleClasse()
    // {
    //     $reservations = Reservations_salles_classes::all();
    //     return view('index', ['reservations' => $reservations]);
    // }

    // public function indexReservationsCable()
    // {
    //     $reservations = Reservations_cable::all();
    //     return view('index', ['reservations' => $reservations]);
    // }
    // public function indexReservationsRallonge()
    // {
    //     $reservations = Reservations_rallonge::all();
    //     return view('index', ['reservations' => $reservations]);
    // }
    // public function indexReservationsProjecteur()
    // {
    //     $reservations = reservation_projecteur::all();
    //     return view('index', ['reservations' => $reservations]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create($nomRessource)
    {

    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $nomRessource)
    {
        //

        // dd($validated);


    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
