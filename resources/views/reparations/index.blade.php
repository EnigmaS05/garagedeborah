@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>🔧 Suivi des Réparations</h1>
    <a href="{{ route('reparations.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Nouvelle réparation
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Date</th>
                    <th>Véhicule</th>
                    <th>Technicien</th>
                    <th>Objet / Panne</th>
                    <th>Durée</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reparations as $r)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($r->date)->format('d/m/Y') }}</td>
                    <td>
                        <strong>{{ $r->vehicule->marque }} {{ $r->vehicule->modele }}</strong><br>
                        <small class="text-muted">{{ $r->vehicule->immatriculation }}</small>
                    </td>
                    <td>
                        @if($r->technicien)
                            <span class="badge bg-info text-dark">{{ $r->technicien->nom }} {{ $r->technicien->prenom }}</span>
                        @else
                            <span class="badge bg-secondary">Non assigné</span>
                        @endif
                    </td>
                    <td>{{ $r->objet_reparation }}</td>
                    <td>{{ $r->duree_main_oeuvre ? $r->duree_main_oeuvre . ' min' : '-' }}</td>
                    <td>
                        <form action="{{ route('reparations.destroy', $r->id) }}" method="POST" onsubmit="return confirm('Supprimer cette fiche ?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Aucune réparation enregistrée.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection