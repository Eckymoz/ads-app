@extends('layouts.app')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div id="table-default" class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    <button class="table-sort" data-sort="sort-title">Titre</button>
                                </th>
                                <th>
                                    <button class="table-sort" data-sort="sort-date">Date de creation</button>
                                </th>
                                <th>
                                    <button class="table-sort" data-sort="sort-editor">Rédacteur</button>
                                </th>
                                <th>
                                    <button class="table-sort" data-sort="sort-editor">Etat</button>
                                </th>
                                <th>
                                </th>

                            </tr>
                            </thead>
                            <tbody class="table-tbody">
                            @foreach($ads as $ad)
                                <tr>
                                    <td> {{ $ad->title }} </td>
                                    <td> {{ $ad->created_at }} </td>
                                    <td> {{ $ad->user->name }} </td>
                                    <td><span class="badge bg-yellow-lt">En attente de validation</span></td>
                                    <td>
                                        <a href="{{ route('ads.edit', $ad->id) }}" class="btn btn-primary">Editer
                                            <i class="ti ti-pencil ms-2"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const list = new List('table-default', {
                sortClass: 'table-sort',
                listClass: 'table-tbody',
                valueNames: [ 'sort-name', 'sort-type', 'sort-city', 'sort-score',
                    { attr: 'data-date', name: 'sort-date' },
                    { attr: 'data-progress', name: 'sort-progress' },
                    'sort-quantity'
                ]
            });
        })
    </script>
@endsection
