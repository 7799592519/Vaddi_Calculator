<!DOCTYPE html>
<html lang="te">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>వడ్డీ లెక్కలు (Interest Calculator)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">💰 వడ్డీ లెక్కల యాప్</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/about-us">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/privacy-policy">Privacy Policy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/contact-us">Contact Us</a>
                </li>
                @if (Auth::check() && Auth::user()->email == 'madipalliashok22@gmail.com')
                    <li class="nav-item ms-3">
                        <a class="nav-link text-warning fw-bold" href="{{ route('admin.users') }}">Admin Panel</a>
                    </li>
                @endif

                <!-- Authentication Links -->
                @auth
                    <li class="nav-item ms-3">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm mt-1">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item ms-3">
                        <a href="{{ route('login') }}" class="btn btn-light btn-sm mt-1 text-primary fw-bold">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="min-height: 60vh;">
    @yield('content')
</div>

<footer class="bg-dark text-white text-center py-4 mt-5">
    <div class="container">
        <p class="mb-2">&copy; {{ date('Y') }} Vaddi Calculator. All Rights Reserved.</p>
        <div>
            <a href="/about-us" class="text-white-50 text-decoration-none me-3">About Us</a>
            <a href="/privacy-policy" class="text-white-50 text-decoration-none me-3">Privacy Policy</a>
            <a href="/contact-us" class="text-white-50 text-decoration-none">Contact Us</a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
