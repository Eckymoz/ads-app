<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-4">
            <div class="space-y">
                @foreach($ads as $ad)
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-auto">
                                <div class="card-body">
                                    @if (Storage::exists('public/' . $ad->image))
                                        <div class="avatar avatar-xl" style="background-image: url('{{ asset('storage/'.$ad->image) }}');"></div>
                                    @else
                                        <div class="avatar avatar-xl" style="background-image: url('{{ asset($ad->image) }}');"></div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="card-body ps-0">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-0"><a href="{{ route('ads.edit', ['ad' => $ad->id]) }}">{{ $ad->title }}</a></h3>
                                            <p>{!! $ad->description !!}</p>
                                        </div>
                                        <div class="col-auto fs-3 text-green">{{ $ad->budget }} €</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div
                                                class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                                <div class="list-inline-item">
                                                    <i class="ti ti-user"></i>
                                                    <span class="fs-5">{{ $ad->user->name }}</span>
                                                </div>
                                                <div class="list-inline-item">
                                                    <i class="ti ti-calendar-event"></i>
                                                   <span class="fs-5">{{ $ad->created_at }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                                <!-- Ici, vous pouvez inclure des informations supplémentaires pour les écrans de petite taille -->
                                            </div>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="mt-3 badges">
                                                @foreach ($ad->categories as $category)
                                                    <a href="#"
                                                       class="badge badge-outline text-secondary fw-normal badge-pill">{{ $category->name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
