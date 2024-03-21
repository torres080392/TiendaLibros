  <!-- Tabla de libros creados -->
  @vite(['resources/css/formLibros.css']);
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  @include('layouts.menu')
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

                        <a href="{{ route('libro-index', ['id' => $libro->id]) }}" class="px-4 py-2 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600">
                            Modificar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $libros->onEachSide(6)->links() }}
    </div>
</div>
@include('layouts.footer')