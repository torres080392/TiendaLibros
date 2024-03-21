<div class="container mx-auto p-8">

    <!-- Formulario para crear autor -->
    <h2 class="text-2xl font-bold mb-4">Crear Autor</h2>

    <form wire:submit.prevent="createAuthor" class="space-y-4">
        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
            <input wire:model="nombre" type="text" id="nombre" name="nombre" class="form-input" required>
            @error('nombre') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="nacionalidad" class="block text-sm font-medium text-gray-700">Nacionalidad:</label>
            <input wire:model="nacionalidad" type="text" id="nacionalidad" name="nacionalidad" class="form-input" required>
            @error('nacionalidad') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="biografia" class="block text-sm font-medium text-gray-700">Biografía:</label>
            <textarea wire:model="biografia" id="biografia" name="biografia" class="form-input h-32 rounded-md border-gray-300 shadow-sm" required></textarea>
            @error('biografia') <span class="text-red-500">{{ $message }}</span> @enderror
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
    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-4">Listado de autores</h2>
        
        <p class="mb-4">Total de autores en el sistema: {{ $totalAutores }}</p>

        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Nacionalidad</th>
                        <th class="px-4 py-2">Biografía</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($autores as $autor)
                    <tr>
                        <td class="border px-4 py-2">{{ $autor->id }}</td>
                        <td class="border px-4 py-2">{{ $autor->nombre }}</td>
                        <td class="border px-4 py-2">{{ $autor->nacionalidad }}</td>
                        <td class="border px-4 py-2">{{ $autor->biografia }}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $autor->id }})"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600">Editar</button>
                            
                            <button wire:click="update({{ $autor->id }})"
                                class="px-4 py-2 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600">Actualizar</button>
                            
                            <button wire:click="deleteAutor({{ $autor->id }})"
                                class="px-4 py-2 bg-red-500 text-white rounded-md shadow-md hover:bg-red-600">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $autores->onEachSide(5)->links() }}
        </div>
    </div>
</div>



