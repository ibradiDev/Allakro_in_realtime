<?php

use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\AmenagementController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CentreSanteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DecesController;
use App\Http\Controllers\DemenagementController;
use App\Http\Controllers\EpidemieController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\IndividuController;
use App\Http\Controllers\MaladieController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NaissanceController;
use App\Http\Controllers\OffreEmploiController;
use App\Http\Controllers\PharmacieController;
use App\Http\Controllers\ProjetsMairieController;
use App\Http\Controllers\UserInterfaceUIController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ----------------------------------------------------------------
// /ADMIN_ROUTES
// ----------------------------------------------------------------
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('/admin/naissance', NaissanceController::class);
Route::resource('/admin/deces', DecesController::class);
Route::resource('/admin/pharmacie', PharmacieController::class);
Route::resource('/admin/centres', CentreSanteController::class);
Route::resource('/admin/amenagement', AmenagementController::class);
Route::resource('/admin/demenagement', DemenagementController::class);
Route::resource('/admin/offre-emploi', OffreEmploiController::class);
Route::resource('/admin/maladies', MaladieController::class);
Route::resource('/admin/epidemies', EpidemieController::class);
Route::resource('/admin/individus', IndividuController::class);
Route::resource('/admin/actualites', ActualiteController::class);
Route::resource('/admin/projets', ProjetsMairieController::class);
Route::resource('/admin/familles', FamilleController::class);

Route::resource('/admin/messagerie', MessageController::class);
Route::get('/admin/messagerie/reply/key=$dkmjl21{ms_id}a0h5BlcybS4jz5adz', [MessageController::class, 'reply'])->name('reply-to');
Route::get('/register/{role}-level/l=$dkmjla0h5BlcybS4jz5adz', [RegisterController::class, 'showRegistrationForm'])->name('new-user');
// Route::post('/register/{role}-level/l=$dkmjla0h5BlcybS4jz5adz', [RegisterController::class, 'showRegistrationForm'])->name('new-user');

// ----------------------------------------------------------------
// USER_ROUTES
// ----------------------------------------------------------------

// route page d'accueil du portail
Route::get('/', [UserInterfaceUIController::class, 'accueilPortailUtilisateur'])->name('pageAccueil');
// route page d'apropos
Route::get('/Portail/Allakro/notre-communaute', [UserInterfaceUIController::class, 'aboutUs'])->name('pageProposAllakro');
// route page de contact
Route::get('/Portail/Allakro/contact', [UserInterfaceUIController::class, 'contactUs'])->name('pageNousContacter');
// route page d'accueil du portail santé
Route::get('/Portail/Allakro/accueil-sante', [UserInterfaceUIController::class, 'accueilSante'])->name('pageAccueilSante');
// route page consultation epidemique
Route::get('/Portail/Allakro/accueil-sante/consultation/maladies-epidemie', [UserInterfaceUIController::class, 'maladiesEpidemieConsultation'])->name('pageConsultationMldEpd');
// route page consultation centre de santé
Route::get('/Portail/Allakro/accueil-sante/consultation/centres-santes', [UserInterfaceUIController::class, 'centresSantesConsultation'])->name('pageConsulatationCtrSantes');
// route page consultation pharmacie
Route::get('/Portail/Allakro/accueil-sante/consultation/pharmacies', [UserInterfaceUIController::class, 'pharmaciesConsultation'])->name('pageConsulatationPharmacie');
// route page d'accueil famille
Route::get('/Portail/Allakro/accueil-famille', [UserInterfaceUIController::class, 'accuelEspaceFamille'])->name('pageEspaceAccueilFamille');

