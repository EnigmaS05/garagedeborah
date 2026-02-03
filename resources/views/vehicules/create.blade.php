@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Ajouter un Véhicule</h4>
            </div>
            <div class="card-body">
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('vehicules.store') }}" enctype="multipart/form-data">
                    @csrf <div class="row mb-3">
                        <div class="col-md-12 text-center mb-3">
                            <label class="form-label fw-bold">Photo du véhicule</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Immatriculation <span class="text-danger">*</span></label>
                            <input type="text" name="immatriculation" class="form-control" placeholder="TG-XXXX-XX" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Marque <span class="text-danger">*</span></label>
                            <input type="text" name="marque" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Modèle <span class="text-danger">*</span></label>
                            <input type="text" name="modele" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Kilométrage</label>
                            <input type="number" name="kilometrage" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Carrosserie</label>
                            <input type="text" name="carrosserie" class="form-control" placeholder="Ex: Berline, SUV...">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Énergie</label>
                            <select name="energie" class="form-select">
                                <option value="Essence">Essence</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Hybride">Hybride</option>
                                <option value="Electrique">Electrique</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Boîte</label>
                            <select name="boite" class="form-select">
                                <option value="Manuelle">Manuelle</option>
                                <option value="Automatique">Automatique</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('vehicules.index') }}" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection