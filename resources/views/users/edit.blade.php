@extends('layouts.app')

@section('content')

    <div class="container-xl">
        <div class="card">
            <div class="row g-0">
                <div class="col-12 col-md-12 d-flex flex-column">
                    <div class="card-body">
                        <h2 class="mb-4">Mon compte</h2>
                        <h3 class="card-title">Détails du profil</h3>
                        <div class="row align-items-center">
                            <div class="col-auto"><span class="avatar avatar-xl" style=""></span>
                            </div>
                            <div class="col-auto"><a href="#" class="btn">
                                    Changer d'avatar
                                </a></div>
                            <div class="col-auto"><a href="#" class="btn btn-ghost-danger">
                                    Supprimer l'avatar
                                </a></div>
                        </div>

                        <div class="row g-3 mt-3">
                            <div class="col-md-3">
                                <div class="form-label">Nom</div>
                                <input type="text" class="form-control" value="Tabler">
                            </div>
                        </div>
                        <h3 class="card-title mt-4">Email</h3>
                        <p class="card-subtitle">Restez informé de nos annonces et mises à jour via email pour booster votre projet et recruter des membres.</p>
                        <div>
                            <div class="row g-2">
                                <div class="col-auto">
                                    <input type="text" class="form-control w-auto" value="paweluna@howstuffworks.com">
                                </div>
                                <div class="col-auto"><a href="#" class="btn">
                                        Mettre à jour
                                    </a></div>
                            </div>
                        </div>
                        <h3 class="card-title mt-4">Mot de passe</h3>
                        <div>
                            <a href="#" class="btn">
                                Définir un nouveau mot de passe
                            </a>
                        </div>
                        <h3 class="card-title mt-4">Profil public</h3>
                        <p class="card-subtitle">En mettant votre profil en public, vous pourriez mettre vos compétences en valeur</p>
                        <div>
                            <label class="form-check form-switch form-switch-lg">
                                <input class="form-check-input" type="checkbox" >
                                <span class="form-check-label form-check-label-on">Vous êtes actuellement visible</span>
                                <span class="form-check-label form-check-label-off">Vous n'êtes actuellement pas visible</span>
                            </label>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent mt-auto">
                        <div class="btn-list justify-content-end">
                            <a href="#" class="btn btn-primary">
                                Mettre à jour
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
