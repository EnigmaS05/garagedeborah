<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    // On autorise l'écriture sur ces colonnes
    protected $fillable = [
        'immatriculation', 'marque', 'modele', 'couleur', 
        'annee', 'kilometrage', 'carrosserie', 'energie', 'boite', 'photo'
    ];
}