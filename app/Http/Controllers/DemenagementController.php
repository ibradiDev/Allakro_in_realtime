<?php

namespace App\Http\Controllers;

use App\Models\Demenagement;
use App\Models\Famille;
use Illuminate\Http\Request;

class DemenagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create');
    }

    public function index()
    {

        $demenagements = Demenagement::where('status', 0)
            ->orwhere('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10);
        $allAttente = Demenagement::where('status', 0)->get();
        $allAccepte = Demenagement::where('status', 1)->get();
        $allRefuse = Demenagement::where('status', 2)->get();
        $allSupprime = Demenagement::where('status', 3)->get();

        return view('demenagements.index', compact('demenagements', 'allAttente', 'allAccepte', 'allRefuse', 'allSupprime'));
    }


    public function create()
    {
        $getFamilles = Famille::all();
        return view('demenagements.create', compact('getFamilles'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nom_complet' => 'required|string|max:255',
            'sexe' => 'required|in:M,F',
            'fonction' => 'required|string|max:255',
            'date_de_naissance' => 'required|date|before_or_equal:today',
            'date_de_demenagement' => 'required|date|before_or_equal:today',
            'lieu_habitation' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
        ]);

        $save = new Demenagement();
        $save->famille_id = $request->famille;
        $save->nom_complet_dmg = $request->nom_complet;
        $save->sexe_dmg = $request->sexe;
        $save->fonction_dmg = $request->fonction;
        $save->date_de_naissance = $request->date_de_naissance;
        $save->date_demenagement = $request->date_de_demenagement;
        $save->destination = $request->lieu_habitation;
        $save->status = 0;

        if ($save->save()) {

            return redirect()->route('demenagement.index')->with('Success', 'BRAVO ! vos informations de démenagement ont été envoyé avec succès.');
        } else {

            return redirect()->back()->with('Error', 'OUPS ! Une erreur est survenu lors du traitement, veuillez réessayer !');
            ;
        }
    }

    public function show(Demenagement $demenagement)
    {
        return view('demenagements.show');
    }

    public function update(Request $request, $demenagee)
    {
        $demenagee = Demenagement::find($demenagee);
        if ($demenagee)
            $demenagee->update(['status' => $request->input('status')]);
        return redirect()->back()->with('Success', 'Opération effectuée');
    }

}