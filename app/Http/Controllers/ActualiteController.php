<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\ProjetMairie;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $actualites = Actualite::where('status', 1)->paginate(10);
        $projets = ProjetMairie::paginate(10);

        return view('actualite.index', compact('actualites', 'projets'));
    }

    public function create()
    {
        return view('actualite.create');
    }

    public function store(Request $request)
    {
        $actualite = new Actualite($request->all());

        if (!$actualite->save())
            return redirect()->back()->with('Error', 'Nous avons rencontré une erreur');

        return redirect()->route('actualites.index')->with('success', 'Information publiée');

    }

    public function edit(Actualite $actualite)
    {
        return view('actualite.edit', compact('actualite'));
    }

    public function update(Request $request, $actualite)
    {

        /* $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]); */

        $actualite = Actualite::find($actualite);

        if ($request->form_type === 'form_edit') {

            if (!$actualite->update($request->all()))
                return redirect()->back()->with('Error', 'Une erreur s\'est produite lors de la sauvegarde, veuillez réessayer');
            else
                return redirect()->route('actualites.index')->with('Success', 'BRAVO! Actualité modifié avec succès.');

        } else {
            $actualite->update(['status' => $request->input('status')]);
            return redirect()->back()->with('Success', 'Opération effectuée');
        }


    }
}