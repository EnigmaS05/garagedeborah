<?php

namespace App\Http\Controllers;

use App\Models\Technicien;
use Illuminate\Http\Request;

class TechnicienController extends Controller
{
    // 1. AFFICHER LA LISTE
    public function index()
    {
        $techniciens = Technicien::all();
        return view('techniciens.index', compact('techniciens'));
    }

    // 2. AFFICHER LE FORMULAIRE D'AJOUT
    public function create()
    {
        return view('techniciens.create');
    }

    // 3. ENREGISTRER (Traitement)
    public function store(Request $request)
    {
        // Validation (Nom et Prénom obligatoires)
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
        ]);

        // Création
        Technicien::create([
            'nom' => strtoupper($request->nom), // Nom en majuscules (ex: DUPONT)
            'prenom' => ucfirst($request->prenom), // Prénom propre (ex: Jean)
            'specialite' => $request->specialite
        ]);

        return redirect()->route('techniciens.index')->with('success', 'Technicien ajouté !');
    }
}