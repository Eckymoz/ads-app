@extends('layouts.app')

@section('content')
    <div class="page page-center">
        <div class="container container-tight py-2">
            <div class="text-center mb-4">
                <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="JoinMyCrew" class="avatar avatar-xl">
                </a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Connectez-vous à votre compte</h2>
                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Votre email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Mot de passe
                                <span class="form-label-description">
                                <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                            </span>
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Votre mot de passe">
                                <span class="input-group-text">
                                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                                    <!-- Ajoutez ici l'icône SVG de l'œil pour afficher le mot de passe -->
                                </a>
                            </span>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                        </div>
                    </form>
                </div>
                <div class="hr-text">or</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col"><a href="#" class="btn w-100">
                                <!-- Ajoutez ici le code HTML pour le bouton "Login with Github" -->
                            </a></div>
                        <div class="col"><a href="#" class="btn w-100">
                                <!-- Ajoutez ici le code HTML pour le bouton "Login with Twitter" -->
                            </a></div>
                    </div>
                </div>
            </div>
            <div class="text-center text-secondary mt-3">
                Vous n'avez pas de compte ? <a href="{{ route('register') }}" tabindex="-1">Créer un compte</a>
            </div>
        </div>
    </div>

@endsection
