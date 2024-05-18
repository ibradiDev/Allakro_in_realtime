<?php

namespace App\Http\Controllers;

use App\Models\Amenagement;
use App\Models\Famille;
use Illuminate\Http\Request;
use Spatie\FlareClient\Api;

class AmenagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create');
    }

    public function index()
    {

        $amenagements = Amenagement::where('status', 0)
            ->orwhere('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10);
        $allAttente = Amenagement::where('status', 0)->get();
        $allAccepte = Amenagement::where('status', 1)->get();
        $allRefuse = Amenagement::where('status', 2)->get();
        $allSupprime = Amenagement::where('status', 3)->get();

        return view('amenagements.index', compact('amenagements', 'allAttente', 'allAccepte', 'allRefuse', 'allSupprime'));
    }

    public function create()
    {
        $getFamilles = Famille::all();
        return view('amenagements.create', compact('getFamilles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_complet' => 'required|string|max:255',
            'sexe' => 'required|in:M,F',
            'fonction' => 'required|string|max:255',
            'date_de_naissance' => 'required|date|before_or_equal:today',
            'provenance' => 'required|string|max:255',
            'mode_hebergement' => 'required|string|max:255',
            'date_de_amenagement' => 'required|date|before_or_equal:today',
            'lieu_habitation' => 'required|string|max:255',
        ]);

        $save = new Amenagement();
        $save->famille_id = $request->famille;
        $save->nom_complet_amg = $request->nom_complet;
        $save->sexe_amg = $request->sexe;
        $save->fonction_amg = $request->fonction;
        $save->date_de_naissance = $request->date_de_naissance;
        $save->date_amenagement = $request->date_de_amenagement;
        $save->provenance = $request->provenance;
        $save->mode_hebergement = $request->mode_hebergement;
        $save->lieu_habitation = $request->lieu_habitation;
        $save->status = 0;

        if ($save->save()) {

            return redirect()->route('amenagement.index')->with('Success', 'Succès ! vos informations d\'amenagement ont été envoyé avec succès.');
        } else {

            return redirect()->back()->with('Error', 'OUPS ! Une erreur est survenu lors du traitement, veuillez réessayer !');
        }
    }

    public function show(Amenagement $amenagement)
    {
        return view('amenagements.show', ['amenagement' => $amenagement]);
    }

    public function update(Request $request, $amenagee)
    {
        $amenagee = Amenagement::find($amenagee);
        if ($amenagee)
            $amenagee->update(['status' => $request->input('status')]);
        return redirect()->back()->with('Success', 'Opération effectuée');
    }
}