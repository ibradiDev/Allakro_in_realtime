<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Famille;
use App\Models\Individus;

class Amenagement extends Model
{
    use HasFactory;

    protected $table = 'amenagement';
    protected $fillable = [
        'famille_id',
        'indiv_sended_id',
        'nom_complet_amg',
        'sexe_amg',
        'fonction_amg',
        'date_de_naissance',
        'date_amenagement',
        'provenance',
        'mode_hebergement',
        'lieu_habitation',
        'status',
    ];

    public function FamilleAmenagement() {
        return $this->belongsTo(Famille::class, 'famille_id', 'id');
    }

    public function IndividusSendAmenagement() {
        return $this->belongsTo(Individus::class, 'indiv_sended_id', 'id');
    }
}
