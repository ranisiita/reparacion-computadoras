@extends('layouts.app')

@section('contenido')
    <h2>Lista de Equipos</h2>

    @if($equipos->isEmpty())
        <p class="alert alert-info">No hay equipos registrados.</p>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Equipo</th>
                <th>Marca</th>
                <th>Cliente</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->id }}</td>
                    <td>{{ $equipo->tipo_equipo }}</td>
                    <td>{{ $equipo->marca_modelo }}</td>
                    <td>{{ $equipo->nombre_cliente }}</td>
                    <td>{{ $equipo->telefono }}</td>
                    <td>
                        @if($equipo->estado == 'recibido')
                            <span class="badge bg-secondary">Recibido</span>
                        @elseif($equipo->estado == 'diagnosticando')
                            <span class="badge bg-info">Diagnosticando</span>
                        @elseif($equipo->estado == 'reparando')
                            <span class="badge bg-warning">Reparando</span>
                        @elseif($equipo->estado == 'listo')
                            <span class="badge bg-success">Listo</span>
                        @else
                            <span class="badge bg-dark">Entregado</span>
                        @endif
                    </td>
                    <td>{{ $equipo->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('equipos.edit', $equipo) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('equipos.destroy', $equipo) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
