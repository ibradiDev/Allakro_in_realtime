<?php

namespace App\Http\Controllers;

use App\Models\CentreDeSante;
use Illuminate\Http\Request;

class CentreSanteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $centres = CentreDeSante::where('status', 1)->orderBy('id', 'DESC')->paginate(10);
        $centres_del = CentreDeSante::where('status', 0)->get();

        return view('centres-sante.index', compact('centres', 'centres_del'));
    }

    public function store(Request $request)
    {
        /*  $request->validate([
             'nom_centre' => 'required|string|max:255',
             'emplacement' => 'required|string|max:255',
             'email' => 'required|email',
             'telephone' => 'required|numeric',
             'service' => 'required|string',
         ]);
  */
        $centre_sante = new CentreDeSante;
        $centre_sante->nom_centre = $request->input('nom_centre');
        $centre_sante->telephone_centre = $request->input('telephone');
        $centre_sante->email_centre = $request->input('email');
        $centre_sante->emplacement_centre = $request->input('emplacement');
        $centre_sante->offre_centre = $request->input('service');
        $centre_sante->status = 1;

        if ($centre_sante->save())
            return redirect()->route('centres.index')->with('Success', 'Opération effectuée, centre de santé enregistré avec succès.');
        else
            return redirect()->back()->with('Error', 'Enregistrement échoué');
    }


    public function create()
    {
        return view('centres-sante.create');
    }
    public function show()
    {
    }


    public function edit(CentreDeSante $centre)
    {
        return view('centres-sante.edit', compact('centre'));
    }

    public function update(Request $request, $centre_sante)
    {
        $centre_sante = CentreDeSante::find($centre_sante);

        if ($request->form_edit === 'edit_info') {

            $request->validate([
                'nom_centre' => 'required|string|max:255',
                'emplacement_centre' => 'required|string|max:255',
                'email_centre' => 'required|email',
                'telephone_centre' => 'required|numeric',
                'offre_centre' => 'required|string',
            ]);

            $centre_sante->nom_centre = $request->nom_centre;
            $centre_sante->telephone_centre = $request->telephone_centre;
            $centre_sante->email_centre = $request->email_centre;
            $centre_sante->emplacement_centre = $request->emplacement_centre;
            $centre_sante->offre_centre = $request->offre_centre;
            $centre_sante->status = 1;

            if ($centre_sante->save())
                return redirect()->route('centres.index')->with('Success', 'Opération effectuée, centre de santé enregistré avec succès.');
            else
                return redirect()->back()->with('Error', 'Enregistrement échoué');

        } else {

            if ($centre_sante)
                $centre_sante->update(['status' => $request->input('status')]);
            return redirect()->back()->with('Success', 'Opération effectuée');
        }

    }
}