@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="mb-0">
                <i class="fas fa-calendar-plus me-2"></i> Angajat nou
            </h1>
            <p class="text-muted">Adauga un angajat nou</p>
        </div>
        <div class="col-md-6 text-end d-flex align-items-center justify-content-end">
            <a href="{{ route('angajati') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Inapoi la angajati
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-white">
            <h5 class="mb-0">Detalii Angajat</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="client_name" class="form-label">Client Name <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-user text-muted"></i>
                            </span>
                            <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name" value="{{ old('client_name') }}" required>
                            @error('client_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">Enter the full name of the client</small>
                    </div>

                    <div class="col-md-6">
                        <label for="service" class="form-label">Service <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-cut text-muted"></i>
                            </span>
                            <select class="form-select @error('service') is-invalid @enderror" id="service" name="service" required>
                                <option value="" selected disabled>Select a service</option>
                                <option value="Haircut" {{ old('service') == 'Haircut' ? 'selected' : '' }} data-price="25.00">Haircut - $25.00</option>
                                <option value="Beard Trim" {{ old('service') == 'Beard Trim' ? 'selected' : '' }} data-price="15.00">Beard Trim - $15.00</option>
                                <option value="Hair Coloring" {{ old('service') == 'Hair Coloring' ? 'selected' : '' }} data-price="50.00">Hair Coloring - $50.00</option>
                                <option value="Shave" {{ old('service') == 'Shave' ? 'selected' : '' }} data-price="20.00">Shave - $20.00</option>
                                <option value="Hair Styling" {{ old('service') == 'Hair Styling' ? 'selected' : '' }} data-price="35.00">Hair Styling - $35.00</option>
                                <option value="Full Service" {{ old('service') == 'Full Service' ? 'selected' : '' }} data-price="75.00">Full Service - $75.00</option>
                            </select>
                            @error('service')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">Select the service for this appointment</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="time" class="form-label">Appointment Date & Time <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-calendar-alt text-muted"></i>
                            </span>
                            <input type="datetime-local" class="form-control @error('time') is-invalid @enderror" id="time" name="time" value="{{ old('time') }}" required>
                            @error('time')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">Select the date and time for the appointment</small>
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-tag text-muted"></i>
                            </span>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">Set the initial status of this reservation</small>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-dollar-sign text-muted"></i>
                            </span>
                            <input type="number" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">The price will be automatically set based on the selected service</small>
                    </div>
                </div>

                <div class="border-top pt-4 mt-2">
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-outline-secondary me-2">
                            <i class="fas fa-undo me-1"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Create Reservation
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Auto-populate price based on selected service
        document.getElementById('service').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            if (price) {
                document.getElementById('price').value = price;
            }
        });

        // Set initial price if service is pre-selected
        window.addEventListener('DOMContentLoaded', function() {
            const serviceSelect = document.getElementById('service');
            const selectedOption = serviceSelect.options[serviceSelect.selectedIndex];
            if (selectedOption && selectedOption.getAttribute('data-price')) {
                document.getElementById('price').value = selectedOption.getAttribute('data-price');
            }
        });
    </script>
@endsection

