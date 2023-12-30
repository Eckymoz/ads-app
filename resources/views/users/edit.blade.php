@extends('layouts.app')

@section('content')
    <div class="container-xl">
        @if (session('success'))
            <div class="d-flex justify-content-center align-items-center">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="card">
            <div class="row g-0">
                <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <h2 class="mb-4">Mon compte</h2>
                        <h3 class="card-title">Détails du profil</h3>
                        <div class="row align-items-center">
                            <div class="col-auto">
                                @if (Storage::exists('public/' . $user->avatar))
                                    <div class="avatar avatar-xl"
                                         style="background-image: url('{{ asset('storage/'.$user->avatar) }}');"></div>
                                @else
                                    <div class="avatar avatar-xl"
                                         style="background-image: url('{{ asset($user->avatar) }}');"></div>
                                @endif
                            </div>
                            <div class="col-auto">
                                <input type="file" class="form-control" name="image">
                                <small class="form-hint">Formats autorisés : jpeg, png, jpg, gif (max 2048
                                    KB).</small>
                            </div>
                        </div>


                        <div class="row g-3 mt-3">
                            <div class="col-md-3">
                                <div class="form-label">Nom</div>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                        </div>

                        <h3 class="card-title mt-4">Email</h3>
                        <p class="card-subtitle">Restez informé de nos annonces et mises à jour via email pour
                            booster votre projet et recruter des membres.</p>
                        <div>
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                        </div>


                        <h3 class="card-title mt-4">Mot de passe</h3>
                        <div>
                            <a href="#" class="btn">Définir un nouveau mot de passe</a>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
