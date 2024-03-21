<div class="container mx-auto p-6">

    <!-- Formulario para crear autor -->
    <h2 class="text-2xl font-bold mb-4">Crear Editorial</h2>

    <form wire:submit.prevent="createEditorial" class="space-y-4">
        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
            <input wire:model="nombre" type="text" id="nombre" name="nombre" class="form-input" required>
            @error('nombre') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="pais" class="block text-sm font-medium text-gray-700">Pais:</label>
            <input wire:model="pais" type="text" id="pais" name="pais" class="form-input" required>
            @error('pais') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
     
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Guardar</button>
    </form>
    <div>
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif
    </div>
    <!-- Tabla de autores creados -->
    <div class="mt-8">
        <h2 class="text-2xl font-bold mb-4">Listado de editoriales</h2>
        
        <p class="mb-4">Total de editoriales en el sistema: {{ $totalEditoriales }}</p>

        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Pais</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($editoriales as $editorial)
                    <tr>
                        <td class="border px-4 py-2">{{ $editorial->id }}</td>
                        <td class="border px-4 py-2">{{ $editorial->nombre }}</td>
                        <td class="border px-4 py-2">{{ $editorial->pais }}</td>
                
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $editorial->id }})"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600">Editar</button>
                            
                            <button wire:click="update({{ $editorial->id }})"
                                class="px-4 py-2 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600">Actualizar</button>
                            
                            <button wire:click="deleteEditorial({{ $editorial->id }})"
                                class="px-4 py-2 bg-red-500 text-white rounded-md shadow-md hover:bg-red-600">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $editoriales->onEachSide(5)->links() }}
        </div>
    </div>
</div>
