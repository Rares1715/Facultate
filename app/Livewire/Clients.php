<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class Clients extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap'; // Sau 'tailwind' dacă folosești Tailwind

    public function render()
    {
        $clients = Reservation::select(DB::raw('client_name, MAX(time) as last_visit'))
            ->groupBy('client_name')
            ->orderByDesc(DB::raw('MAX(time)'))
            ->paginate(10);

        return view('livewire.clients', compact('clients'));
    }
}


