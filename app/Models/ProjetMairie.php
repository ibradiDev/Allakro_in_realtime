<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetMairie extends Model
{
    use HasFactory;

    protected $table = 'projet_mairie';
    protected $fillable = [
        'titre',
        'description_projet',
        'debut_projet',
        'fin_projet',
        'status',
    ];
}