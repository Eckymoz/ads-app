<nav class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <!-- Titre du site à gauche -->
                <a class="navbar-brand me-3" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.jpeg') }}" class="navbar-brand-image" alt="Logo">
                    JoinMyCrew
                </a>

                <!-- Onglets à gauche -->
                <ul class="navbar-nav me-auto">
                    <!-- Onglet "Accueil" -->
                    <li class="nav-item @if(request()->routeIs('home')) active @endif">
                        <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                    </li>
                </ul>

                <!-- Actions à droite de la navbar -->
                <ul class="navbar-nav">
                    <!-- "Créer une annonce" -->
                    <li class="nav-item me-3 @if(request()->routeIs('ads.create')) active @endif">
                        <a href="{{ route('ads.create') }}" class="nav-link">
                            Créer une nouvelle annonce
                        </a>
                    </li>

                    <!-- Notifications -->
                    <li class="nav-item dropdown d-none d-md-flex me-3">
                        <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                           aria-label="Show notifications">
                            <!-- Icône de la cloche -->
                            <i class="ti ti-bell"></i>

                            <!-- Badge de notifications (à remplir avec la logique appropriée) -->
                            <span class="badge bg-red"></span>
                        </a>
                        <!-- Contenu du menu déroulant des notifications -->
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
                    </li>

                    <!-- Avatar et menu utilisateur -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                           aria-label="Open user menu">
                            <!-- Avatar de l'utilisateur -->
                            @if (Storage::exists('public/' . Auth::user()->avatar))
                                <span class="avatar avatar-sm" style="background-image: {{ Auth::user()->avatar }}"></span>
                            @else
                                <div class="avatar avatar-sm" style="background-image: url('{{ asset(Auth::user()->avatar) }}');"></div>
                            @endif
                            <!-- Informations de l'utilisateur -->
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="mt-1 small text-secondary"></div>
                            </div>
                        </a>
                        <!-- Contenu du menu déroulant de l'utilisateur -->
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="{{ route('users.edit', Auth::user()) }}" class="dropdown-item">Mon
                                profil</a>
                            <a href="{{ route('ads.user', Auth::user()) }}" class="dropdown-item">Mes annonces</a>
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
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

