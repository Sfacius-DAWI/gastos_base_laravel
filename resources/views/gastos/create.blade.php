@extends('layouts.app')

@section('title', 'Agregar Gasto')

@section('content')
    <h1>Agregar Nuevo Gasto</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gastos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total (€)</label>
            <input type="number" step="0.01" id="total" name="total" class="form-control" value="{{ old('total') }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_registro" class="form-label">Fecha</label>
            <input type="date" id="fecha_registro" name="fecha_registro" class="form-control" value="{{ old('fecha_registro') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('gastos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
