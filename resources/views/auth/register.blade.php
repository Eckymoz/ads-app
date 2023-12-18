@extends('layouts.app')

@section('content')
    <div class="page page-center">
        <div class="container container-tight py-2">
            <div class="text-center mb-4">
                <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="JoinMyCrew" class="avatar avatar-xl">
                </a>
            </div>
            <form class="card card-md" method="POST" action="{{ route('register') }}" autocomplete="off" novalidate>
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Créer un compte</h2>

                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') }}" placeholder="Nom" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" placeholder="Email" required
                               autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mot de passe</label>
                        <div class="input-group input-group-flat">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                            d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/><path
                            d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/></svg>
                  </a>
                </span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirmer le mot de passe</label>
                        <div class="input-group input-group-flat">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation"
                                   required autocomplete="new-password">
                            <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                            d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/><path
                            d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/></svg>
                  </a>
                </span>
                        </div>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Créer un nouveau compte</button>
                    </div>
                </div>
            </form>
            <div class="text-center text-secondary mt-3">
                Vous avez déjà un compte ? <a href="./sign-in.html" tabindex="-1">Se connecter</a>
            </div>
        </div>
    </div>
@endsection
