@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>👨‍🔧 Équipe Technique</h1>
    <a href="{{ route('techniciens.create') }}" class="btn btn-success">
        <i class="bi bi-person-plus-fill"></i> Ajouter un technicien
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Nom Complet</th>
                    <th>Spécialité</th>
                    <th class="text-end pe-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($techniciens as $t)
                <tr>
                    <td class="ps-4 fw-bold">
                        <div class="d-flex align-items-center">
                            <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center me-3" style="width: 40px; height: 40px;">
                                {{ substr($t->prenom, 0, 1) }}{{ substr($t->nom, 0, 1) }}
                            </div>
                            <div>
                                {{ $t->nom }} {{ $t->prenom }}
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($t->specialite)
                            <span class="badge bg-info text-dark">{{ $t->specialite }}</span>
                        @else
                            <span class="text-muted fst-italic">Polyvalent</span>
                        @endif
                    </td>
                    <td class="text-end pe-4">
                        <button class="btn btn-sm btn-outline-primary">Modifier</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-4 text-muted">Aucun technicien enregistré.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection