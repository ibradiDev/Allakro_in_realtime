<?php

namespace App\Http\Controllers;

use App\Models\Epidemie;
use Illuminate\Http\Request;

class EpidemieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $epidemies = Epidemie::where('status', 1)->orderBy('id', 'DESC')->paginate(5);
        return view('epidemies.index', compact('epidemies'));
    }

    public function create()
    {
        return view('epidemies.create');
    }

    public function store(Request $request)
    {
        /* $request->validate([
            'nom_epidemie' => 'required|string|max:255',
            'zone_concernee' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'nombre_de_cas' => 'required|numeric',
            'nombre_de_victime' => 'required|numeric',
            'mesure_preventive' => 'required|string',
        ]); */

        $valeurCaseACocher = $request->has('checkbox') ? 1 : 0;

        $epidemie = new Epidemie();
        $epidemie->nom_epidemie = $request->nom_epidemie;
        $epidemie->debut_epidemie = $request->date_debut;
        $epidemie->fin_epidemie = $request->date_fin;
        $epidemie->nombre_de_cas_epidemie = $request->nombre_de_cas;
        $epidemie->nombre_de_deces_epidemie = $request->nombre_de_victime;
        $epidemie->mesure_preventive = $request->mesure_preventive;
        $epidemie->zone_concernee = $request->zone_concernee;
        $epidemie->is_active = $valeurCaseACocher; 
        $epidemie->status = 1;

        if ($epidemie->save())
            return redirect()->route('epidemies.index')->with('Success', 'BRAVO! Epidemie publiée avec succès.');
        else
            return redirect()->back()->with('Error', 'Une erreur s\'est produite lors de la sauvegarde, veuillez réessayer');
            
    }

    public function edit(Epidemie $epidemy)
    {
        return view('epidemies.edit', compact('epidemy'));
    }

    public function update(Request $request, $epidemie)
    {
        $epidemie = Epidemie::find($epidemie);

        if ($request->form_type === 'form_edit') {

            if (!$epidemie->update($request->all()))
                return redirect()->back()->with('Error', 'Oups! Nous avons rencontré un problème');
            return redirect()->route('epidemies.index')->with('Success', 'Opération effectuée');

        } elseif ($request->form_active === 'is_active_form') {

            $epidemie->update(['is_active' => $request->input('is_active')]);

            return redirect()->back()->with('Success', 'Opération effectuée');

        } else {

            if ($epidemie)
                if (!$epidemie->update(['status' => $request->input('status')]))
                    return redirect()->back()->with('Error', 'Oups! Nous avons rencontré un problème');
            return redirect()->route('epidemies.index')->with('Success', 'Opération effectuée');
        }
    }


}