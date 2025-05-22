<div class="row mb-3">
    <div class="col-md-6">
        <label for="nume" class="form-label">Numele Serviciu <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text bg-light">
                <i class="fas fa-user text-muted"></i>
            </span>
            <input type="text" class="form-control @error('service.nume') is-invalid @enderror" id="nume" wire:model="service.nume" required>
            @error('service.nume')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-6">
        <label for="descriere" class="form-label">Descriere</label>
        <input type="text" class="form-control @error('service.descriere') is-invalid @enderror"
               id="descriere" wire:model="service.descriere">
        @error('service.descriere')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-6">
        <label for="durata" class="form-label">Durata</label>
        <input type="text" class="form-control @error('service.durata') is-invalid @enderror"
               id="durata" wire:model="service.durata" placeholder="ex: 30 min">
        @error('service.durata')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <label for="price" class="form-label">Pret <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text bg-light">
                <i class="fas fa-dollar-sign text-muted"></i>
            </span>
            <input type="number" step="0.01" min="0" class="form-control @error('service.price') is-invalid @enderror" id="price" wire:model="service.price" required>
            @error('service.price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

