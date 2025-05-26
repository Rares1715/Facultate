<div>
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="mb-4">
                <i class="fas fa-tachometer-alt me-2"></i> Meniu Principal
            </h1>
        </div>
    </div>


    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-success text-white h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle bg-white bg-opacity-25 p-3 me-3">
                        <i class="fas fa-check-circle fa-2x text-white"></i>
                    </div>
                    <div>
                        <h6 class="card-title mb-0">Rezervari Confirmate</h6>
                        <h2 class="mt-2 mb-0">{{ $confirmed }}</h2>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 text-end">
                    <a href="/rezervari" class="text-white text-decoration-none">
                        Vezi toate <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-warning h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle bg-white bg-opacity-25 p-3 me-3">
                        <i class="fas fa-clock fa-2x text-dark"></i>
                    </div>
                    <div>
                        <h6 class="card-title mb-0">Rezervari in asteptare</h6>
                        <h2 class="mt-2 mb-0">{{ $pending }}</h2>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 text-end">
                    <a href="/rezervari" class="text-dark text-decoration-none">
                        Vezi toate <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-danger text-white h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle bg-white bg-opacity-25 p-3 me-3">
                        <i class="fas fa-times-circle fa-2x text-white"></i>
                    </div>
                    <div>
                        <h6 class="card-title mb-0">Rezervari anulate</h6>
                        <h2 class="mt-2 mb-0">{{ $cancelled }}</h2>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 text-end">
                    <a href="/rezervari" class="text-white text-decoration-none">
                        Vezi toate <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Zona principală cu rezervări + grafice -->
    <div class="row align-items-stretch">
        <!-- Coloana stânga -->
        <div class="col-lg-8 d-flex flex-column">
            <div class="card flex-fill mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-calendar-check me-2"></i> Rezervari recente</h5>
                    <a href="/rezervari" class="btn btn-sm btn-primary">Vezi toate</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Client</th>
                                <th>Serviciu</th>
                                <th>Timp</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(App\Models\Reservation::latest()->take(22)->get() as $res)
                                <tr>
                                    <td>{{ $res->client_name }}</td>
                                    <td>{{ $res->service }}</td>
                                    <td>{{ \Carbon\Carbon::parse($res->time)->format('M d, Y g:i A') }}</td>
                                    <td>
                                            <span class="badge bg-{{ $res->status === 'confirmed' ? 'success' : ($res->status === 'pending' ? 'warning' : 'danger') }}">
                                                {{ ucfirst($res->status) }}
                                            </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Coloana dreapta -->
        <div class="col-lg-4 d-flex flex-column">
            <!-- Venit Total -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-dollar-sign me-2"></i>Venit Total</h5>
                </div>
                <div class="card-body text-center">
                    <div class="display-4 fw-bold text-success mb-3">
                        {{ number_format($revenue, 2, ',', '.') }} lei
                    </div>
                    <p class="text-muted">Din Rezervari Confirmate</p>
                </div>
            </div>

            <!-- Grafic rezervari confirmate -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>Grafic Rezervari confirmate</h5>
                </div>
                <div class="card-body">
                    <canvas id="chart" height="200"></canvas>
                </div>
            </div>

            <!-- Grafic venit zilnic -->
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Venit zilnic (luna curentă)</h5>
                </div>
                <div class="card-body">
                    <canvas id="revenueChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Grafic rezervări confirmate -->
    <script>
        const ctx = document.getElementById('chart');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode(array_keys($chartData->toArray())) !!},
                datasets: [{
                    label: 'Rezervări confirmate',
                    data: {!! json_encode(array_values($chartData->toArray())) !!},
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- Grafic venit zilnic -->
    <script>
        const ctxRevenue = document.getElementById('revenueChart');
        new Chart(ctxRevenue, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($monthlyRevenueData->toArray())) !!},
                datasets: [{
                    label: 'Venit (lei)',
                    data: {!! json_encode(array_values($monthlyRevenueData->toArray())) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + ' lei';
                            }
                        }
                    },
                    x: {
                        ticks: {
                            maxRotation: 90,
                            minRotation: 45
                        }
                    }
                }
            }
        });
    </script>
</div>
