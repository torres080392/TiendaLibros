<?php

namespace App\Http\Livewire;

use App\Models\Autor;
use Livewire\Component;
use Livewire\WithPagination;

class AutorLivewire extends Component
{
    use WithPagination;
    public $nombre = '';
    public $nacionalidad = '';
    public $biografia = '';
    public $actulizando;
    public $autor;

    public function createAuthor()
    {
        Autor::create([
            'nombre' => $this->nombre,
            'nacionalidad' => $this->nacionalidad,
            'biografia' => $this->biografia
        ]);

        session()->flash('message', 'Autor creado exitosamente.');

        $this->resetForm();
        $this->emit('autorCreado'); // Emite un evento de Livewire para indicar que se ha creado un autor
    }

    public function deleteAutor($id)
    {
        Autor::destroy($id);
        session()->flash('message', 'Autor eliminado exitosamente.');
    }

    private function resetForm()
    {
        $this->reset([
            'nombre',
            'nacionalidad',
            'biografia',
        ]);
    }
    public function edit($id)
    {
        $Autor = Autor::find($id);
        $this->nombre = $Autor->nombre;
        $this->nacionalidad= $Autor->nacionalidad;
        $this->biografia = $Autor->biografia;
        

        $this->actulizando = true; // Cambia a modo actualización
        session()->flash('message', 'Realice los cambios y oprima la opcion de actualizar.');
    }

    public function update($id)
    {
        // Actualizar los demás campos del Autor}
        $autor = Autor::find($id);
        $autor->nombre = $this->nombre;
        $autor->nacionalidad = $this->nacionalidad;
        $autor->biografia = $this->biografia;
        $autor->save();
        $this->resetForm();
        session()->flash('message', 'Autor actualizado exitoxamente.');
    }


    public function render()
    {
        $totalAutores = Autor::count();  // Obtener la cantidad total de autores
        $autores = Autor::simplePaginate(5);//Paginar los resultados
        return view('livewire.autor-livewire', compact('autores','totalAutores'));
    }
}

