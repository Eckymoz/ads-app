<div class="col-md-9">
    <div class="row row-cards">
        <div class="space-y">
            @foreach($announcements as $announcement)
                <div class="card">
                    <div class="row g-0">
                        <div class="col-auto">
                            <div class="card-body">
                                <div class="avatar avatar-xl"
                                     style="background-image: url('{{ $announcement->image }}')">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body ps-0">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="mb-0"><a href="#">{{ $announcement->title }}</a></h3>
                                    </div>
                                    <div class="col-auto fs-3 text-green">{{ $announcement->budget }} $</div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <div
                                            class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                            <div class="list-inline-item">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="icon icon-inline" width="24" height="24"
                                                     viewBox="0 0 24 24" stroke-width="2"
                                                     stroke="currentColor" fill="none"
                                                     stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                          fill="none"/>
                                                    <path
                                                        d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"/>
                                                </svg>
                                                {{ $announcement->company }}
                                            </div>
                                            <div class="list-inline-item">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="icon icon-inline" width="24" height="24"
                                                     viewBox="0 0 24 24" stroke-width="2"
                                                     stroke="currentColor" fill="none"
                                                     stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                          fill="none"/>
                                                    <path
                                                        d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"/>
                                                </svg>
                                                {{ $announcement->job_type }}
                                            </div>
                                            <div class="list-inline-item">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="icon icon-inline" width="24" height="24"
                                                     viewBox="0 0 24 24" stroke-width="2"
                                                     stroke="currentColor" fill="none"
                                                     stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                          fill="none"/>
                                                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"/>
                                                    <path
                                                        d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"/>
                                                </svg>
                                                {{ $announcement->location }}
                                            </div>
                                        </div>
                                        <div
                                            class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                            <!-- Ici, vous pouvez inclure des informations supplémentaires pour les écrans de petite taille -->
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="mt-3 badges">
                                            @foreach ($announcement->categories as $category)
                                                <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">{{ $category->name }}</a>
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
