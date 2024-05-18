<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Individus;
use App\Models\Naissance;
use App\Models\Famille;
use App\Models\Deces;
use App\Models\Amenagement;
use App\Models\Demenagement;
use App\Models\OffreEmploi;
use Illuminate\Http\Request;
use App\Models\Pharmacie;
use App\Models\CentreDeSante;
use App\Models\Epidemie;
use App\Models\Maladie;
use App\Models\ProjetMairie;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserInterfaceUIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only([
            'naissanceForm',
            'decesForm',
            'amenagementForm',
            'demenagementForm',
            'rechercheEmploiForm',
        ]);
        // $this->middleware('ucwords');
    }

    public function accueilPortailUtilisateur()
    {
        return view('index');
    }

    public function InformationPersonnellesSaved(Request $request)
    {
        // dd($request->input('form_type'));
        /* $request->validate([
            'nom_famille' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|numeric',
        ]); */

        // Vérification si le nom de famille existe dans la table 'Famille'
        $familleExistante = Famille::where('nom_famille', $request->nom_famille)->first();

        if ($familleExistante)
            // Récupérer l'ID de la famille existante
            $familleId = $familleExistante->id;
        else {
            $nouvelleFamille = new Famille();
            $nouvelleFamille->nom_famille = $request->nom_individu;
            $nouvelleFamille->status = 1;

            $nouvelleFamille->save();
            // Récupérer l'ID de la nouvelle famille
            $familleId = $nouvelleFamille->id;
        }

        $individu = new Individus($request->all());
        $individu->famille_id = $familleId;

        $formType = $request->input('form_type');
        $routeName = "";

        if ($individu->save()) {

            switch ($formType) {
                case 'naissance':
                    $routeName = 'pageFormulaireNaissances';
                    $message = 'Bienvenue ' . $individu->nom_individu . ' ' . $individu->prenom_individu . ' sur le formulaire de renseignement des nouveau-nés de la communauté d\'Allakro. Nous vous prions de bien vouloir remplir ces informations correctements sur la naissance et le soumettre aux administrateurs pour vérification. Vous serrez notifié de l\'état de votre enregistrement par SMS au numéro de téléphone ' . $individu->telephone . ' Merci !';
                    break;
                case 'deces':
                    $routeName = 'pageFormulairedecess';
                    $message = 'Bienvenue ' . $individu->nom_individu . ' ' . $individu->prenom_individu . ' sur le formulaire de décès de la communauté d\'Allakro. Nous vous prions de bien vouloir remplir ces informations correctements et le soumettre aux administrateurs pour vérification. Vous serrez notifié de l\'état de votre enregistrement par SMS au numéro de téléphone ' . $individu->telephone . ' Merci !';
                    break;
                case 'amenagement':
                    $routeName = 'pageFormulaireAmenagement';
                    $message = 'Bienvenue ' . $individu->nom_individu . ' ' . $individu->prenom_individu . ' sur le formulaire d\'aménagement de la communauté d\'Allakro. Nous vous prions de bien vouloir remplir ces informations correctements et le soumettre aux administrateurs pour vérification. Vous serrez notifié de l\'état de votre enregistrement par SMS au numéro de téléphone ' . $individu->telephone . ' Merci !';
                    break;
                case 'demenagement':
                    $routeName = 'pageFormulaireDemenagement';
                    $message = 'Bienvenue ' . $individu->nom_individu . ' ' . $individu->prenom_individu . ' sur le formulaire de déménagement de la communauté d\'Allakro. Nous vous prions de bien vouloir remplir ces informations correctements et le soumettre aux autorités pour vérification. Vous serrez notifié de l\'état de votre enregistrement par SMS au numéro de téléphone ' . $individu->telephone . ' Merci !';
                    break;
                case 'offreEmploi':
                    $routeName = 'pageFormulaireRechercheEmploi';
                    $message = 'Bienvenue ' . $individu->nom_individu . ' ' . $individu->prenom_individu . ' sur le formulaire de publication d\'offre d\'emploi de la communauté d\'Allakro. Nous vous prions de bien vouloir remplir ces informations correctements et le soumettre aux autorités pour vérification. Vous serrez notifié de l\'état de votre enregistrement par SMS au numéro de téléphone ' . $individu->telephone . ' Merci !';
                    break;
                default:
                    return;
                // return redirect()->back()->with('Error', 'Désolé, une erreur s\'est produite.');
            }

        } else
            return redirect()->back()->with('Error', 'Désolé une erreur s\'est produit lors de votre authentification. Veuillez réessayer');

        // Après validation, redirigez l'utilisateur en fonction du formulaire demandé
        return redirect()->route($routeName, ['member' => $individu->id])->with('Success', $message);
    }

    public function aboutUs()
    {
        $getInfo = ProjetMairie::where('status', 1)->orderBy('id', 'DESC')->get();
        $getInfoActu = Actualite::where('status', 1)->orderBy('id', 'DESC')->paginate(4);
        $getInfoActuRecent = Actualite::where('status', 1)->orderBy('created_at', 'ASC')->take(4)->get();

        return view('about', compact('getInfo', 'getInfoActu', 'getInfoActuRecent'));
    }

    public function voirDetailsPostActualite(int $id)
    {
        $getDatas = Actualite::find($id);

        if (!$getDatas) {

            return redirect()->back()->with('Error', 'OUPS ! Une erreur est survenu lors de lors de la redirection, Actualité introuvable !');
        } else {

            return view('details-actualite', compact('getDatas'));
        }
    }

    public function contactUs()
    {
        return view('contact');
    }

    public function accueilSante()
    {
        return view('home-sante');
    }

    public function maladiesEpidemieConsultation()
    {
        $getDatasMa = Maladie::where('status', 1)->orderBy('id', 'DESC')->get();
        $getDatasEp = Epidemie::where('status', 1)->orderBy('id', 'DESC')->get();

        return view('details-epidemies-maladies', compact('getDatasMa', 'getDatasEp'));
    }

    public function centresSantesConsultation()
    {
        $getInfo = CentreDeSante::where('status', 1)->orderBy('id', 'DESC')->get();

        return view('details-centre-de-sante', compact('getInfo'));
    }

    public function pharmaciesConsultation()
    {
        $getInfo = Pharmacie::where('status', 1)->orderBy('id', 'DESC')->get();

        return view('details-pharmacies', compact('getInfo'));
    }

    public function accuelEspaceFamille()
    {
        return view('home-famille');
    }

    public function naissanceForm()
    {
        $getFamilles = Famille::all();

        return view('/formulaires/form-naissance', compact('getFamilles'));

        // return redirect()->route('pageEspaceAccueilFamille')->with('Error', 'Nous ne pouvons pas vous autoriser à rentrer des données sur cette demande. Veuillez soumettre vos informations personnelles.');
    }

    public function InformationNaissancesSaved(Request $request)
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

        $enfant = new Naissance($request->all());

        if (!$enfant->save())
            return redirect()->back()->with('Error', 'OUPS ! Une erreur est survenu lors du traitement, veuillez réessayer !');
        return redirect()->route('pageEspaceAccueilFamille')->with('Success', 'FELICITATION ! vos informations de naissance ont été soumise avec succès. Les autorités de Allakro vous contacteront très bientôt.');

    }

    public function decesForm()
    {
        $getFamilles = Famille::all();
        // $dateFilt = Carbon::now();
        return view('/formulaires/form-deces', compact('getFamilles'));

        // return redirect()->route('pageEspaceAccueilFamille')->with('Error', 'Vous n\'ête pas autorisé à rentrer des données sur cette demande. Veuillez soumettre vos informations personnelles.');

    }

    public function InformationDecesSaved(Request $request)
    {
        $request->validate([
            'nom_complet' => 'required|string|max:255',
            'sexe_decede' => 'required|in:M,F',
            'fonction' => 'required|string|max:255',
            'date_de_naissance' => 'required|date|before_or_equal:today',
            'date_deces' => 'required|date|before_or_equal:today',
            'mode_deces' => 'required|string|max:255',
            'raison_deces' => 'string|max:255',
            'parents_referent' => 'required|string|max:255',
            'lieu_habitation' => 'required|string',
        ]);

        $decede = new Deces($request->all());

        if (!$decede->save())
            return redirect()->back()->with('Error', 'OUPS ! Une erreur est survenu lors du traitement, veuillez réessayer !');

        return redirect()->route('pageEspaceAccueilFamille')->with('Success', 'FELICITATION ! vos informations de décès ont été envoyé avec succès. Les autorités de Allakro vous contacteront très bientôt.');

    }

    public function amenagementForm(int $member)
    {
        $findIndiv = Individus::find($member);

        if ($findIndiv) {

            $getFamilles = Famille::all();
            // $dateFilt = Carbon::now();
            return view('/formulaires/form-amenagement', compact('findIndiv', 'getFamilles'));
        } else {

            return redirect()->route('pageEspaceDeplacements')->with('Error', 'Vous n\'ête pas autorisé à rentrer des données sur cette demande. Veuillez soumettre vos informations personnelles.');
        }
    }

    public function InformationAmenagementSaved(Request $request)
    {
        $request->validate([
            'nom_complet_amg' => 'required|string|max:255',
            'sexe_amg' => 'required|in:M,F',
            'fonction_amg' => 'required|string|max:255',
            'date_de_naissance' => 'required|date|before_or_equal:today',
            'date_amenagement' => 'required|date|before_or_equal:today',
            'provenance' => 'required|string|max:255',
            'mode_hebergement' => 'required|string|max:255',
            'lieu_habitation' => 'required|string|max:255',
        ]);

        $amg = new Amenagement();

        if (!$amg->save())
            return redirect()->back()->with('Error', 'OUPS ! Une erreur est survenu lors du traitement, veuillez réessayer !');

        return redirect()->route('pageEspaceDeplacements')->with('Success', 'BIENVENUE ! vos informations d\'amenagement ont été envoyé avec succès. Les autorités de Allakro vous contacteront très bientôt.');

    }

    public function demenagementForm(int $member)
    {
        $findIndiv = Individus::find($member);

        if ($findIndiv) {

            $getFamilles = Famille::all();
            // $dateFilt = Carbon::now();
            return view('/formulaires/form-demenagement', compact('findIndiv', 'getFamilles'));
        } else {

            return redirect()->route('pageEspaceDeplacements')->with('Error', 'Vous n\'ête pas autorisé à rentrer des données sur cette demande. Veuillez soumettre vos informations personnelles.');
        }
    }

    public function InformationDemenagementSaved(Request $request)
    {
        $request->validate([
            'nom_complet_dmg' => 'required|string|max:255',
            'sexe_dmg' => 'required|in:M,F',
            'fonction_dmg' => 'required|string|max:255',
            'date_de_naissance' => 'required|date|before_or_equal:today',
            'date_demenagement' => 'required|date|before_or_equal:today',
            'destination' => 'required|string|max:255',
        ]);

        $dmg = new Demenagement($request->all());

        if (!$dmg->save())
            return redirect()->back()->with('Error', 'OUPS ! Une erreur est survenu lors du traitement, veuillez réessayer !');

        return redirect()->route('pageEspaceDeplacements')->with('Success', 'BIENVENUE ! vos informations de démenagement ont été envoyé avec succès. Les autorités de Allakro vous contacteront très bientôt.');

    }

    public function rechercheEmploiForm()
    {
        return view('/formulaires/form-publier-emploi');

        // return redirect()->route('pageEspaceRechercheEmploi')->with('Error', 'Vous n\'ête pas autorisé à rentrer des données sur cette demande. Veuillez soumettre vos informations personnelles.');
    }

    public function InformationEmploiSaved(Request $request)
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

        return redirect()->route('pageEspaceRechercheEmploi')->with('Success', 'REUSSI ! vos informations ont été envoyé avec succès. Les autorités de Allakro vous contacteront très bientôt.');
    }

    public function accuelDeplacements()
    {
        return view('home-deplacements');
    }

    public function accuelRechercheEmploi()
    {
        setlocale(LC_TIME, 'fr');
        $getData = OffreEmploi::where('status', 1)->orderBy('id', 'DESC')->get();

        return view('home-recherche-emploi', compact('getData'));
    }

    public function voirDetailsEmploi(int $id)
    {
        $getDatas = OffreEmploi::find($id);

        if (!$getDatas) {

            return redirect()->back()->with('Error', 'OUPS ! Une erreur est survenu lors de lors de la redirection, Offre introuvable !');
        } else {

            return view('service-details', compact('getDatas'));
        }
    }

}