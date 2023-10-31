@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form class="card" method="POST" action="{{ route('announcements.store') }}" enctype="multipart/form-data" style="height: 700px">
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
                            <label class="col-3 col-form-label">Budget</label>
                            <div class="col">
                                <input type="number" class="form-control" name="budget" value="{{ old('budget') }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-3 col-form-label">Image</label>
                            <div class="col">
                                <input type="file" class="form-control" name="image">
                                <small class="form-hint">Formats autorisés : jpeg, png, jpg, gif (max 2048 KB).</small>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-3 col-form-label">Catégories</label>
                            <div class="col">
                                <select class="form-select" name="categories[]" id="categories" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                            <div class="col">
                                <textarea name="description" id="editor" class="hidden-editor" style="display: none;"></textarea>
                                <div id="quill-editor" style="max-height: 200px; height: 200px; overflow-y: auto;"></div>
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

@section('js')
    <script type="module">
        document.addEventListener('DOMContentLoaded', function () {
            new TomSelect("#categories", {
                maxItems: 3
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            let quill = new Quill('#quill-editor', {
                modules: {
                    syntax: false,
                },
                theme: 'snow'
            });

            quill.on('text-change', function() {
                const quillContent = quill.root.innerHTML;
                const updatedContentDiv = document.querySelector('#editor');

                if (updatedContentDiv) {
                    updatedContentDiv.innerHTML = quillContent;
                }
            });
        });
    </script>
@endsection
