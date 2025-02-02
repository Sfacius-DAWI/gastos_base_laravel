<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GastoController extends Controller
{
    use AuthorizesRequests;
    // 1. Listar todos los gastos
    public function index()
{
    $gastos = auth()->user()->gastos()->latest()->paginate(10);
    return view('gastos.index', compact('gastos'));
}

    // 2. Mostrar formulario de creación
    public function create()
    {
        return view('gastos.create');
    }

    // 3. Guardar un nuevo gasto en la BD
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'total' => 'required|numeric',
            'fecha' => 'required|date',
        ]);
    
        auth()->user()->gastos()->create(
            $request->only(['titulo', 'descripcion', 'total', 'fecha'])
        );
    
        return redirect()->route('gastos.index')->with('success', 'Gasto creado correctamente.');
    }
    
    // 4. Mostrar formulario de edición
    public function edit(Gasto $gasto)
    {
        return view('gastos.edit', compact('gasto'));
    }
    

    // 5. Actualizar un gasto en la BD
    public function update(Request $request, Gasto $gasto)
{
    $this->authorize('update', $gasto); // Solo el dueño del gasto puede editarlo

    $request->validate([
        'titulo' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'total' => 'required|numeric',
        'fecha' => 'required|date',
    ]);

    $gasto->update($request->all());

    return redirect()->route('gastos.index')->with('success', 'Gasto actualizado correctamente.');
}


    // 6. Eliminar un gasto
    public function destroy(Gasto $gasto)
{
    $this->authorize('delete', $gasto); // Solo el dueño del gasto puede eliminarlo

    $gasto->delete();

    return redirect()->route('gastos.index')->with('success', 'Gasto eliminado correctamente.');
}
}