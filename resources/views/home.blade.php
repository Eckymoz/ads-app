@extends('layouts.app')

@section('content')
    <div class="page-wrapper">

        @include('_filter_ads')
        @include('_list_ads')

    </div>
@endsection
