@extends('layouts.app')

@section('content')

<div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
    <div class="container-fluid py-3">
        <h1 class="display-5 fw-bold">Bienvenue chez Nelson Turbina</h1>
        <p class="col-md-8 fs-4">Gérez votre atelier mécanique simplement : suivi des véhicules, gestion des techniciens et historique des réparations.</p>
        <a href="{{ url('/reparations/create') }}" class="btn btn-primary btn-lg">Nouvelle Réparation</a>
        <a href="{{ url('/vehicules/create') }}" class="btn btn-outline-secondary btn-lg">Nouveau Véhicule</a>
    </div>
</div>

<div class="row mb-5">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3 shadow">
            <div class="card-header">Parc Automobile</div>
            <div class="card-body">
                <h2 class="card-title">{{ $nbVehicules }}</h2>
                <p class="card-text">Véhicules enregistrés</p>
                <a href="{{ url('/vehicules') }}" class="btn btn-light btn-sm text-primary">Voir la liste</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3 shadow">
            <div class="card-header">Équipe Technique</div>
            <div class="card-body">
                <h2 class="card-title">{{ $nbTechniciens }}</h2>
                <p class="card-text">Techniciens actifs</p>
                <a href="{{ url('/techniciens') }}" class="btn btn-light btn-sm text-success">Gérer l'équipe</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3 shadow">
            <div class="card-header text-dark">Activité</div>
            <div class="card-body text-dark">
                <h2 class="card-title">{{ $nbReparations }}</h2>
                <p class="card-text">Réparations effectuées</p>
                <a href="{{ url('/reparations') }}" class="btn btn-light btn-sm text-warning">Voir l'historique</a>
            </div>
        </div>
    </div>
</div>

<section id="features" class="py-5 bg-white rounded mb-4">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-6">Tout ce dont vous avez besoin</h2>
            <p class="text-muted">Conçu pour répondre aux exigences modernes des ateliers mécaniques.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-box bg-blue-light"><i class="bi bi-car-front-fill"></i></div>
                    <h4>Parc Automobile</h4>
                    <p class="text-muted">Enregistrez chaque véhicule avec précision : immatriculation, marque, modèle et kilométrage.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-box bg-purple-light"><i class="bi bi-people-fill"></i></div>
                    <h4>Gestion Techniciens</h4>
                    <p class="text-muted">Attribuez les tâches selon les spécialités et optimisez la main d'œuvre.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-box bg-green-light"><i class="bi bi-tools"></i></div>
                    <h4>Suivi Réparations</h4>
                    <p class="text-muted">Historique complet des interventions, durée de main d'œuvre et descriptions.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="card shadow-sm">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">🕒 Dernières interventions</h5>
        <a href="{{ url('/reparations') }}" class="btn btn-sm btn-outline-light">Tout voir</a>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Véhicule</th>
                    <th>Immatriculation</th>
                    <th>Intervention</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dernieresReparations as $rep)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($rep->date)->format('d/m/Y') }}</td>
                    <td><strong>{{ $rep->marque }}</strong> {{ $rep->modele }}</td>
                    <td><span class="badge bg-secondary">{{ $rep->immatriculation }}</span></td>
                    <td>{{ $rep->objet_reparation }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-3">Aucune réparation récente.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection