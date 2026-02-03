@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Enregistrer une réparation</h4>
            </div>
            <div class="card-body">
                
                <form method="POST" action="{{ route('reparations.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Véhicule concerné <span class="text-danger">*</span></label>
                        <select name="vehicule_id" class="form-select" required>
                            <option value="">-- Choisir un véhicule --</option>
                            @foreach($vehicules as $v)
                                <option value="{{ $v->id }}">
                                    {{ $v->marque }} {{ $v->modele }} ({{ $v->immatriculation }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Technicien assigné</label>
                        <select name="technicien_id" class="form-select">
                            <option value="">-- Aucun pour le moment --</option>
                            @foreach($techniciens as $t)
                                <option value="{{ $t->id }}">
                                    {{ $t->nom }} {{ $t->prenom }} ({{ $t->specialite ?? 'Polyvalent' }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Date <span class="text-danger">*</span></label>
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Durée estimée (minutes)</label>
                            <input type="number" name="duree_main_oeuvre" class="form-control" placeholder="Ex: 60">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Objet de la réparation <span class="text-danger">*</span></label>
                        <textarea name="objet_reparation" class="form-control" rows="3" placeholder="Ex: Vidange complète + changement filtre à huile" required></textarea>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('reparations.index') }}" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-primary">Valider l'intervention</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection