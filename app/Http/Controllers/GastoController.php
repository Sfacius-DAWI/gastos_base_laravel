<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    // 1. Listar todos los gastos
    public function index()
    {
        $gastos = Gasto::all();
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
            'titulo' => 'required|max:255',
            'descripcion' => 'nullable|max:500',
            'total' => 'required|numeric|min:0',
            'fecha_registro' => 'required|date',
        ]);

        Gasto::create($request->all());

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
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'nullable|max:500',
            'total' => 'required|numeric|min:0',
            'fecha_registro' => 'required|date',
        ]);

        $gasto->update($request->all());

        return redirect()->route('gastos.index')->with('success', 'Gasto actualizado correctamente.');
    }

    // 6. Eliminar un gasto
    public function destroy(Gasto $gasto)
    {
        $gasto->delete();
        return redirect()->route('gastos.index')->with('success', 'Gasto eliminado.');
    }
}