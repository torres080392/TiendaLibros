

<div class="mt-8">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Listado de libros</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach ($libros as $libro)
                <div class="border border-gray-200 p-2 rounded-md shadow-md transition-transform duration-300 transform hover:scale-105">
                    <img src="{{ asset($libro->imagen) }}" alt="{{ $libro->titulo }}" class="w-full h-auto sm:h-40 md:h-48 lg:h-56 xl:h-64 mb-2 object-cover">
                    <h3 class="text-lg font-semibold mb-1">{{ $libro->titulo }}</h3>
                    <p class="text-gray-700 text-sm mb-1">{{ $libro->descripcion }}</p>
                    <p class="text-gray-700 text-sm mb-1">Precio: ${{ $libro->precio }}</p>
                    <p class="text-gray-700 text-sm mb-1">Stock: {{ $libro->stock }}</p>
                    <p class="text-gray-700 text-sm mb-1">Editorial: {{ $libro->editorial ? $libro->editorial->nombre : 'N/A' }}</p>
                    <p class="text-gray-700 text-sm mb-2">Autor: {{ $libro->autor ? $libro->autor->nombre : 'N/A' }}</p>
                    <div class="flex justify-center">
                        <button wire:click="Comprar({{ $libro->id }})" class="bg-green-500 text-white px-3 py-1 rounded-md shadow-md hover:bg-green-600 mr-1">Comprar</button>
                        <button wire:click="PDFAutor({{ $libro->id }})" class="bg-red-500 text-white px-3 py-1 rounded-md shadow-md hover:bg-red-600">PDF</button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $libros->onEachSide(8)->links() }}
        </div>
    </div>
</div>

