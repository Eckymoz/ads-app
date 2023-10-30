@extends('layouts.app')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="row g-0">
                    <div class="col-12 col-lg-5 col-xl-3 border-end">
                        <div class="card-body p-0 scrollable text-center">
                            <div class="avatar avatar-xl mt-3" style="background-image: url('data:image/jpeg;base64, {{ base64_encode($announcement->image) }}'); background-size: cover;">
                            </div>
                            <div class="mt-3 text-center">
                                {{ $announcement->user->name }}
                            </div>
                            <div class="nav flex-column nav-pills" role="tablist">

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 col-xl-9 d-flex flex-column">
                        <div class="card-body scrollable">
                            <div class="chat">
                                <div class="chat-bubbles">
                                    <div>
                                        {{ $announcement->title }}
                                    </div>
                                    <div>
                                        {{ $announcement->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
