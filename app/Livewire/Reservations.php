<?php

namespace App\Livewire;
use Livewire\WithPagination;
use App\Models\Reservation;
use Livewire\Component;


class Reservations extends Component
{
    use WithPagination;
    public $reservation=[];
    public $popup = false;
    protected $paginationTheme = 'bootstrap';
    /**
     * @var mixed|null
     */
    public $search;
    public $status;
    public $sortBy = 'latest';

    public function mount(){

    }
    public function openpop($element){
        if($element=="new"){
            $this->popup=true;

        }else{
            $this->popup=Reservation::where("id",$element)->first();
            $this->reservation=$this->popup->toArray();
        }

    }

    public function save(){
        if($this->popup === true){
            $reservation=new Reservation();
            $reservation->fill($this->reservation);
            $reservation->save();
        } else{
            $reservation = Reservation::where("id",$this->reservation['id'])->first();
            $reservation->fill($this->reservation);
            $reservation->save();
        }
        $this->popup=false;
    }
    public function deletereservation($id){


        $reservation = Reservation::find($id);
        $reservation->delete();
        session()->flash("success", "Rezervarea a fost ștearsă");
    }
    public function closepop(){
        $this->popup=false;
    }
    public function render()
    {
        $rezervari = Reservation::query();

        if ($this->search) {
            $rezervari->where('client_name', 'like', '%' . $this->search . '%');

        }
        if ($this->status) {
            $rezervari->where('status', $this->status);
        }


        switch ($this->sortBy) {
            case 'oldest':
                $rezervari->orderBy('time', 'asc');
                break;
            case 'latest':
            default:
                $rezervari->orderBy('time', 'desc');
                break;
        }
        return view('livewire.reservations', [
            'rezervari' => $rezervari->paginate(7)
        ]);
    }

    public function resetPagination()
    {
        $this->resetPage();
    }
}
