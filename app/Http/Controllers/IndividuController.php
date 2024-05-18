<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use App\Models\Individus;
use App\Models\Naissance;
use App\Models\Deces;
use App\Models\Amenagement;
use App\Models\Demenagement;
use Illuminate\Http\Request;

class IndividuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $individus = Individus::where('status_indiv', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10);
        $allUnreg = Individus::where('status_indiv', 0)->orderBy('id', 'DESC')->get();

        return view('individus.index', compact('individus', 'allUnreg'));
    }

    public function create()
    {
        $getFamilles = Famille::all();
        return view('individus.create', compact('getFamilles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_individu' => 'required|string|max:255',
            'prenom_individu' => 'required|string|max:255',
            'sexe_individu' => 'required|in:M,F',
            'profession_individu' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'telephone' => 'required|numeric',
            'situation_matrimoniale' => 'required|string|max:255',
        ]);

        if (!$request->famille == null) {
            $findFamille = Famille::where('nom_famille', $request->famille)->first();

            if (!$findFamille) {

                $saveFamille = new Famille();
                $saveFamille->nom_famille = $request->famille;
                $saveFamille->status = 0;
                $saveFamille->save();

                // Récupérer l'ID de la nouvelle famille
                $familleId = $saveFamille->id;
            } else {
                // Récupérer l'ID de la famille existante
                $familleId = $findFamille->id;
            }

            $individu = new Individus($request->all());
            $individu->famille_id = $familleId;
            $individu->status_indiv = 1;

            if ($individu->save()) {

                return redirect()->route('individus.index')->with('Success', 'Individu enregistré avec succès !');
            } else {


                return redirect()->back()->with('Error', 'Une erreur s\'est produite lors de la sauvegarde, veuillez réessayer');
            }

        } else {

            if ($request->familleSelected == null) {

                return redirect()->back()->with('Error', 'Veuillez selectionner une famille ou entrer directement le nom de la famille pour cet individu s\'il vous plait.');
            }

            $saveIndividu = new Individus();
            $saveIndividu->famille_id = $request->familleSelected;
            $saveIndividu->nom_individu = $request->nom_individu;
            $saveIndividu->prenom_individu = $request->prenom_individu;
            $saveIndividu->sexe_individu = $request->sexe_individu;
            $saveIndividu->profession_individu = $request->profession_individu;
            $saveIndividu->date_naissance = $request->date_naissance;
            $saveIndividu->telephone = $request->telephone;
            $saveIndividu->situation_matrimoniale = $request->situation_matrimoniale;
            $saveIndividu->status_indiv = 1;

            if ($saveIndividu->save()) {

                return redirect()->route('individus.index')->with('Success', 'Individu enregistré avec succès !');
            } else {

                return redirect()->back()->with('Error', 'Une erreur s\'est produite lors de la sauvegarde, veuillez réessayer');
            }
        }
    }

    public function show(Individus $individu)
    {
        $individuNaissance = Naissance::where('individus_sended_id', $individu->id)->where('status', 1)->orderBy('id', 'DESC')->get();
        // dd($individuNaissance);
        $individuDeces = Deces::where('status', 1)->where('individus_sended_id', $individu->id)->orderBy('id', 'DESC')->get();
        $individuAmenagement = Amenagement::where('status', 1)->where('indiv_sended_id', $individu->id)->orderBy('id', 'DESC')->get();
        $individuDemenagement = Demenagement::where('status', 1)->where('individu_sended_id', $individu->id)->orderBy('id', 'DESC')->get();

        return view('individus.show', compact('individu', 'individuNaissance', 'individuDeces', 'individuAmenagement', 'individuDemenagement'));
    }

    public function edit(Individus $individu)
    {
        $getFamilles = Famille::all();

        return view('individus.edit', compact('individu', 'getFamilles'));
    }

    public function update(Request $request, $individu)
    {
        $individu = Individus::find($individu);

        if ($request->formedit === 'edit_info') {

            /*  $request->validate([
                 'nom_individu'              => 'required|string|max:255',
                 'prenom_individu'           => 'required|string|max:255',
                 'sexe_individu'             => 'required|in:M,F',
                 'profession_individu'       => 'required||string|max:255',
                 'date_naissance'            => 'required|date',
                 'telephone'                 => 'required|numeric',
                 'situation_matrimoniale'    => 'required|string|max:255',
                 'famille'                   => 'required|string',
             ]); */

            $individu->famille_id = $request->famille;
            $individu->nom_individu = $request->nom_individu;
            $individu->prenom_individu = $request->prenom_individu;
            $individu->sexe_individu = $request->sexe_individu;
            $individu->profession_individu = $request->profession_individu;
            $individu->date_naissance = $request->date_naissance;
            $individu->telephone = $request->telephone;
            $individu->situation_matrimoniale = $request->situation_matrimoniale;
            $individu->status_indiv = 1;

            if ($individu->save()) {

                return redirect()->route('individus.index')->with('Success', 'Individu enregistré avec succès !');
            } else {

                return redirect()->back()->with('Error', 'Une erreur s\'est produite lors de la sauvegarde, veuillez réessayer');
            }

        } else {

            if ($individu)
                $individu->update(['status' => $request->input('status')]);
            return redirect()->route('individus.index')->with('Success', 'Opération effectuée');
        }


    }
}