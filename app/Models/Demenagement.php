<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Famille;
use App\Models\Individus;

class Demenagement extends Model
{
    use HasFactory;

    protected $table = 'demenagement';
    protected $fillable = [
        'individu_sended_id',
        'famille_id',
        'nom_complet_dmg',
        'sexe_dmg',
        'fonction_dmg',
        'date_de_naissance',
        'date_demenagement',
        'destination',
        'status',
    ];

    public function FamilleDemenagement() {
        return $this->belongsTo(Famille::class, 'famille_id', 'id');
    }

    public function IndividusSendDemenagement() {
        return $this->belongsTo(Individus::class, 'individu_sended_id', 'id');
    }
}
