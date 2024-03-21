<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;
use Livewire\WithPagination;


class InicioLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        $libros = Libro::simplePaginate(8);
        return view('livewire.inicio-livewire',compact('libros'));
    }
}
