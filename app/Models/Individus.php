<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Famille;
use App\Models\OffreEmploi;
use App\Models\CentreDeSante;
use App\Models\Pharmacie;
use App\Models\Maladie;
use App\Models\Epidemie;
use App\Models\Naissance;
use App\Models\Deces;
use App\Models\Amenagement;
use App\Models\Demenagement;

class Individus extends Model
{
    use HasFactory;

    protected $table = 'individus';
    protected $fillable = [
        'famille_id',
        'nom_individu',
        'prenom_individu',
        'date_naissance',
        'sexe_individu',
        'profession_individu',
        'telephone',
        'situation_matrimoniale',
        'status_indiv',
    ];

    public function FamilleIndividu()
    {
        return $this->belongsTo(Famille::class, 'famille_id', 'id');
    }

    public function IndividusOffreEmplois()
    {
        return $this->hasMany(OffreEmploi::class, 'individus_sended_id', 'id');
    }

    public function IndividusPharmacie()
    {
        return $this->belongsToMany(Pharmacie::class, 'individus_pharmacie_pivot');
    }

    public function IndividusCentreSante()
    {
        return $this->belongsToMany(CentreDeSante::class, 'individus_centre_sante_pivot');
    }

    public function IndividusMaladie()
    {
        return $this->belongsToMany(Maladie::class, 'individus_maladie_pivot');
    }

    public function IndividusEpidemie()
    {
        return $this->belongsToMany(Epidemie::class, 'individus_epidemie_pivot');
    }

    public function IndividusSendNaissances()
    {
        return $this->HasMany(Naissance::class, 'individus_sended_id', 'id');
    }

    public function IndividusSendDeces()
    {
        return $this->HasMany(Deces::class, 'individus_sended_id', 'id');
    }
    public function IndividusSendAmenagements()
    {
        return $this->HasMany(Amenagement::class, 'individus_sended_id', 'id');
    }

    public function IndividusSendDemenagements()
    {
        return $this->HasMany(Demenagement::class, 'individu_sended_id', 'id');
    }

}