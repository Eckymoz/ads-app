<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            JoinMyCrew
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <!-- Left Side Of Navbar (if any) -->
            </ul>

            <ul class="navbar-nav ms-auto">
                <!-- Right Side Of Navbar -->
                <li class="nav-item me-3">
                    <a href="{{ route('announcements.create') }}" class="nav-link">
                        Créer une nouvelle annonce
                    </a>
                </li>

                <div class="nav-item dropdown d-none d-md-flex me-3">
                    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                       aria-label="Show notifications">
                        <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                        <i class="ti ti-bell"></i>

                        <span class="badge bg-red"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Last updates</h3>
                            </div>
                            <div class="list-group list-group-flush list-group-hoverable">
                                <div class="list-group-item">
                                    <!-- Contenu de la première notification -->
                                </div>
                                <div class="list-group-item">
                                    <!-- Contenu de la deuxième notification -->
                                </div>
                                <!-- Ajouter d'autres notifications au besoin -->
                            </div>
                        </div>
                    </div>
                </div>

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif

                @else
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                           aria-label="Open user menu">
                            @if (Storage::exists('public/' . Auth::user()->avatar))
                                <span class="avatar avatar-sm" style="background-image: {{ Auth::user()->avatar }}"></span>
                            @else
                                <div class="avatar avatar-sm" style="background-image: url('{{ asset(Auth::user()->avatar) }}');"></div>
                            @endif
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="mt-1 small text-secondary"></div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="{{ route('users.edit', Auth::user()) }}" class="dropdown-item">Mon
                                profil</a>
                            <a href="{{ route('announcements.user', Auth::user()) }}" class="dropdown-item">Mes annonces</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </ul>
        </div>
    </div>
</nav>
