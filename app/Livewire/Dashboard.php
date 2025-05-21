<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $confirmed;
    public $pending;
    public $cancelled;
    public $revenue;
    public $chartData;
    public $monthlyRevenueData; // ⬅️ nou

    public function mount()
    {
        // Statistici de stare
        $this->confirmed = Reservation::where('status', 'confirmed')->count();
        $this->pending = Reservation::where('status', 'pending')->count();
        $this->cancelled = Reservation::where('status', 'cancelled')->count();
        $this->revenue = Reservation::where('status', 'confirmed')->sum('price');

        // Grafic: rezervări confirmate în ultimele 7 zile
        $data = Reservation::select(DB::raw('DATE(time) as date'), DB::raw('COUNT(*) as total'))
            ->where('time', '>=', Carbon::now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->pluck('total', 'date');

        $this->chartData = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->toDateString();
            $this->chartData[$date] = $data->get($date, 0);
        }

        // Grafic: venit confirmat per zi din luna curentă
        $revenueData = Reservation::select(DB::raw('DATE(time) as date'), DB::raw('SUM(price) as total'))
            ->where('status', 'confirmed')
            ->whereMonth('time', now()->month)
            ->whereYear('time', now()->year)
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->pluck('total', 'date');

        $this->monthlyRevenueData = collect();
        $daysInMonth = now()->daysInMonth;

        for ($i = 1; $i <= $daysInMonth; $i++) {
            $date = now()->startOfMonth()->addDays($i - 1)->toDateString();
            $this->monthlyRevenueData[$date] = $revenueData->get($date, 0);
        }
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
