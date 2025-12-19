@extends('layouts.app')

@section('contenido')
    <h2>Registrar Nuevo Equipo</h2>

    <form action="{{ route('equipos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Tipo de Equipo</label>
            <input type="text" name="tipo_equipo" class="form-control" value="{{ old('tipo_equipo') }}" required>
            @error('tipo_equipo')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Marca/Modelo</label>
            <input type="text" name="marca_modelo" class="form-control" value="{{ old('marca_modelo') }}" required>
            @error('marca_modelo')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Problema Reportado</label>
            <textarea name="problema_reportado" class="form-control" rows="3" required>{{ old('problema_reportado') }}</textarea>
            @error('problema_reportado')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Nombre del Cliente</label>
            <input type="text" name="nombre_cliente" class="form-control" value="{{ old('nombre_cliente') }}" required>
            @error('nombre_cliente')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" required>
            @error('telefono')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="estado" class="form-control" required>
                <option value="recibido">Recibido</option>
                <option value="diagnosticando">Diagnosticando</option>
                <option value="reparando">Reparando</option>
                <option value="listo">Listo</option>
                <option value="entregado">Entregado</option>
            </select>
            @error('estado')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection 
