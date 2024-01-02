@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center py-4">
            <div class="col-md-12">
                <form class="card" method="POST"
                      action="{{ route('announcements.update', ['announcement' => $announcement->id, 'categories' => $categories]) }}"
                      enctype="multipart/form-data">
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
                            <label class="col-3 col-form-label">Budget</label>
                            <div class="col">
                                <input type="number" class="form-control" name="budget" value="{{ $announcement->budget }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-3 form-label">Catégories</label>
                            <div class="col">
                                <select type="text" name="categories[]" class="form-select" id="categories" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}"
                                                @if($announcementCategories->contains('id', $category->id)) selected @endif>{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-3 col-form-label">Image actuelle</label>
                            <div class="col">
                                    @if($announcement->image)
                                        @if (Storage::exists('public/' . $announcement->image))
                                            <div class="d-flex align-items-center">
                                                <img class="avatar avatar-xl" id="image_preview" style="background-image: url('{{ asset('storage/'.$announcement->image) }}');"></img>
                                                <div class="ml-3">
                                                    <label for="upload_image" class="btn btn-ghost-warning">
                                                        Modifier l'image
                                                    </label>
                                                    <input type="file" id="upload_image" name="image" style="display: none;" onchange="previewImage()">
                                                </div>
                                            </div>
                                        @else
                                            <div class="d-flex align-items-center">
                                                <img class="avatar avatar-xl" id="image_preview" style="background-image: url('{{ asset($announcement->image) }}');"></img>
                                                <div class="ml-3">
                                                    <label for="upload_image" class="btn btn-ghost-warning">
                                                        Modifier l'image
                                                    </label>
                                                    <input type="file" id="upload_image" name="image" style="display: none;" onchange="previewImage()">
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        Aucune image disponible
                                    @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col">
                                <div id="quill-editor" style="height: 500px; overflow-y: auto;"></div>
                                <input type="hidden" name="description" id="description-field">

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
    <script src="{{ asset('js/previewImage.js') }}"></script>
    <script type="module">
        document.addEventListener('DOMContentLoaded', function () {
            new TomSelect("#categories", {
                maxItems: 3
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const quill =  new Quill('#quill-editor', {
                modules: {
                    syntax: false,
                    toolbar: [
                        [{ 'header': '1' }, { 'header': '2' }],
                        ['bold', 'italic', 'underline'],
                        ['image', 'code-block'],
                        [{ list: 'ordered' }, { list: 'bullet' }],
                        [{ 'script': 'sub' }, { 'script': 'super' }],
                        ['blockquote', 'code-block'],
                        [{ 'align': [] }],
                        ['link', 'video'],
                        ['clean'],
                        [{ 'preview': 'preview' }],
                    ]
                },
                theme: 'snow'
            });

            const existingContent = `{!! $announcement->description !!}`;
            quill.clipboard.dangerouslyPasteHTML(existingContent);

            document.querySelector('#description-field').value = quill.root.innerHTML;

            quill.on('text-change', function() {
                document.querySelector('#description-field').value = quill.root.innerHTML;
            });
        })
    </script>
@endsection
