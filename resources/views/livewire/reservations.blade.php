<div>
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="mb-0">
                <i class="fas fa-calendar-check me-2"></i> Programari
            </h1>
            <p class="text-muted">Toate Programarile</p>
        </div>
        <div class="col-md-6 text-end d-flex align-items-center justify-content-end">
            <a href="#" class="btn btn-primary" wire:click="openpop('new')">
                <i class="fas fa-plus-circle me-1"></i> Programare Noua
            </a>
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
                        <input type="text" class="form-control border-start-0" placeholder="Cauta programarea..." id="search-input" wire:model="search" wire:change="resetPagination()">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="status-filter"wire:model="status" wire:change="resetPagination()">
                        <option value="">Toate statusurile</option>
                        <option value="confirmed" {{ request()->get('status') == 'confirmed' ? 'selected' : '' }}>
                            <i class="fas fa-check-circle"></i> Confirmata
                        </option>
                        <option value="pending" {{ request()->get('status') == 'pending' ? 'selected' : '' }}>
                            <i class="fas fa-clock"></i> In asteptare
                        </option>
                        <option value="cancelled" {{ request()->get('status') == 'cancelled' ? 'selected' : '' }}>
                            <i class="fas fa-times-circle"></i> Anulata
                        </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="sort-by" wire:model="sortBy" wire:change="resetPagination()">
                        <option value="latest">Cele mai noi</option>
                        <option value="oldest">Cele mai vechi</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                    <tr>
                        <th class="ps-3">#</th>
                        <th><i class="fas fa-user me-1 text-muted"></i> Clienti</th>
                        <th><i class="fas fa-cut me-1 text-muted"></i> Serviciu</th>
                        <th><i class="fas fa-clock me-1 text-muted"></i> Timp</th>
                        <th><i class="fas fa-dollar-sign me-1 text-muted"></i> Pret</th>
                        <th><i class="fas fa-tag me-1 text-muted"></i> Status</th>
                        <th class="text-end pe-3">Actiuni</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rezervari as $reservation)
                        <tr>
                            <td class="ps-3">{{ $reservation->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle bg-primary text-white me-2">
                                        {{ strtoupper(substr($reservation->client_name, 0, 1)) }}
                                    </div>
                                    <span>{{ $reservation->client_name }}</span>
                                </div>
                            </td>
                            <td>{{ $reservation->service }}</td>
                            <td>
                                <div>
                                    <i class="far fa-calendar-alt me-1"></i>
                                    {{ \Carbon\Carbon::parse($reservation->time)->format('M d, Y') }}
                                </div>
                                <small class="text-muted">
                                    <i class="far fa-clock me-1"></i>
                                    {{ \Carbon\Carbon::parse($reservation->time)->format('g:i A') }}
                                </small>
                            </td>
                            <td>
                                <span class="fw-bold">{{ number_format($reservation->price, 2, ',', '.') }} lei</span>
                            </td>
                            <td>
                                    <span class="badge bg-{{ $reservation->status === 'confirmed' ? 'success' : ($reservation->status === 'pending' ? 'warning' : 'danger') }} rounded-pill px-3 py-2">
                                        <i class="fas fa-{{ $reservation->status === 'confirmed' ? 'check-circle' : ($reservation->status === 'pending' ? 'clock' : 'times-circle') }} me-1"></i>
                                        {{ ucfirst($reservation->status) }}
                                    </span>
                            </td>
                            <td class="text-end pe-3">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-eye me-2 text-primary"></i> View Details
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"  wire:click="openpop({{ $reservation->id }})">
                                                <i class="fas fa-edit me-2 text-info"></i> Edit
                                            </a>
                                        </li>
                                        @if($reservation->status !== 'cancelled')
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fas fa-times-circle me-2 text-danger"></i> Cancel
                                                </a>
                                            </li>
                                        @endif
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-print me-2"></i> Print
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if($rezervari)
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">

                <div>
                    {{ $rezervari->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>

    @if($popup)
        <div class="modal fade show" tabindex="-1" role="dialog" style="display: block!important;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Formular Programare</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closepop">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('create_programare')
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" wire:click="save()">
                            <i class="fas fa-save me-1"></i> Creaza Programare
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closepop">Inchide</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
