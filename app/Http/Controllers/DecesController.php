<?php

namespace App\Http\Controllers;

use App\Models\Deces;
use App\Models\Famille;
use Illuminate\Http\Request;

class DecesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create');
    }

    public function index()
    {
        $decedes = Deces::where('status', 0)
            ->orwhere('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10);
        $allAttente = Deces::where('status', 0)->get();
        $allAccepte = Deces::where('status', 1)->get();
        $allRefuse = Deces::where('status', 2)->get();
        $allSupprime = Deces::where('status', 3)->get();

        return view('deces.index', compact('decedes', 'allAttente', 'allAccepte', 'allRefuse', 'allSupprime'));
    }

    public function create()
    {
        $getFamilles = Famille::all();
        return view('deces.create', compact('getFamilles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_complet' => 'required|string|max:255',
            'sexe' => 'required|in:M,F',
            'fonction' => 'required|string|max:255',
            'date_de_naissance' => 'required|date|before_or_equal:today',
            'date_de_deces' => 'required|date|before_or_equal:today',
            'mode_de_deces' => 'required|string|max:255',
            'nom_referent' => 'required|string|max:255',
            'lieu_habitation' => 'required|string',
        ]);

        $save = new Deces();
        $save->famille_id = $request->famille;
        $save->nom_complet = $request->nom_complet;
        $save->sexe_decede = $request->sexe;
        $save->fonction = $request->fonction;
        $save->date_de_naissance = $request->date_de_naissance;
        $save->date_deces = $request->date_de_deces;
        $save->mode_deces = $request->mode_de_deces;
        $save->raison_deces = $request->raison_de_deces;
        $save->parents_referent = $request->nom_referent;
        $save->lieu_habitation = $request->lieu_habitation;
        $save->status = 0;

        if ($save->save()) {

            return redirect()->route('deces.index')->with('Success', 'FELICITATION ! vos informations ont été envoyé avec succès.');
        } else {

            return redirect()->back()->with('Error', 'OUPS ! Une erreur est survenu lors du traitement, veuillez réessayer !');

        }
    }

    public function show(Deces $deces)
    {
        return view('deces.show', compact('deces'));
    }

    public function update(Request $request, $decede)
    {
        $decede = Deces::find($decede);
        if ($decede)
            $decede->update(['status' => $request->input('status')]);
        return redirect()->back()->with('success', 'Opération effectuée');
    }
}