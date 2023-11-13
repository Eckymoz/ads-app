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
                                    <button class="table-sort" data-sort="sort-date">Date</button>
                                </th>
                                <th>
                                    <button class="table-sort" data-sort="sort-editor">Rédacteur</button>
                                </th>
                                <th>
                                    <button class="table-sort" data-sort="sort-editor">Etat</button>
                                </th>

                            </tr>
                            </thead>
                            <tbody class="table-tbody">
                            @foreach($announcements as $announcement)
                                <tr>
                                    <td> {{ $announcement->title }} </td>
                                    <td> {{ $announcement->created_at }} </td>
                                    <td> {{ $announcement->user->name }} </td>
                                    <td><span class="badge bg-yellow-lt">En attente de validation</span></td>
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
