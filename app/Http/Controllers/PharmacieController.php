<?php

namespace App\Http\Controllers;

use App\Models\Pharmacie;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PharmacieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('ucwords');
    }

    public function index()
    {
        $pharmacies = Pharmacie::paginate(10);

        return view('pharmacies.index', compact('pharmacies'));
    }

    public function create()
    {
        return view('pharmacies.create');
    }
    public function edit(Pharmacie $pharmacie)
    {
        return view('pharmacies.edit', compact('pharmacie'));
    }


    public function store(Request $request)
    {
        /* $request->validate([
            'nom_pharmacie' => 'required|string|max:255',
            'emplacement' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|numeric',
        ]); */

        $pharmacie = new Pharmacie($request->all());

        $pharmacie->de_garde = 0;
        $pharmacie->status = 1;

        if (!$pharmacie->save())
            return redirect()->back()->with('error', 'Enregistrement échoué');
        return redirect()->back()->with('success', 'Opération effectuée');
    }

    public function update(Request $request, $pharmacie)
    {
        $pharmacie = Pharmacie::find($pharmacie);

        if ($request->form_type === 'modif_info') {

            /*  $request->validate([
                 'nom_pharmacie' => 'required|string|max:255',
                 'emplacement' => 'required|string',
                 'email_pharmacie' => 'required|email',
                 'telephone' => 'required|numeric',
             ]); */

            $pharmacie->nom_pharmacie = $request->nom_pharmacie;
            $pharmacie->emplacement = $request->emplacement;
            $pharmacie->email_pharmacie = $request->email_pharmacie;
            $pharmacie->telephone_pharmacie = $request->telephone;
            $pharmacie->de_garde = 0;
            $pharmacie->status = 1;

            if (!$pharmacie->save())
                return redirect()->back()->with('Error', 'Erreur lors du traitement, veuillez réessayer !');
            return redirect()->route('pharmacie.index')->with('Success', 'REUSSI ! vos informations ont été envoyé avec succès.');

        } elseif ($request->form_type === 'modif_de_garde') {

            $request->validate([
                'debut_garde' => 'required|date|after_or_equal:today',
                'fin_garde' => 'required|date|after_or_equal:debut_garde',
            ]);

            // Messages d'erreur personnalisés
            $messages = [
                'date_debut.required' => 'La date de début est obligatoire.',
                'date_debut.date' => 'La date de début doit être une date valide.',
                'date_debut.after_or_equal' => 'La date de début doit être aujourd\'hui ou ultérieure.',
                'date_fin.required' => 'La date de fin est obligatoire.',
                'date_fin.date' => 'La date de fin doit être une date valide.',
                'date_fin.after_or_equal' => 'La date de fin doit être égale ou postérieure à la date de début.',
            ];

            $pharmacie->date_debut = $request->debut_garde;
            $pharmacie->date_fin = $request->fin_garde;
            $pharmacie->de_garde = 1;

            if ($pharmacie->save()) {

                return redirect()->route('pharmacie.index')->with('Success', 'REUSSI ! vos informations ont été envoyé avec succès.');
            } else {

                return redirect()->back()->with('Error', 'Erreur lors du traitement, veuillez réessayer !');
            }

        } elseif ($request->form_type === 'modif_desactiv_garde') {

            $pharmacie->de_garde = $request->de_garde;
            $pharmacie->date_debut = NULL;
            $pharmacie->date_fin = NULL;

            if ($pharmacie->save()) {

                return redirect()->back()->with('Success', 'REUSSI ! vos informations ont été envoyé avec succès.');
            } else {

                return redirect()->back()->with('Error', 'Erreur lors du traitement, veuillez réessayer !');
            }

        } else {
            if ($pharmacie) {
                if ($request->input('de_garde'))
                    $pharmacie->update([
                        'date_debut' => null,
                        'date_fin' => null,
                        'de_garde' => $request->input('de_garde'),
                    ]);

                if ($request->input('status'))
                    $pharmacie->update(['status' => $request->input('status')]);
            }
            return redirect()->back()->with('Success', 'Opération effectuée');
        }


    }

}