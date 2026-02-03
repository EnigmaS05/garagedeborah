<?php

namespace App\Http\Controllers;

use App\Models\Vehicule; // On appelle le modèle
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Pour gérer les images

class VehiculeController extends Controller
{
    // 1. AFFICHER LA LISTE DES VÉHICULES
    public function index()
    {
        $vehicules = Vehicule::all(); // Récupère tout
        return view('vehicules.index', compact('vehicules'));
    }

    // 2. AFFICHER LE FORMULAIRE D'AJOUT
    public function create()
    {
        return view('vehicules.create');
    }

    // 3. ENREGISTRER LE VÉHICULE (Traitement du formulaire)
    public function store(Request $request)
    {
        // Validation des données (Obligatoire selon le PDF)
        $request->validate([
            'immatriculation' => 'required|unique:vehicules',
            'marque' => 'required',
            'modele' => 'required',
            'photo' => 'nullable|image|max:2048' // Max 2Mo
        ]);

        // Préparation des données
        $data = $request->all();

        // Gestion de l'image (Upload)
        if ($request->hasFile('photo')) {
            // On stocke l'image dans le dossier "public/uploads"
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['photo'] = $filename;
        }

        Vehicule::create($data); // Sauvegarde en BDD

        return redirect()->route('vehicules.index')->with('success', 'Véhicule ajouté avec succès !');
    }
}