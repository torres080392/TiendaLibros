<?php

namespace App\Http\Livewire;

use App\Models\Editorial;
use Livewire\Component;
use Livewire\WithPagination;

class EditorialLivewire extends Component
{
    use WithPagination;
    public $nombre='';
    public $pais ='';
    public $actulizando;

    public function createEditorial()
    {
        Editorial::create([
            'nombre' => $this->nombre,
            'pais' => $this->pais,
        ]);

        session()->flash('message', 'Editorial creada exitosamente.');

        $this->resetForm();
        $this->emit('editorialCreado'); // Emite un evento de Livewire para indicar que se ha creado un autor
    }

    private function resetForm()//reset al formulario 
    {
        $this->reset([
            'nombre',
            'pais',
        ]);
    }
    public function deleteEditorial($id)
    {
        Editorial::destroy($id);
        session()->flash('message', 'Editorial eliminada exitosamente.');
    }

    public function edit($id)
    {
        $Editorial = Editorial::find($id);
        $this->id = $Editorial->id;
        $this->nombre = $Editorial->nombre;
        $this->pais = $Editorial->pais;
        $this->actulizando = true; // Cambia a modo actualización
        session()->flash('message', 'Datos de la editorial a actualizar '.''.$this->nombre.''.'con el identificador'.'#'.''.$this->id);
    }

    public function update($id)
    {
        // Actualizar los demás campos del Editorial}
        $editorial = Editorial::find($id);
        $editorial->nombre = $this->nombre;
        $editorial->pais = $this->pais;
        $editorial->save();
        $this->resetForm();
        session()->flash('message', 'Editorial actualizada exitoxamente.');
    }



    public function render()
    {
        $totalEditoriales = Editorial::count();  // Obtener la cantidad total de autores
        $editoriales = Editorial::simplePaginate(5);//Paginar los resultados
        return view('livewire.editorial-livewire',compact('editoriales','totalEditoriales'));
    }
}
