<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use App\Models\Naissance;
use App\Models\Deces;
use App\Models\Amenagement;
use App\Models\Demenagement;
use Illuminate\Http\Request;

class FamilleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $familles = Famille::where('status', 1)->paginate(10);
        $famillesUnreg = Famille::where('status', 0)->get();
        // $allSupprime = Famille::where('status', 0)->get();

        return view('familles.index', compact('familles', 'famillesUnreg'));
    }

    public function create()
    {
        return view('familles.create');
    }

    public function store(Request $request)
    {
        /* $request->validate([
            'nom_famille' => 'required|string|max:255',
            'lieu_habitation' => 'required|string|max:255',
            'telephone_famille' => 'required|numeric|max:10',
            'email_famille' => 'required|email',
        ]);
 */
        $famille = new Famille($request->all());
        $famille->status = 1;
        $save = $famille->saveOrFail();

        if ($save) {
            return redirect()->route('familles.index')->with('Success', 'Opération effectuée, Sauvegarde éffectuée avec succès');
        } else {
            return redirect()->back()->with('Error', 'Une erreur s\'est produite lors de la sauvegarde, veuillez réessayer');
        }
    }

    public function show(Famille $famille)
    {

        $getNaissance = Naissance::where('famille_id', $famille->id)->where('status', 1)->orderBy('id', 'DESC')->get();
        $getDeces = Deces::where('famille_id', $famille->id)->where('status', 1)->orderBy('id', 'DESC')->get();
        $getamenagemennt = Amenagement::where('famille_id', $famille->id)->where('status', 1)->orderBy('id', 'DESC')->get();
        $getDemenagement = Demenagement::where('famille_id', $famille->id)->where('status', 1)->orderBy('id', 'DESC')->get();
        return view('familles.show', compact('famille', 'getNaissance', 'getDeces', 'getamenagemennt', 'getDemenagement'));
    }

    public function edit(Famille $famille)
    {
        return view('familles.edit', compact('famille'));
    }

    public function update(Request $request, $famille)
    {
        $famille = Famille::find($famille);

        if ($request->form_type === 'modificationInformation') {

            /* $request->validate([
                'nom_famille' => 'required|string|max:255',
                'lieu_habitation' => 'required|string|max:255',
                'telephone_famille' => 'required|numeric',
                'email_famille' => 'required|email',
            ]); */

            $famille->update([
                'nom_famille' => $request->nom_famille,
                'email_famille' => $request->email_famille,
                'telephone_famille' => $request->telephone_famille,
                'lieu_habitation' => $request->lieu_habitation,
                'status' => 1,
            ]);

            if ($famille->update()) {
                return redirect()->route('familles.index')->with('Success', 'Opération effectuée, Sauvegarde éffectuée avec succès');
            } else {
                return redirect()->back()->with('Error', 'Une erreur s\'est produite lors de la sauvegarde, veuillez réessayer');
            }

        } else {

            if ($famille)
                $famille->update(['status' => $request->input('status')]);
            return redirect()->route('familles.index')->with('Success', 'Opération effectuée');
        }
    }
}