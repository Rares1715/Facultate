@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="mb-0">
                <i class="fas fa-users me-2"></i> Clients
            </h1>
            <p class="text-muted">Manage your barbershop clients and their information</p>
        </div>
        <div class="col-md-6 text-end d-flex align-items-center justify-content-end">
            <a href="#" class="btn btn-primary">
                <i class="fas fa-user-plus me-1"></i> Add Client
            </a>
        </div>
    </div>

    <div class="row mb-4">
        <!-- Client Stats Cards -->
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-2x mb-2"></i>
                    <h5 class="card-title">Total Clients</h5>
                    <h2>5</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <i class="fas fa-user-check fa-2x mb-2"></i>
                    <h5 class="card-title">Active Clients</h5>
                    <h2>4</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body text-center">
                    <i class="fas fa-calendar-alt fa-2x mb-2"></i>
                    <h5 class="card-title">This Month</h5>
                    <h2>3</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning">
                <div class="card-body text-center">
                    <i class="fas fa-user-plus fa-2x mb-2"></i>
                    <h5 class="card-title">New Clients</h5>
                    <h2>2</h2>
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
                        <input type="text" class="form-control border-start-0" placeholder="Search clients..." id="search-input">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="filter-visits">
                        <option value="">All Clients</option>
                        <option value="recent">Recent Visitors</option>
                        <option value="frequent">Frequent Visitors (5+)</option>
                        <option value="inactive">Inactive (30+ days)</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="sort-by">
                        <option value="name">Sort by Name</option>
                        <option value="recent">Most Recent Visit</option>
                        <option value="visits">Most Visits</option>
                    </select>
                </div>
                <div class="col-md-2 text-end">
                    <button class="btn btn-outline-secondary" id="export-btn">
                        <i class="fas fa-download me-1"></i> Export
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                    <tr>
                        <th class="ps-3"><i class="fas fa-user me-1 text-muted"></i> Name</th>
                        <th><i class="fas fa-envelope me-1 text-muted"></i> Email</th>
                        <th><i class="fas fa-phone me-1 text-muted"></i> Phone</th>
                        <th><i class="fas fa-calendar me-1 text-muted"></i> Last Visit</th>
                        <th><i class="fas fa-history me-1 text-muted"></i> Visits</th>
                        <th class="text-end pe-3">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="ps-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar-circle bg-primary text-white me-2">JD</div>
                                <div>
                                    <div class="fw-semibold">John Doe</div>
                                    <div class="text-muted small">Customer since Oct 2023</div>
                                </div>
                            </div>
                        </td>
                        <td>john.doe@example.com</td>
                        <td>(555) 123-4567</td>
                        <td>
                            <span class="badge bg-success rounded-pill">Recent</span>
                            Oct 15, 2023
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="fw-bold me-2">5</span>
                                <div class="progress flex-grow-1" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%"></div>
                                </div>
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
                                            <i class="fas fa-eye me-2 text-primary"></i> View Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit me-2 text-info"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-calendar-plus me-2 text-success"></i> New Reservation
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
                                <div class="avatar-circle bg-info text-white me-2">JS</div>
                                <div>
                                    <div class="fw-semibold">Jane Smith</div>
                                    <div class="text-muted small">Customer since Sep 2023</div>
                                </div>
                            </div>
                        </td>
                        <td>jane.smith@example.com</td>
                        <td>(555) 987-6543</td>
                        <td>
                            <span class="badge bg-success rounded-pill">Recent</span>
                            Oct 20, 2023
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="fw-bold me-2">3</span>
                                <div class="progress flex-grow-1" style="height: 5px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 30%"></div>
                                </div>
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
                                            <i class="fas fa-eye me-2 text-primary"></i> View Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit me-2 text-info"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-calendar-plus me-2 text-success"></i> New Reservation
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
                                <div class="avatar-circle bg-success text-white me-2">MJ</div>
                                <div>
                                    <div class="fw-semibold">Michael Johnson</div>
                                    <div class="text-muted small">Customer since Aug 2023</div>
                                </div>
                            </div>
                        </td>
                        <td>michael.johnson@example.com</td>
                        <td>(555) 456-7890</td>
                        <td>
                            <span class="badge bg-success rounded-pill">Recent</span>
                            Oct 18, 2023
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="fw-bold me-2">7</span>
                                <div class="progress flex-grow-1" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 70%"></div>
                                </div>
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
                                            <i class="fas fa-eye me-2 text-primary"></i> View Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit me-2 text-info"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-calendar-plus me-2 text-success"></i> New Reservation
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
                                <div class="avatar-circle bg-warning text-dark me-2">ED</div>
                                <div>
                                    <div class="fw-semibold">Emily Davis</div>
                                    <div class="text-muted small">Customer since Oct 2023</div>
                                </div>
                            </div>
                        </td>
                        <td>emily.davis@example.com</td>
                        <td>(555) 789-0123</td>
                        <td>
                            <span class="badge bg-success rounded-pill">Recent</span>
                            Oct 22, 2023
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="fw-bold me-2">2</span>
                                <div class="progress flex-grow-1" style="height: 5px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%"></div>
                                </div>
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
                                            <i class="fas fa-eye me-2 text-primary"></i> View Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit me-2 text-info"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-calendar-plus me-2 text-success"></i> New Reservation
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
                                <div class="avatar-circle bg-danger text-white me-2">RW</div>
                                <div>
                                    <div class="fw-semibold">Robert Wilson</div>
                                    <div class="text-muted small">Customer since Sep 2023</div>
                                </div>
                            </div>
                        </td>
                        <td>robert.wilson@example.com</td>
                        <td>(555) 234-5678</td>
                        <td>
                            <span class="badge bg-warning rounded-pill">10+ days</span>
                            Oct 10, 2023
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="fw-bold me-2">4</span>
                                <div class="progress flex-grow-1" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 40%"></div>
                                </div>
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
                                            <i class="fas fa-eye me-2 text-primary"></i> View Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit me-2 text-info"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-calendar-plus me-2 text-success"></i> New Reservation
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
                    <small class="text-muted">Showing 1 to 5 of 5 clients</small>
                </div>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection

