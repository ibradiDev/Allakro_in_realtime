<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Individus;
use App\Models\Maladie;

class Epidemie extends Model
{
    use HasFactory;

    protected $table = 'epidemie';
    protected $fillable = [
        'nom_epidemie',
        'debut_epidemie',
        'fin_epidemie',
        'nombre_de_cas_epidemie',
        'nombre_de_deces_epidemie',
        'mesure_preventive',
        'zone_concernee',
        'is_active',
        'status',
    ];

    public function IndividusEpidemies() {
        return $this->belongsToMany(Individus::class, 'individus_epidemie_pivot');
    }

    public function EpidemieMaladie() {
        return $this->belongsToMany(Maladie::class, 'epidemie_maladie_pivot');
    }
}
