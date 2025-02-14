<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Gasto
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 p-4 text-red-700 bg-red-100 rounded-lg">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('gastos.update', $gasto->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="titulo" class="block font-semibold text-gray-700">Título</label>
                        <input type="text" id="titulo" name="titulo" class="w-full p-2 border rounded-lg"
                               value="{{ old('titulo', $gasto->titulo) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="block font-semibold text-gray-700">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="w-full p-2 border rounded-lg">{{ old('descripcion', $gasto->descripcion) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="total" class="block font-semibold text-gray-700">Total (€)</label>
                        <input type="number" step="0.01" id="total" name="total" class="w-full p-2 border rounded-lg"
                               value="{{ old('total', $gasto->total) }}" required>
                    </div>

                    <div class="mb-4">
    <label for="fecha" class="block font-semibold text-gray-700">Fecha</label>
    <input type="date" id="fecha" name="fecha"
           class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300"
           value="{{ old('fecha', $gasto->fecha ? \Carbon\Carbon::parse($gasto->fecha)->format('Y-m-d') : '') }}"
           required>
</div>
                    
                    <div class="flex justify-between">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Actualizar
                        </button>
                        <a href="{{ route('gastos.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                            Cancelar
                        </a>
                    </div>
                   
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
