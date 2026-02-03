<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nelson Turbina - Gestion Garage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: 'Segoe UI', sans-serif; }
        .navbar { background: linear-gradient(90deg, #1c1c1c 0%, #343a40 100%); }
        /* Style des cartes Features */
        .feature-card { background: white; padding: 2rem; border-radius: 16px; border: 1px solid #e2e8f0; transition: all 0.3s ease; height: 100%; }
        .feature-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05); }
        .icon-box { width: 60px; height: 60px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 1.5rem; }
        .bg-blue-light { background-color: #eff6ff; color: #0d6efd; }
        .bg-green-light { background-color: #f0fdf4; color: #22c55e; }
        .bg-purple-light { background-color: #faf5ff; color: #a855f7; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark shadow mb-4">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold text-uppercase text-warning" href="{{ url('/') }}">
            <i class="bi bi-speedometer2 me-2"></i>Nelson Turbina 
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-3"><a class="nav-link text-white" href="{{ url('/') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/vehicules') }}">Véhicules</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/reparations') }}">Réparations</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/techniciens') }}">Techniciens</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<br><br>
<footer class="bg-dark text-light mt-auto py-5 border-top border-secondary">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <h5 class="text-white mb-3">🔧 Nelson Turbina</h5>
                <p class="text-white-50 small">Une solution complète pour la gestion d'atelier mécanique.</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <h5 class="text-white mb-3">Accès Rapide</h5>
                <ul class="list-unstyled text-white-50">
                    <li class="mb-2"><a href="{{ url('/') }}" class="text-decoration-none text-white-50">Tableau de bord</a></li>
                    <li class="mb-2"><a href="{{ url('/vehicules') }}" class="text-decoration-none text-white-50">Gestion des Véhicules</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-12">
                <h5 class="text-white mb-3">À propos</h5>
                <p class="text-white-50 small">Projet D-CLIC 2025.</p>
            </div>
        </div>
        <hr class="border-secondary my-4">
        <div class="text-center text-white-50 small">
            &copy; 2025 Nelson Turbina. Tous droits réservés.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>