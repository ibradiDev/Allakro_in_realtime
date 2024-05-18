<?php

namespace App\Http\Controllers;

use App\Models\ProjetMairie;
use Illuminate\Http\Request;

class ProjetsMairieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*  public function index()
     {
         $projets = ProjetMairie::all();

         return view('projet.index', compact('projets'));
     }

    public function create()
    {
        return view('actualite.create');
    }*/

    // public function store(Request $request)
    // {
    //     /* $request->validate([
    //         'titre'                 => 'required|string|max:255',
    //         'description_projet'    => 'required|string',
    //     ]); */

    //     $save = new ProjetMairie();
    //     $save->titre = $request->titre;
    //     $save->description_projet = $request->description_projet;
    //     $save->debut_projet = $request->debut_garde;
    //     $save->fin_projet = $request->fin_garde;
    //     $save->status = 1;

    //     if ($save->save()) {

    //         return redirect()->route('actualites.index')->with('Success', 'BRAVO! projet de la mairie publié avec succès.');
    //     } else {

    //         return redirect()->back()->with();
    //     }
    // }

    public function edit(ProjetMairie $projet)
    {
        return view('actualite.edit', compact('projet'));
    }

    public function store(Request $request)
    {
        $projet = new ProjetMairie($request->all());

        if (!$projet->save())
            return redirect()->back()->with('Error', 'Une erreur s\'est produite lors de la sauvegarde, veuillez réessayer');
        return redirect()->route('actualites.index')->with('Success', 'Le projet a bien été publié');

    }

    public function update(Request $request, $projet)
    {
        $projet = ProjetMairie::find($projet);

        if ($request->form_type === 'form_edit') {

            $request->validate([
                'titre' => 'required|string|max:255',
                'description_projet' => 'required|string',
                'debut_projet' => 'required|string|date|after_or_equal:today',
                'fin_projet' => 'required|string|date|after_or_equal:debut_projet',
            ]);

            $projet->titre = $request->titre;
            $projet->description_projet = $request->description_projet;
            $projet->debut_projet = $request->debut_projet;
            $projet->fin_projet = $request->fin_projet;

            if ($projet->save())
                return redirect()->route('actualites.index')->with('Success', 'BRAVO! le projet à été modifié avec succès.');
            else
                return redirect()->back()->with('Error', 'Une erreur s\'est produite lors de la sauvegarde, veuillez réessayer');

        } else {

            if ($projet)
                $projet->update(['status' => $request->input('status')]);
            return redirect()->back()->with('Success', 'Opération effectuée');
        }
    }
}