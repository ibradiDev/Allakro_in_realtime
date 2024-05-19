<?php

namespace App\Http\Controllers;

use App\Models\Individus;
use App\Models\Amenagement;
use App\Models\Demenagement;
use App\Models\Naissance;
use App\Models\Deces;
use App\Models\OffreEmploi;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth') && User::where('role', 'admin');
    }

    public function index()
    {
        $amenagementsEnr = Amenagement::where('status', 1)->get();
        $demenagementsEnr = Demenagement::where('status', 1)->get();
        $naissanceEnr = Naissance::where('status', 1)->get();
        $decesEnr = Deces::where('status', 1)->get();
        $offreEmploiEnr = OffreEmploi::where('status', 1)->get();
        $indivEnr = Individus::where('status_indiv', 1)->get();
        $indivHommeEnr = Individus::where('sexe_individu', 'M')->where('status_indiv', 1)->get();
        $indivFemmeEnr = Individus::where('sexe_individu', 'F')->where('status_indiv', 1)->get();

        return view('admin.dashboard', compact('amenagementsEnr', 'demenagementsEnr', 'naissanceEnr', 'decesEnr', 'offreEmploiEnr', 'indivEnr', 'indivHommeEnr', 'indivFemmeEnr'));
    }
}
