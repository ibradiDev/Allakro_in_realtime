<?php

namespace App\Http\Controllers;

use App\Models\OffreEmploi;
use Illuminate\Http\Request;

class OffreEmploiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create');
    }

    public function index()
    {

        $offres = OffreEmploi::where('status', 0)
            ->orwhere('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10);
        $allAttente = OffreEmploi::where('status', 0)->get();
        $allAccepte = OffreEmploi::where('status', 1)->get();
        $allRefuse = OffreEmploi::where('status', 2)->get();
        $allSupprime = OffreEmploi::where('status', 3)->get();

        return view('offres-emploi.index', compact('offres', 'allAttente', 'allAccepte', 'allRefuse', 'allSupprime'));
    }

    public function create()
    {
        return view('offres-emploi.create');
    }

    public function store(Request $request)
    {
        /* $request->validate([
            'nom_complet' => 'required|string|max:255',
            'service' => 'required|string',
            'competance' => 'required|string',
            'numero' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email',
            'message' => 'required|string',
        ]); */

        $offre = new OffreEmploi($request->all());

        // dd($offre);die();

        $offre->status = 1;
        $offre->image = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = 'offre_projet_id_image34JK90L' . time() . '.' . $extention;
            $file->move('image/', $filename);

            $offre->image = $filename;
        }

        if (!$offre->save())
            return redirect()->back()->with('Error', 'Erreur lors du traitement, veuillez réessayer !');

        return redirect()->route('offre-emploi.index')->with('Success', 'REUSSI ! vos informations ont été envoyé avec succès.');

    }

    public function show(OffreEmploi $offre_emploi)
    {
        return view('offres-emploi.show');
    }

    public function update(Request $request, $offre)
    {
        $offre = OffreEmploi::find($offre);
        if ($offre)
            if (!$offre->update(['status' => $request->input('status')]))
                return redirect()->back()->with('Error', 'Echec de l\'opération');
        return redirect()->back()->with('success', 'Opération effectuée');
    }


}