<div class="row mb-3">
    <div class="col-md-6">
        <label for="client_name" class="form-label">Numele Clientului <span class="text-danger">*</span></label>
        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-user text-muted"></i>
                            </span>
            <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name" wire:model="reservation.client_name" required>
            @error('client_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <small class="text-muted">Nume + Prenume</small>
    </div>

    <div class="col-md-6">
        <label for="service" class="form-label">Serviciu <span class="text-danger">*</span></label>
        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-cut text-muted"></i>
                            </span>
            <select class="form-select @error('service') is-invalid @enderror" id="service" name="service" required  wire:model="reservation.service">
                <option value="" selected disabled>Selecteaza serviciu</option>
                <option value="Haircut" {{ old('service') == 'Haircut' ? 'selected' : '' }} data-price="25.00">Tuns - 25.00 lei</option>
                <option value="Beard Trim" {{ old('service') == 'Beard Trim' ? 'selected' : '' }} data-price="15.00">Barba - 15.00 lei</option>
                <option value="Hair Coloring" {{ old('service') == 'Hair Coloring' ? 'selected' : '' }} data-price="50.00">Vopsit par - 50.00 lei</option>
                <option value="Shave" {{ old('service') == 'Shave' ? 'selected' : '' }} data-price="20.00">Ras - $20.00</option>
                <option value="Hair Styling" {{ old('service') == 'Hair Styling' ? 'selected' : '' }} data-price="35.00">Hair Styling - 35.00 lei</option>
                <option value="Full Service" {{ old('service') == 'Full Service' ? 'selected' : '' }} data-price="75.00">Pachet - 75.00 lei</option>
            </select>
            @error('service')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <small class="text-muted">Selecteaza serviciul</small>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="time" class="form-label">Data si ora <span class="text-danger">*</span></label>
        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-calendar-alt text-muted"></i>
                            </span>
            <input type="datetime-local" class="form-control @error('time') is-invalid @enderror" id="time" name="time" wire:model="reservation.time" required>
            @error('time')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <small class="text-muted">Selecteaza data si ora</small>
    </div>

    <div class="col-md-6">
        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-tag text-muted"></i>
                            </span>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required wire:model="reservation.status">
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>In asteptare</option>
                <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmata</option>
                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Anulata</option>
            </select>
            @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <small class="text-muted">Seteaza statusul initial al rezervarii</small>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <label for="price" class="form-label">Pret <span class="text-danger">*</span></label>
        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-dollar-sign text-muted"></i>
                            </span>
            <input type="number" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" id="price" name="price" wire:model="reservation.price" required>
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

    </div>
</div>

