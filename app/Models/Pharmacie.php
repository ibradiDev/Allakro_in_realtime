<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Individus;

class Pharmacie extends Model
{
    use HasFactory;

    protected $table = 'pharmacie';
    protected $fillable = [
        'nom_pharmacie',
        'emplacement',
        'email_pharmacie',
        'telephone_pharmacie',
        'de_garde',
        'date_debut',
        'date_fin',
        'status',
    ];

    public function IndividusPharmacies()
    {
        return $this->belongsToMany(Individus::class, 'individus_pharmacie_pivot');
    }
}