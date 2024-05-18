<?php

namespace App\Http\Controllers;

use App\Models\Naissance;
use App\Models\Famille;
use App\Models\Individus;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function Psy\debug;

class NaissanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create');
    }

    public function index()
    {
        $data['naissances'] = Naissance::where('status', 0)
            ->orwhere('status', 1)
            ->paginate(10);
        $data['allAttente'] = Naissance::where('status', 0)->get();
        $data['allAccepte'] = Naissance::where('status', 1)->get();
        $data['allRefuse'] = Naissance::where('status', 2)->get();
        $data['allSupprime'] = Naissance::where('status', 3)->get();

        return view('naissances.index', $data);
    }

    public function create()
    {
        $data['allFamilies'] = Famille::all();
        return view('naissances.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_complet' => 'required|string|max:255',
            'sexe_nouveau_ne' => 'required|in:M,F',
            'date_de_naissance' => 'required|date|before_or_equal:today',
            'mode_naissance' => 'required|string',
            'pere_nouveau_ne' => 'required|string|max:255',
            'mere_nouveau_ne' => 'required|string|max:255',
            'lieu_habitation_famille' => 'required|string|max:255',
        ]);

        // Déclaration de naissance
        $nouveau_ne = new Naissance($request->all());
        Auth::user() ? $nouveau_ne->status = 1 : $nouveau_ne->status = 0;

        // Création de nouvel individu
        $nom_individus = explode(' ', $nouveau_ne->nom_complet)[0];
        $nom_complet = explode(' ', $nouveau_ne->nom_complet);
        // $prenom_individu = array_slice($nom_complet, 1, sizeof($nom_complet));
        $prenom_individu = implode(' ', array_slice($nom_complet, 1, sizeof($nom_complet)));
        // Enregistrer l'individu' dans ta table individu
        $individu = new Individus();
        $individu->famille_id = $nouveau_ne->famille_id;
        $individu->nom_individu = $nom_individus;
        $individu->prenom_individu = $prenom_individu;
        $individu->sexe_individu = $nouveau_ne->sexe_nouveau_ne;
        $individu->date_naissance = $request->date_de_naissance;
        $individu->telephone = 'NULL';
        $individu->situation_matrimoniale = 'célibataire';
        $individu->profession_individu = 'NULL';
        $individu->status_indiv = 1;

        $already_exists = Naissance::where('date_de_naissance', $request->date_de_naissance)
            ->where('nom_complet', $request->nom_complet)->first();

        if (!$already_exists) {
            if ($nouveau_ne->save()) {
                $individu->save();
                return redirect()->route('naissance.index')->with('Success', 'FELICITATION ! vos informations de naissance ont été soumise avec succès.');
            } else {
                return redirect()->back()->with('Error', 'OUPS ! Une erreur est survenu lors du traitement, veuillez réessayer !');
            }
        }
    }
    public function show()
    {
    }

    public function update(Request $request, $nouveau_ne)
    {

        $nouveau_ne = Naissance::find($nouveau_ne);
        if ($nouveau_ne)
            $nouveau_ne->update(
                ['status' => $request->status]
            );
        return redirect()->back()->with('success', 'Opération effectuée');
    }
}