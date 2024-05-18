<?php

namespace App\Http\Controllers;

use App\Models\Maladie;
use Illuminate\Http\Request;

class MaladieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $maladies = Maladie::where('status', 1)->orderBy('id', 'DESC')->paginate(8);

        return view('maladies.index', compact('maladies'));
    }

    public function create()
    {
        return view('maladies.create');
    }

    public function store(Request $request)
    {

        /* $request->validate([
            'nom_maladie' => 'required|string|max:255',
            'mode_transmission' => 'required|string|max:500',
            'caracteristique' => 'required|string|max:500',
            'description' => 'required|string',
        ]); */

        $valeurCaseACocher = $request->has('checkbox') ? 1 : 0;
        if ($valeurCaseACocher === 1) {

            $save = new Maladie();
            $save->nom_maladie = $request->nom_maladie;
            $save->description_maladie = $request->description;
            $save->mode_transmission_maladie = $request->mode_transmission;
            $save->caracteristique_maladie = $request->caracteristique;
            $save->is_active = 1;
            $save->status = 1;

            if ($save->save()) {

                return redirect()->route('maladies.index')->with('Success', 'BRAVO! maladie publiée avec succès.');
            } else {

                return redirect()->back()->with('Error', 'Une erreur s\'est produite lors de la sauvegarde, veuillez réessayer');
            }
        } else {

            $save_data = new Maladie();
            $save_data->nom_maladie = $request->nom_maladie;
            $save_data->description_maladie = $request->description;
            $save_data->mode_transmission_maladie = $request->mode_transmission;
            $save_data->caracteristique_maladie = $request->caracteristique;
            $save_data->is_active = 0;
            $save_data->status = 1;

            if ($save_data->save()) {

                return redirect()->route('maladies.index')->with('Success', 'BRAVO! maladie publiée avec succès.');
            } else {

                return redirect()->back()->with('Error', 'Une erreur s\'est produite lors de la sauvegarde, veuillez réessayer');
            }
        }
    }

    public function edit(Maladie $malady)
    {
        return view('maladies.edit', compact('malady'));
    }

    public function update(Request $request, $maladie)
    {
        $maladie = Maladie::find($maladie);

        if ($request->form_type === 'form_edit') {

            if (!$maladie->update($request->all()))
                return redirect()->back()->with('Error', 'Oups! Nous avons rencontré un problème');
            return redirect()->route('maladies.index')->with('Success', 'Opération effectuée');

        } elseif ($request->form_active === 'is_active_form') {
            if (!$maladie->update(['is_active' => $request->input('is_active')]))
                return redirect()->back()->with('Error', 'Oups! Nous avons rencontré un problème');
            return redirect()->route('maladies.index')->with('Success', 'Opération effectuée');

        } else {
            if ($maladie)
                if (!$maladie->update(['status' => $request->input('status')]))
                    return redirect()->back()->with('Error', 'Oups! Nous avons rencontré un problème');
            return redirect()->route('maladies.index')->with('Success', 'Opération effectuée');
        }
    }
}