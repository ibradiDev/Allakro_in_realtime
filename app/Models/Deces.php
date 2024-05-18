<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Famille;
use App\Models\Individus;


class Deces extends Model
{
    use HasFactory;

    protected $table = 'deces';
    protected $fillable = [
        'famille_id',
        'individus_sended_id',
        'nom_complet',
        'sexe_decede',
        'fonction',
        'date_de_naissance',
        'date_deces',
        'mode_deces',
        'raison_deces',
        'parents_referent',
        'lieu_habitation',
        'status',
    ];

    public function FamilleDeces() {
        return $this->belongsTo(Famille::class, 'famille_id', 'id');
    }
    public function IndividusSendDeces() {
        return $this->belongsTo(Individus::class, 'individus_sended_id', 'id');
    }
}
