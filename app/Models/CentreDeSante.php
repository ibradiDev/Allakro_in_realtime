<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Individus;

class CentreDeSante extends Model
{
    use HasFactory;

    protected $table = 'centre_de_sante';
    protected $fillable = [
        'nom_centre',
        'telephone_centre',
        'email_centre',
        'emplacement_centre',
        'offre_centre',
        'status',
    ];

    public function IndividusCentreSantes() {
        return $this->belongsToMany(Individus::class, 'individus_centre_sante_pivot');
    }
}
