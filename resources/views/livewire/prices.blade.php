<div>
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="mb-0">
                <i class="fas fa-cut me-2"></i> Servicii
            </h1>
            <p class="text-muted">Serviciile si preturile tale</p>
        </div>
        <div class="col-md-6 text-end d-flex align-items-center justify-content-end">
            <a href="#" class="btn btn-primary" wire:click="openpop('new')">
                <i class="fas fa-plus-circle me-1"></i> Adauga Serviciu
            </a>
        </div>
    </div>

    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mt-2 mb-0">Servicii {{ $totalServices }}</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3 d-flex align-items-center justify-content-center">
                            <i class="fas fa-cut fa-2x text-primary"></i>
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
                        <input type="text" class="form-control border-start-0" placeholder="Cauta serviciu..." id="search-input">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="filter-category">
                        <option value="">Toate categoriile</option>
                        <option value="haircuts">Tunsori</option>
                        <option value="beard">Barba</option>
                        <option value="styling">Styling</option>
                        <option value="packages">Pachete</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="sort-by">
                        <option value="name">Sorteaza dupa nume</option>
                        <option value="price-low">Price (Mic catre Mare)</option>
                        <option value="price-high">Pret (Mare catre Mic)</option>
                        <option value="duration">Durata</option>
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
                        <th class="ps-3"><i class="fas fa-tag me-1 text-muted"></i> Serviciu</th>
                        <th><i class="fas fa-info-circle me-1 text-muted"></i> Descriere</th>
                        <th><i class="fas fa-clock me-1 text-muted"></i> Durata</th>
                        <th><i class="fas fa-dollar-sign me-1 text-muted"></i> Pret</th>
                        <th class="text-end pe-3">Actiune</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($prices as $price)
                        <tr>
                            <td class="ps-3">
                                <div class="d-flex align-items-center">
                                    <div class="service-icon bg-primary text-white me-3">
                                        <i class="fas fa-cut"></i>
                                    </div>
                                    <div>
                                        <div class="fw-semibold">{{ $price->nume }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $price->descriere }}</td>

                            <td><i class="far fa-clock me-1"></i> {{ $price->durata }}</td>
                            <td><span class="fw-bold">{{ $price->price }} lei</span></td>
                            <td class="text-end pe-3">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#" wire:click="openpop({{ $price->id }})">
                                                <i class="fas fa-edit me-2 text-primary"></i> Editează
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item text-danger" href="#" wire:click="delete({{ $price->id }})">
                                                <i class="fas fa-trash-alt me-2"></i> Șterge
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

    </div>
    @if($popup)
        <div class="modal fade show" tabindex="-1" role="dialog" style="display: block!important;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Formular Serviciu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closepop">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('create_serviciu')
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" wire:click="save()">
                            <i class="fas fa-save me-1"></i> Creaza Serviciu
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closepop">Inchide</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
