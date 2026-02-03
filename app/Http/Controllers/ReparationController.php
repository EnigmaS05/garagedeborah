<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use App\Models\Vehicule;   // Besoin pour la liste déroulante
use App\Models\Technicien; // Besoin pour la liste déroulante
use Illuminate\Http\Request;

class ReparationController extends Controller
{
    // 1. LISTE DES RÉPARATIONS
    public function index()
    {
        // On récupère les réparations avec les infos du véhicule et du technicien (pour éviter de charger trop de requêtes)
        $reparations = Reparation::with(['vehicule', 'technicien'])->orderBy('date', 'desc')->get();
        return view('reparations.index', compact('reparations'));
    }

    // 2. FORMULAIRE D'AJOUT
    public function create()
    {
        // On a besoin de la liste des véhicules et techniciens pour les menus déroulants <select>
        $vehicules = Vehicule::all();
        $techniciens = Technicien::all();
        return view('reparations.create', compact('vehicules', 'techniciens'));
    }

    // 3. ENREGISTREMENT
    public function store(Request $request)
    {
        $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'date' => 'required|date',
            'objet_reparation' => 'required'
        ]);

        Reparation::create([
            'vehicule_id' => $request->vehicule_id,
            'technicien_id' => $request->technicien_id, // Peut être null
            'date' => $request->date,
            'duree_main_oeuvre' => $request->duree_main_oeuvre,
            'objet_reparation' => $request->objet_reparation,
            'statut' => 'En cours' // Par défaut
        ]);

        return redirect()->route('reparations.index')->with('success', 'Réparation enregistrée !');
    }

    // 4. SUPPRESSION
    public function destroy($id)
    {
        $reparation = Reparation::findOrFail($id);
        $reparation->delete();
        return redirect()->route('reparations.index')->with('success', 'Réparation supprimée.');
    }
}