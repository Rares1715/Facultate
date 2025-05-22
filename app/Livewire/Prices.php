<?php

namespace App\Livewire;

use App\Models\Price;
use Livewire\Component;
use Livewire\WithPagination;

class Prices extends Component
{
    use WithPagination;

    public $service = [];
    public $popup = false;
    public $editing = null;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'service.nume' => 'required|string|max:255',
        'service.price' => 'required|numeric|min:0',
        'service.descriere' => 'nullable|string|max:255',
        'service.durata' => 'nullable|string|max:50',
    ];

    public function openpop($element)
    {
        if ($element === "new") {
            $this->popup = true;
            $this->editing = null;
            $this->service = [];
        } else {
            $this->editing = Price::find($element);
            $this->service = $this->editing->toArray();
            $this->popup = true;
        }
    }

    public function closepop()
    {
        $this->popup = false;
        $this->editing = null;
        $this->service = [];
    }

    public function save()
    {
        $this->validate();

        if ($this->editing === null) {
            $service = new Price();
        } else {
            $service = Price::find($this->editing->id);
        }

        $service->fill($this->service);
        $service->save();

        $this->closepop();
    }
    public function delete($id)
    {
        Price::destroy($id);
    }
    public function render()
    {
        return view('livewire.prices', [
            'prices' => Price::paginate(10),
            'totalServices' => Price::count(),
        ]);
    }
}
