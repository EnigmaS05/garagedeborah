@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>🚙 Parc Automobile</h1>
    <a href="{{ route('vehicules.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Ajouter un véhicule
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th class="ps-4">Photo</th>
                    <th>Immatriculation</th>
                    <th>Marque / Modèle</th>
                    <th>Info</th>
                    <th class="text-end pe-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicules as $v)
                <tr>
                    <td class="ps-4">
                        @if($v->photo)
                            <img src="{{ asset('uploads/' . $v->photo) }}" width="60" class="rounded border" alt="img">
                        @else
                            <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center" style="width: 60px; height: 40px;">
                                <i class="bi bi-car-front"></i>
                            </div>
                        @endif
                    </td>
                    <td class="fw-bold">{{ $v->immatriculation }}</td>
                    <td>{{ $v->marque }} {{ $v->modele }}</td>
                    <td>
                        <span class="badge bg-info text-dark">{{ $v->energie }}</span>
                        <small class="text-muted ms-2">{{ $v->kilometrage }} km</small>
                    </td>
                    <td class="text-end pe-4">
                        <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection