<?php

namespace App\Providers;

use Carbon\Traits\ToStringFormat;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Individus;
use App\Models\Amenagement;
use App\Models\CentreDeSante;
use App\Models\Demenagement;
use App\Models\Naissance;
use App\Models\Deces;
use App\Models\Message;
use App\Models\OffreEmploi;
use App\Models\Pharmacie;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // BADGES FOR NEWS
        View::composer('components.admin-aside', function ($view) {
            $badges['amenagementsbg'] = count(Amenagement::where('status', 0)->get());
            $badges['demenagementsbg'] = count(Demenagement::where('status', 0)->get());
            $badges['naissancebg'] = count(Naissance::where('status', 0)->get());
            $badges['decesbg'] = count(Deces::where('status', 0)->get());
            $badges['offreEmploibg'] = count(OffreEmploi::where('status', 0)->get());
            $badges['messageriebg'] = count(Message::where('message_state', 'non repondu')->where('type', 'entrant')->get());
            // Passer les données à la sidebar dans le layout
            $view->with($badges);
        });

        // BADGE FOR HEADER NOTIFICATION
        View::composer('layouts._header', function ($view) {
            $amenagementsbg = count(Amenagement::where('status', 0)->get());
            $demenagementsbg = count(Demenagement::where('status', 0)->get());
            $naissancebg = count(Naissance::where('status', 0)->get());
            $decesbg = count(Deces::where('status', 0)->get());
            $offreEmploibg = count(OffreEmploi::where('status', 0)->get());
            $messageriebg = count(Message::where('message_state', 'non repondu')->where('type', 'entrant')->get());

            $data['notification_bg'] = $amenagementsbg + $demenagementsbg + $naissancebg + $decesbg + $offreEmploibg + $messageriebg;
            // Passer les données à la sidebar dans le layout
            $view->with($data);
        });

        // DASHBOARD STATISTICS
        View::composer('admin.dashboard', function ($view) {
            $statistics['total_amenagements'] = count(Amenagement::where('status', 1)->get());
            $statistics['total_demenagements'] = count(Demenagement::where('status', 1)->get());
            $statistics['total_naissances'] = count(Naissance::where('status', 1)->get());
            $statistics['total_deces'] = count(Deces::where('status', 1)->get());
            $statistics['total_emplois'] = count(OffreEmploi::where('status', 1)->get());
            $statistics['total_pharmacies'] = count(Pharmacie::get());
            $statistics['total_centre_de_sante'] = count(CentreDeSante::get());

            $total_hommes = count(Individus::where('sexe_individu', 'M')->get());
            $total_femmes = count(Individus::where('sexe_individu', 'F')->get());
            $total_individus = $total_hommes + $total_femmes;
            $diviseur = $total_individus > 0 ? $total_individus : 1;

            $statistics['total_hommes'] = $total_hommes;
            $statistics['total_femmes'] = $total_femmes;
            $statistics['total_individus'] = $total_individus;
            $statistics['pourcentage_hommes'] = round(
                ($total_hommes * 100) / $diviseur
            ) . ' %';
            $statistics['pourcentage_femmes'] = round(
                ($total_femmes * 100) / $diviseur
            ) . ' %';
            // Passer les données au tableau de bord
            $view->with($statistics);
        });

        // Utiliser le système de pagination de Bootstrap
        Paginator::useBootstrapFive();
    }
}
