<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Search for Jobs
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <a href="#" class="btn btn-primary">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 5l0 14"/>
                        <path d="M5 12l14 0"/>
                    </svg>
                    Post a job
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-3">
                <form action="./" method="get" autocomplete="off" novalidate class="sticky-top">
                    <div class="form-label">Job Types</div>
                    <div class="mb-4">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="form-type[]" value="1"
                                   checked>
                            <span class="form-check-label">Programming</span>
                        </label>
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="form-type[]" value="2"
                                   checked>
                            <span class="form-check-label">Design</span>
                        </label>
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="form-type[]" value="3">
                            <span class="form-check-label">Management / Finance</span>
                        </label>
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="form-type[]" value="4">
                            <span class="form-check-label">Customer Support</span>
                        </label>
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="form-type[]" value="5">
                            <span class="form-check-label">Sales / Marketing</span>
                        </label>
                    </div>
                    <div class="form-label">Remote</div>
                    <div class="mb-4">
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-label form-check-label-on">On</span>
                            <span class="form-check-label form-check-label-off">Off</span>
                        </label>
                    </div>
                    <div class="form-label">Salary Range</div>
                    <div class="mb-4">
                        <label class="form-check">
                            <input type="radio" class="form-check-input" name="form-salary" value="1" checked>
                            <span class="form-check-label">$20K - $50K</span>
                        </label>
                        <label class="form-check">
                            <input type="radio" class="form-check-input" name="form-salary" value="2" checked>
                            <span class="form-check-label">$50K - $100K</span>
                        </label>
                        <label class="form-check">
                            <input type="radio" class="form-check-input" name="form-salary" value="3">
                            <span class="form-check-label">> $100K</span>
                        </label>
                        <label class="form-check">
                            <input type="radio" class="form-check-input" name="form-salary" value="4">
                            <span class="form-check-label">Drawing / Painting</span>
                        </label>
                    </div>
                    <div class="form-label">Immigration</div>
                    <div class="mb-4">
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-label form-check-label-on">On</span>
                            <span class="form-check-label form-check-label-off">Off</span>
                        </label>
                        <div class="small text-secondary">Only show companies that can sponsor a visa</div>
                    </div>
                    <div class="form-label">Location</div>
                    <div class="mb-4">
                        <select class="form-select">
                            <option>Anywhere</option>
                            <option>London</option>
                            <option>San Francisco</option>
                            <option>New York</option>
                            <option>Berlin</option>
                        </select>
                    </div>
                    <div class="mt-5">
                        <button class="btn btn-primary w-100">
                            Confirm changes
                        </button>
                        <a href="#" class="btn btn-link w-100">
                            Reset to defaults
                        </a>
                    </div>
                </form>
            </div>
