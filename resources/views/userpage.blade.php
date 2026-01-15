<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-icon {
            font-size: 40px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="#">User Panel</a>

        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <span class="nav-link text-white">
                        Welcome, {{ auth()->user()->name }}
                    </span>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link text-white"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<!-- Content -->
<div class="container mt-5">
    <h3 class="mb-4">Dashboard</h3>

    <div class="row">
        <!-- Profile -->
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <div class="card-icon mb-2">👤</div>
                    <h5 class="card-title">{{ auth()->user()->name }}</h5>
                    <p class="card-text">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </div>

        <!-- Info -->
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">User Information</h5>
                    <p><strong>Role:</strong> {{ auth()->user()->role }}</p>
                    <p><strong>Age:</strong> {{ auth()->user()->age ?? 'N/A' }}</p>
                    <p><strong>Status:</strong> Active</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
