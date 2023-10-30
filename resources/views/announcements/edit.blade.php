@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="card" method="POST" action="{{ route('announcements.update', ['announcement' => $announcement->id, 'categories' => $categories]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-header">
                        <h3 class="card-title">Modifier l'annonce</h3>
                    </div>

                    <div class="card-body">
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Titre</label>
                            <div class="col">
                                <input type="text" class="form-control" name="title" value="{{ $announcement->title }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-3 col-form-label">Description</label>
                            <div class="col">
                                <textarea class="form-control" name="description">{{ $announcement->description }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-3 col-form-label">Budget</label>
                            <div class="col">
                                <input type="number" class="form-control" name="budget" value="{{ $announcement->budget }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-3 col-form-label">Image actuelle</label>
                            <div class="col">
                                @if($announcement->image)
                                    <img src="data:image/png;base64,{{ base64_encode($announcement->image) }}" alt="Image de l'annonce">
                                @else
                                    Aucune image disponible
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-3 form-label">Catégories</label>
                            <div class="col">
                                <select type="text" name="categories[]" class="form-select" id="categories" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}" @if($announcementCategories->contains('id', $category->id)) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="module">
        document.addEventListener('DOMContentLoaded', function () {
            new TomSelect("#categories", {
                maxItems: 3
            });
        });
    </script>
@endsection
