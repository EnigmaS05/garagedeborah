@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Ajouter un Technicien</h4>
            </div>
            <div class="card-body">
                
                <form method="POST" action="{{ route('techniciens.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nom <span class="text-danger">*</span></label>
                            <input type="text" name="nom" class="form-control" placeholder="Ex: DUPONT" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Prénom <span class="text-danger">*</span></label>
                            <input type="text" name="prenom" class="form-control" placeholder="Ex: Jean" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Spécialité</label>
                        <input type="text" name="specialite" list="specialites_list" class="form-control" placeholder="Ex: Mécanique...">
                        <datalist id="specialites_list">
                            <option value="Mécanique Générale">
                            <option value="Électricité Auto">
                            <option value="Carrosserie / Peinture">
                            <option value="Diagnostic Moteur">
                            <option value="Pneumatiques">
                            <option value="Climatisation">
                        </datalist>
                        <div class="form-text">Laissez vide si le technicien est polyvalent.</div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('techniciens.index') }}" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection