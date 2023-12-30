@extends('layouts.app')

@section('content')
    <div class="page-wrapper py-4">
        @if (session('success'))
            <div class="d-flex justify-content-center align-items-center">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <ads-list :announcements='@json($announcements)' :adscategories='@json($adsCategories)'></ads-list>

    </div>
@endsection

