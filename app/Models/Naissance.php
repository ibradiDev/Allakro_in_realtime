<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Famille;
use App\Models\Individus;

class Naissance extends Model
{
    use HasFactory;

    protected $table = 'naissance';
    protected $fillable = [
        'famille_id',
        'individus_sended_id',
        'nom_complet',
        'sexe_nouveau_ne',
        'date_de_naissance',
        'mode_naissance',
        'pere_nouveau_ne',
        'mere_nouveau_ne',
        'lieu_habitation_famille',
        'status',
    ];

    public function FamilleNaissance() {
        return $this->belongsTo(Famille::class, 'famille_id', 'id');
    }

    public function IndividusSendNaissance() {
        return $this->belongsTo(Individus::class, 'individus_sended_id', 'id');
    }
}
