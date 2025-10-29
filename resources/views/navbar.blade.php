<nav class="navbar navbar-expand-lg shadow-sm" style="background-color: #1d2535;">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/meme.png') }}" 
                 alt="Logo" 
                 width="45" 
                 height="45" 
                 class="me-2">
            <span class="fw-bold fs-5 text-white">Mykonos</span>
        </a>

        <!-- Tombol toggler untuk mobile -->
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navigasi -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active text-primary' : 'text-white' }}" 
                       href="{{ route('home') }}">
                       Home
                    </a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link {{ Route::is('kontak') ? 'active text-primary' : 'text-white' }}" 
                       href="{{ route('kontak') }}">
                       Kontak Kami
                    </a>
                </li>

                @auth
                    <!-- Jika sudah login, tampilkan dropdown user -->
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>

                        <!-- Form logout -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @else
                    <!-- Jika belum login -->
                    <li class="nav-item ms-3">
                        <a class="btn btn-outline-light btn-sm" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