// formulaires
Route::get('/Portail/Allakro/accueil-famille/Enregistrement/Allakro/naissances/key=ns8kzmncsjze43pO', [UserInterfaceUIController::class, 'naissanceForm'])->name('pageFormulaireNaissances');
Route::get('/Portail/Allakro/accueil-famille/Enregistrement/Allakro/deces/key=dc0HbF75847bf', [UserInterfaceUIController::class, 'decesForm'])->name('pageFormulairedecess');
Route::get('/Portail/Allakro/accueil-deplacement/Enregistrement/Allakro/amenagement/key=am9skHnkq', [UserInterfaceUIController::class, 'amenagementForm'])->name('pageFormulaireAmenagement');
Route::get('/Portail/Allakro/accueil-deplacement/Enregistrement/Allakro/demenagement/key=dm1jBlhKm9B', [UserInterfaceUIController::class, 'demenagementForm'])->name('pageFormulaireDemenagement');
Route::get('/Portail/Allakro/accueil-recherche-emploi/Enregistrement/Allakro/emploi/key=em1Gp4dfjdf3Kl5h9B', [UserInterfaceUIController::class, 'rechercheEmploiForm'])->name('pageFormulaireRechercheEmploi');

// Traitements
Route::post('/Portail/Allakro/accueil-famille/formulaire/personal-information', [UserInterfaceUIController::class, 'InformationPersonnellesSaved'])->name('reqInformationSaved');
// Route::post('/Portail/Allakro/accueil-famille/formulaire/personal-information', [UserInterfaceUIController::class, 'InformationPersonnellesSaved2'])->name('reqInformationSaved2');


Route::post('/Portail/Allakro/accueil-famille/formulaire/enr/Nouveau-ne', [UserInterfaceUIController::class, 'InformationNaissancesSaved'])->name('reqInformationNaissanceSaved');
Route::post('/Portail/Allakro/accueil-famille/formulaire/enr/deces', [UserInterfaceUIController::class, 'InformationDecesSaved'])->name('reqInformationDecesSaved');
Route::post('/Portail/Allakro/accueil-deplacement/formulaire/enr/amenagement', [UserInterfaceUIController::class, 'InformationAmenagementSaved'])->name('reqInformationAmenagementSaved');
Route::post('/Portail/Allakro/accueil-deplacement/formulaire/enr/demenagement', [UserInterfaceUIController::class, 'InformationDemenagementSaved'])->name('reqInformationDemenagementSaved');
Route::post('/Portail/Allakro/accueil-recherche-emploi/formulaire/enr/emploi', [UserInterfaceUIController::class, 'InformationEmploiSaved'])->name('reqInformationEmploiSaved');
// fin

// route page d'accueil déplacements
Route::get('/Portail/Allakro/accueil-deplacements', [UserInterfaceUIController::class, 'accuelDeplacements'])->name('pageEspaceDeplacements');
// route page d'accueil du portail recherche d'emploi
Route::get('/Portail/Allakro/accueil-recherche-emploi', [UserInterfaceUIController::class, 'accuelRechercheEmploi'])->name('pageEspaceRechercheEmploi');
// route page de liste des naissances
// Route::get('/Portail/Allakro/accueil-famille/consultations/Allakro/naissances/liste', [UserInterfaceUIController::class, 'naissanceListe'])->name('pageListeNaissances');
// route page de liste des décès
// Route::get('/Portail/Allakro/accueil-famille/consultation/Allakro/deces/liste', [UserInterfaceUIController::class, 'decesListe'])->name('pageListeDeces');
// route page de liste des aménagements
// Route::get('/Portail/Allakro/accueil-deplacement/consultation/Allakro/amenagements/liste', [UserInterfaceUIController::class, 'amenagementsListe'])->name('pageListeAmenagements');
// route page de liste des déménagements
// Route::get('/Portail/Allakro/accueil-deplacement/consultation/Allakro/denagements/liste', [UserInterfaceUIController::class, 'denagementsListe'])->name('pageListeDenagements');
// route page detail des emplois
Route::get('/Portail/Allakro/accueil-emploi/consultation/emploi/details/emploiN34GmPaQ{id}Q', [UserInterfaceUIController::class, 'voirDetailsEmploi'])->name('pageDetailsEmploi');
Route::get('/Portail/Allakro/notre-communaute/blog/details-post0{id}1JDf4', [UserInterfaceUIController::class, 'voirDetailsPostActualite'])->name('pageDetailsPostActualite');
Route::get('/Portail/Allakro/notre-communaute/blog/details-post0{id}1JDf4', [UserInterfaceUIController::class, 'voirDetailsPostActualite'])->name('pageDetailsPostActualite');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');