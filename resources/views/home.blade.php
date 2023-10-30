@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        @if (session('success'))
            <div class="d-flex justify-content-center align-items-center">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @include('_filter_ads')
        @include('_list_ads')

    </div>
@endsection
