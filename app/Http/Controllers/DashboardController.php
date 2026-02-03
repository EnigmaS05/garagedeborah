<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Important pour parler à la BDD

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Compter les données (Comme dans votre ancien index.php)
        $nbVehicules = DB::table('vehicules')->count();
        $nbTechniciens = DB::table('techniciens')->count();
        $nbReparations = DB::table('reparations')->count();

        // 2. Récupérer les 5 dernières réparations avec les infos du véhicule
        $dernieresReparations = DB::table('reparations')
            ->join('vehicules', 'reparations.vehicule_id', '=', 'vehicules.id')
            ->select('reparations.*', 'vehicules.marque', 'vehicules.modele', 'vehicules.immatriculation')
            ->orderBy('reparations.date', 'desc')
            ->limit(5)
            ->get();

        // 3. Envoyer tout ça à la vue (l'écran)
        return view('dashboard', compact('nbVehicules', 'nbTechniciens', 'nbReparations', 'dernieresReparations'));
    }
}