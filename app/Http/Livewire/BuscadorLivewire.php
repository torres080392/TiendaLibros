<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;
use Livewire\WithPagination;

class BuscadorLivewire extends Component
{
    use WithPagination;

    public $search = '';
    public $results = [];
    public $showlist = false;
    public $product;

    public function searchProduct()
    {
        $this->results = Libro::where('titulo', 'like', '%' . $this->search . '%')->get();
        $this->showlist = true;
    }

    public function getProduct($id)
    {
        $this->product = Libro::find($id);
        $this->showlist = false;
    }


    public function resetBusqueda()
    {
        $this->reset([
            'search',

        ]);
    }
    public function render()
    {
        return view('livewire.buscador-livewire');
    }
}
