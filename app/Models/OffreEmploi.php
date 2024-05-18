<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Individus;

class OffreEmploi extends Model
{
    use HasFactory;

    protected $table = 'offre_emploi';
    protected $fillable = [
        'individus_sended_id',
        'nom_respo',
        'service_propose',
        'image',
        'telephone_respo',
        'email_respo',
        'description_offre',
        'competance_requise',
        'type_contrat',
        'domaine_service',
        'status',
    ];

    public function IndividusOffreEmploi() {
        return $this->belongsTo(Individus::class, 'individus_sended_id', 'id');
    }

}
