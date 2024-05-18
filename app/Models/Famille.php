<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Individus;
use App\Models\Deces;
use App\Models\Naissance;
use App\Models\Amenagement;
use App\Models\Demenagement;

class Famille extends Model
{
    use HasFactory;

    protected $table = 'famille';
    protected $fillable = [
        'nom_famille',
        'email_famille',
        'telephone_famille',
        'lieu_habitation',
        'status',
        
    ];

    public function FamilleIndividus() {
        return $this->hasMany(Individus::class, 'famille_id', 'id');
    }

    public function FamilleDeces() {
        return $this->hasMany(Deces::class, 'famille_id', 'id');
    }

    public function FamilleNaissances() {
        return $this->hasMany(Naissance::class, 'famille_id', 'id');
    }

    public function FamilleAmenagements() {
        return $this->hasMany(Amenagement::class, 'famille_id', 'id');
    }

    public function FamilleDemenagements() {
        return $this->hasMany(Demenagement::class, 'famille_id', 'id');
    }

}
