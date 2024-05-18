<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Individus;
use App\Models\Epidemie;

class Maladie extends Model
{
    use HasFactory;

    protected $table = 'maladie';
    protected $fillable = [
        'nom_maladie',
        'description_maladie',
        'mode_transmission_maladie',
        'caracteristique_maladie',
        'is_active',
        'status',
    ];

    public function IndividusMaladies() {
        return $this->belongsToMany(Individus::class, 'individus_maladie_pivot');
    }

    public function EpidemieMaladies() {
        return $this->belongsToMany(Epidemie::class, 'epidemie_maladie_pivot');
    }
}
