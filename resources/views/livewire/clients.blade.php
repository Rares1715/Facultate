<div>
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="mb-0">
                <i class="fas fa-users me-2"></i> Clients
            </h1>
            <p class="text-muted">Lista clienti unici</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                    <tr>
                        <th>Nume</th>
                        <th>Ultima Vizita</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td>{{ $client->client_name }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($client->last_visit)->format('M d, Y') }}<br>
                                <small class="text-muted">
                                    {{ \Carbon\Carbon::parse($client->last_visit)->diffForHumans() }}
                                </small>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted py-4">Nu mai ai clienti :(</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-white">
                {{ $clients->links() }}
            </div>
        </div>
    </div>
</div>
