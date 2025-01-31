<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Gastos
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-between mb-4">
                    <h1 class="text-2xl font-bold">Gastos</h1>
                    <a href="{{ route('gastos.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Agregar Gasto
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300 bg-white">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2">Título</th>
                                <th class="border border-gray-300 px-4 py-2">Descripción</th>
                                <th class="border border-gray-300 px-4 py-2">Total (€)</th>
                                <th class="border border-gray-300 px-4 py-2">Fecha</th>
                                <th class="border border-gray-300 px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($gastos as $gasto)
                                <tr class="text-center">
                                    <td class="border border-gray-300 px-4 py-2">{{ $gasto->titulo }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $gasto->descripcion ?? 'N/A' }}</td>
                                    <td class="border border-gray-300 px-4 py-2 font-semibold text-green-600">
                                        {{ number_format($gasto->total, 2) }} €
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $gasto->fecha_registro }}</td>
                                    <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2">
                                        <a href="{{ route('gastos.edit', $gasto->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                                            Editar
                                        </a>
                                        <form action="{{ route('gastos.destroy', $gasto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-gray-600">No hay gastos registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
