<div class="container mx-auto p-6">
    <div class="row">
        <div class="form-group col-md-10">
            <label for="search">Buscar</label>
            <div class="flex justify-end"> <!-- Alinea el contenido a la derecha -->
                <input wire:model="search" wire:keyup="searchProduct" type="text"
                    class="border-b border-gray-300 rounded-t-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 w-full py-2 px-4 text-sm focus:outline-none"
                    placeholder="Ingresa el nombre del libro a buscar">
            </div>
            @if ($showlist)
                <div class="mt-3">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Id
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    titulo
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">
                                    Descripción
                                </th>

                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    precio
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Stock
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    imagen
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($results))
                                @foreach ($results as $result)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">
                                            {{ $result->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">
                                            {{ $result->titulo }}
                                        </td>
                                        <td class="border px-4 py-2">{{ $result->descripcion }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ $result->precio }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ $result->stock }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <img src="{{ asset($result->imagen) }}" alt="{{ $result->nombre }}"
                                                class="w-24 h-auto">
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
