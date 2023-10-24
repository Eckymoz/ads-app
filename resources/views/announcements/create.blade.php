@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="card" method="POST" action="{{ route('announcements.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Créer une nouvelle annonce</h3>
                    </div>

                    <div class="card-body">
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Titre</label>
                            <div class="col">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-3 col-form-label">Description</label>
                            <div class="col">
                                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-3 col-form-label">Budget</label>
                            <div class="col">
                                <input type="number" class="form-control" name="budget" value="{{ old('budget') }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-3 col-form-label">Image</label>
                            <div class="col">
                                <input type="file" class="form-control" name="image" accept="image/*">
                                <small class="form-hint">Formats autorisés : jpeg, png, jpg, gif (max 2048 KB).</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
