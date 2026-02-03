<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicule_id', 'technicien_id', 'date', 
        'duree_main_oeuvre', 'objet_reparation', 'statut'
    ];
    // Une réparation appartient à un Véhicule
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    // Une réparation appartient à un Technicien
    public function technicien()
    {
        return $this->belongsTo(Technicien::class);
    }
}