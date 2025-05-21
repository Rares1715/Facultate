@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="mb-0">
                <i class="fas fa-cut me-2"></i> Services
            </h1>
            <p class="text-muted">Manage your barbershop services and pricing</p>
        </div>
        <div class="col-md-6 text-end d-flex align-items-center justify-content-end">
            <a href="#" class="btn btn-primary">
                <i class="fas fa-plus-circle me-1"></i> Add Service
            </a>
        </div>
    </div>

    <div class="row mb-4">
        <!-- Service Category Cards -->
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Haircuts</h6>
                            <h3 class="mt-2 mb-0">2</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3 d-flex align-items-center justify-content-center">
                            <i class="fas fa-cut fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Beard</h6>
                            <h3 class="mt-2 mb-0">1</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-alt fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Styling</h6>
                            <h3 class="mt-2 mb-0">2</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3 d-flex align-items-center justify-content-center">
                            <i class="fas fa-magic fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Packages</h6>
                            <h3 class="mt-2 mb-0">1</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3 d-flex align-items-center justify-content-center">
                            <i class="fas fa-gift fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row g-3 align-items-center">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-light">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" placeholder="Search services..." id="search-input">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="filter-category">
                        <option value="">All Categories</option>
                        <option value="haircuts">Haircuts</option>
                        <option value="beard">Beard</option>
                        <option value="styling">Styling</option>
                        <option value="packages">Packages</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="sort-by">
                        <option value="name">Sort by Name</option>
                        <option value="price-low">Price (Low to High)</option>
                        <option value="price-high">Price (High to Low)</option>
                        <option value="duration">Duration</option>
                    </select>
                </div>
                <div class="col-md-2 text-end">
                    <button class="btn btn-outline-secondary" id="refresh-btn">
                        <i class="fas fa-sync-alt"></i> Refresh
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                    <tr>
                        <th class="ps-3"><i class="fas fa-tag me-1 text-muted"></i> Service</th>
                        <th><i class="fas fa-info-circle me-1 text-muted"></i> Description</th>
                        <th><i class="fas fa-clock me-1 text-muted"></i> Duration</th>
                        <th><i class="fas fa-dollar-sign me-1 text-muted"></i> Price</th>
                        <th class="text-end pe-3">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="ps-3">
                            <div class="d-flex align-items-center">
                                <div class="service-icon bg-primary text-white me-3">
                                    <i class="fas fa-cut"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold">Haircut</div>
                                    <span class="badge bg-primary rounded-pill">Haircuts</span>
                                </div>
                            </div>
                        </td>
                        <td>Standard haircut with styling</td>
                        <td>
                            <i class="far fa-clock me-1"></i> 30 min
                        </td>
                        <td>
                            <span class="fw-bold">$25.00</span>
                        </td>
                        <td class="text-end pe-3">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit me-2 text-primary"></i> Edit Service
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-clone me-2 text-info"></i> Duplicate
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-trash-alt me-2 text-danger"></i> Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3">
                            <div class="d-flex align-items-center">
                                <div class="service-icon bg-success text-white me-3">
                                    <i class="fas fa-user-alt"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold">Beard Trim</div>
                                    <span class="badge bg-success rounded-pill">Beard</span>
                                </div>
                            </div>
                        </td>
                        <td>Beard trimming and shaping</td>
                        <td>
                            <i class="far fa-clock me-1"></i> 15 min
                        </td>
                        <td>
                            <span class="fw-bold">$15.00</span>
                        </td>
                        <td class="text-end pe-3">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit me-2 text-primary"></i> Edit Service
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-clone me-2 text-info"></i> Duplicate
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-trash-alt me-2 text-danger"></i> Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3">
                            <div class="d-flex align-items-center">
                                <div class="service-icon bg-info text-white me-3">
                                    <i class="fas fa-palette"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold">Hair Coloring</div>
                                    <span class="badge bg-info rounded-pill">Styling</span>
                                </div>
                            </div>
                        </td>
                        <td>Full hair coloring service</td>
                        <td>
                            <i class="far fa-clock me-1"></i> 60 min
                        </td>
                        <td>
                            <span class="fw-bold">$50.00</span>
                        </td>
                        <td class="text-end pe-3">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit me-2 text-primary"></i> Edit Service
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-clone me-2 text-info"></i> Duplicate
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-trash-alt me-2 text-danger"></i> Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3">
                            <div class="d-flex align-items-center">
                                <div class="service-icon bg-primary text-white me-3">
                                    <i class="fas fa-razor"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold">Shave</div>
                                    <span class="badge bg-primary rounded-pill">Haircuts</span>
                                </div>
                            </div>
                        </td>
                        <td>Traditional straight razor shave</td>
                        <td>
                            <i class="far fa-clock me-1"></i> 20 min
                        </td>
                        <td>
                            <span class="fw-bold">$20.00</span>
                        </td>
                        <td class="text-end pe-3">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit me-2 text-primary"></i> Edit Service
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-clone me-2 text-info"></i> Duplicate
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-trash-alt me-2 text-danger"></i> Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3">
                            <div class="d-flex align-items-center">
                                <div class="service-icon bg-info text-white me-3">
                                    <i class="fas fa-magic"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold">Hair Styling</div>
                                    <span class="badge bg-info rounded-pill">Styling</span>
                                </div>
                            </div>
                        </td>
                        <td>Hair styling without cutting</td>
                        <td>
                            <i class="far fa-clock me-1"></i> 30 min
                        </td>
                        <td>
                            <span class="fw-bold">$35.00</span>
                        </td>
                        <td class="text-end pe-3">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit me-2 text-primary"></i> Edit Service
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-clone me-2 text-info"></i> Duplicate
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-trash-alt me-2 text-danger"></i> Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3">
                            <div class="d-flex align-items-center">
                                <div class="service-icon bg-warning text-dark me-3">
                                    <i class="fas fa-gift"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold">Full Service</div>
                                    <span class="badge bg-warning rounded-pill text-dark">Packages</span>
                                </div>
                            </div>
                        </td>
                        <td>Haircut, beard trim, and styling</td>
                        <td>
                            <i class="far fa-clock me-1"></i> 60 min
                        </td>
                        <td>
                            <div>
                                <span class="fw-bold">$75.00</span>
                                <small class="text-success d-block">Save $15.00</small>
                            </div>
                        </td>
                        <td class="text-end pe-3">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit me-2 text-primary"></i> Edit Service
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-clone me-2 text-info"></i> Duplicate
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-trash-alt me-2 text-danger"></i> Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Showing 6 services</small>
                </div>
                <button class="btn btn-sm btn-primary">
                    <i class="fas fa-file-export me-1"></i> Export Services
                </button>
            </div>
        </div>
    </div>
@endsection
