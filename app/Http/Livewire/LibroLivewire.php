<?php

namespace App\Http\Livewire;

use App\Models\Autor;
use App\Models\Editorial;
use App\Models\Libro;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class LibroLivewire extends Component

{
    use WithFileUploads;
    use WithPagination;
    public $editorial_id = '';
    public $autor_id = '';
    public $usuario_id = '';
    public $titulo = '';
    public $descripcion = '';
    public $precio = '';
    public $stock = '';
    public $mensaje = '';
    public $imagen;
    public $actualizando;

    public function createLibro()
    {
        // Guardar la imagen y obtener la ruta
        $imagenPath = $this->imagen->store('public/images');
        $imagenUrl = asset('storage/' . str_replace('public/', '', $imagenPath));

        // Crear el producto con los datos validados y la URL de la imagen
        Libro::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'imagen' => $imagenUrl,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'editorial_id' => $this->editorial_id,
            'autor_id' => $this->autor_id,
           
        ]);

        $this->resetForm();
        session()->flash('message', 'Libro creado exitoxamente.');
    }
    private function resetForm()
    {
        $this->reset([
            'titulo',
            'descripcion',
            'precio',
            'stock',
            'autor_id',
            'imagen',
            'editorial_id',
        ]);
    }

    public function edit($id)
    {
        $libro= Libro::find($id);
        $this->titulo = $libro->titulo;
        $this->descripcion = $libro->descripcion;
        $this->imagen = $libro->imagen;
        $this->precio = $libro->precio;
        $this->stock = $libro->stock;
        $this->editorial_id = $libro->editorial_id;
        $this->autor_id = $libro->autor_id;

        $this->actualizando = true; // Cambia a modo actualización
        session()->flash('message', 'Realice los cambios y oprima la opcion de actualizar.');
    }

    public function update($id)
    {
        $libro = Libro::findOrFail($id);
        // Si se ha subido una nueva imagen, se guarda y se actualiza la URL de la imagen
        if ($this->imagen) {
            $imagenPath = $this->imagen->store('public/images');
            $libro->imagen = asset('storage/' . str_replace('public/', '', $imagenPath));
        }

        // Actualizar los demás campos del producto
        $libro->titulo = $this->titulo;
        $libro->descripcion = $this->descripcion;
        $libro->precio = $this->precio;
        $libro->stock = $this->stock;
        $libro->editorial_id = $this->editorial_id;
        $libro->autor_id = $this->autor_id;
        $libro->save();
        $this->resetForm();
        session()->flash('message', 'Libro actualizado exitoxamente.');
    }




    public function render()
    {
        $libroTotal = Libro::count();
        $libros = Libro::simplePaginate(3);
        $editoriales = Editorial::all();
        $autores = Autor::all();
        return view('livewire.libro-livewire',compact('libros','editoriales','autores','libroTotal'));
    }
}
