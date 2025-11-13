<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <!-- Logo / Brand -->
        <a class="navbar-brand fw-bold text-primary" href="/">
            EasyEdu
        </a>

        <!-- Toggler (for mobile view) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
            aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu items -->
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/courses">Courses</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
            </ul>

            <!-- Right side buttons -->
            <div class="d-flex ms-lg-3">
                @auth
                    <a href="/dashboard" class="btn btn-primary px-3">Dashboard</a>
                @else
                    <a href="/login" class="btn btn-outline-primary me-2 px-3">Login</a>
                    <a href="/register" class="btn btn-primary px-3">Sign Up</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
