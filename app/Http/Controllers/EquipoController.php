<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::getEquipos();
        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        return view('equipos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_equipo' => 'required|string|max:100',
            'marca_modelo' => 'required|string|max:150',
            'problema_reportado' => 'required|string',
            'nombre_cliente' => 'required|string|max:100',
            'telefono' => 'required|string|max:15',
            'estado' => 'required|in:recibido,diagnosticando,reparando,listo,entregado'
        ], [
            'tipo_equipo.required' => 'El tipo de equipo es obligatorio',
            'marca_modelo.required' => 'La marca/modelo es obligatoria',
            'problema_reportado.required' => 'El problema reportado es obligatorio',
            'nombre_cliente.required' => 'El nombre del cliente es obligatorio',
            'telefono.required' => 'El teléfono es obligatorio',
            'estado.required' => 'El estado es obligatorio',
        ]);

        Equipo::createEquipo($request->all());

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo registrado exitosamente');
    }

    public function edit(Equipo $equipo)
    {
        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'tipo_equipo' => 'required|string|max:100',
            'marca_modelo' => 'required|string|max:150',
            'problema_reportado' => 'required|string',
            'nombre_cliente' => 'required|string|max:100',
            'telefono' => 'required|string|max:15',
            'estado' => 'required|in:recibido,diagnosticando,reparando,listo,entregado'
        ], [
            'tipo_equipo.required' => 'El tipo de equipo es obligatorio',
            'marca_modelo.required' => 'La marca/modelo es obligatoria',
            'problema_reportado.required' => 'El problema reportado es obligatorio',
            'nombre_cliente.required' => 'El nombre del cliente es obligatorio',
            'telefono.required' => 'El teléfono es obligatorio',
            'estado.required' => 'El estado es obligatorio',
        ]);

        $equipo->updateEquipo($request->all());

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo actualizado exitosamente');
    }

    public function destroy(Equipo $equipo)
    {
        Equipo::deleteEquipo($equipo);

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo eliminado exitosamente');
    }
}
