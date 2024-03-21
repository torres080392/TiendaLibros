<div class="container mx-auto p-6">
    <div>
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif
    </div>
    <p class="mb-4">Total de libros en el sistema: {{ $libroTotal }}</p>
    <!-- Formulario para crear libro -->
    <h2 class="text-2xl font-bold mb-4">Crear Libro</h2>

    <form wire:submit.prevent="createLibro" enctype="multipart/form-data" class="space-y-6">
        <div>
            <label for="titulo" class="block text-sm font-medium text-gray-700">Título:</label>
            <input wire:model="titulo" type="text" id="titulo" name="titulo" class="form-input" required>
            @error('titulo') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción:</label>
            <textarea wire:model="descripcion" id="descripcion" name="descripcion" rows="3" class="form-textarea" required></textarea>
            @error('descripcion') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen:</label>
            <input wire:model='imagen' type="file" id="imagen" name="imagen" accept="image/*" class="form-input" required>
            @error('imagen') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="precio" class="block text-sm font-medium text-gray-700">Precio:</label>
            <input wire:model="precio" type="number" id="precio" name="precio" class="form-input" required>
            @error('precio') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="stock" class="block text-sm font-medium text-gray-700">Stock:</label>
            <input wire:model.lazy="stock" type="number" id="stock" name="stock" class="form-input" required>
            @error('stock') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="editorial" class="block text-sm font-medium text-gray-700">Editorial:</label>
            <select wire:model="editorial_id" id="editorial" name="editorial" class="form-select" required>
                <option value="">Seleccionar editorial</option>
                @foreach ($editoriales as $editorial)
                    <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>
                @endforeach
            </select>
            @error('editorial_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="autor" class="block text-sm font-medium text-gray-700">Autor:</label>
            <select wire:model="autor_id" id="autor" name="autor" class="form-select" required>
                <option value="">Seleccionar autor</option>
                @foreach ($autores as $autor)
                    <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
                @endforeach
            </select>
            @error('autor_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Crear
            </button>
        </div>
        
    </form>
 

    <!-- Tabla de libros creados -->
    <div class="mt-6">
        <h2 class="text-2xl font-bold mb-4">Listado de libros</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Titulo</th>
                        <th class="px-4 py-2">Descripción</th>
                        <th class="px-4 py-2">Imagen</th>
                        <th class="px-4 py-2">Precio</th>
                        <th class="px-4 py-2">Stock</th>
                        <th class="px-4 py-2">Editorial</th>
                        <th class="px-4 py-2">Autor</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($libros as $libro)
                    <tr>
                        <td class="border px-4 py-2">{{ $libro->id }}</td>
                        <td class="border px-4 py-2">{{ $libro->titulo }}</td>
                        <td class="border px-4 py-2">{{ $libro->descripcion }}</td>
                        <td class="border px-4 py-2">
                            <div class="relative">
                                <img src="{{ asset($libro->imagen) }}" alt="{{ $libro->titulo }}" class="w-24 h-auto transition-transform duration-300 transform hover:scale-125">
                                <div class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 opacity-0 transition-opacity duration-300 hover:opacity-100">
                                    <i class="fas fa-search-plus text-white text-2xl"></i>
                                </div>
                            </div>
                        </td>
                        
                        <td class="border px-4 py-2">{{ $libro->precio }}</td>
                        <td class="border px-4 py-2">{{ $libro->stock }}</td>
                        <td class="border px-4 py-2">{{ $libro->editorial ? $libro->editorial->nombre : 'N/A' }}</td> 
                        <td class="border px-4 py-2">{{ $libro->autor ? $libro->autor->nombre : 'N/A' }}</td>
                        <td class="border px-4 py-2">

                            <button wire:click="edit({{ $libro->id }})"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600">Editar</button>
                            <button wire:click="update({{ $libro->id }})"
                                class="px-4 py-2 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600">Actualizar</button>
                            <button wire:click="deleteAutor({{ $libro->id }})"
                                class="px-4 py-2 bg-red-500 text-white rounded-md shadow-md hover:bg-red-600">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $libros->onEachSide(3)->links() }}
        </div>
    </div>
</div>


