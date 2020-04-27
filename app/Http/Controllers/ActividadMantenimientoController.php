<?php

namespace App\Http\Controllers;

use App\Models\ActividadMantenimiento;
use Illuminate\Http\Request;

class ActividadMantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actiivdades_mantenimiento = ActividadMantenimiento::paginate(15);
        return    view('actividadesmantenimiento.index', ['actividadesMantenimiento' => $actiivdades_mantenimiento]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actividadesmantenimiento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'NombreActividad' => 'required|unique:ActividadesMantenimiento|max:255'
        ]);

        $actividad = new ActividadMantenimiento();
        $actividad->NombreActividad=$request->get('NombreActividad');


        $actividad->save();


        return redirect('actividadesmantenimiento');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActividadMantenimiento  $actividadMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function show(ActividadMantenimiento $actividadMantenimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActividadMantenimiento  $actividadMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(ActividadMantenimiento $actividadMantenimiento)
    {
        return view('actividadesmantenimiento.edit',[ 'actividadMantenimiento' => $actividadMantenimiento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActividadMantenimiento  $actividadMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActividadMantenimiento $actividadMantenimiento)
    {
        $actividadMantenimiento = Categoria::find( $actividadMantenimiento->IdCategoria);

        $actividadMantenimiento->NombreActividad = $request->get('NombreActividad');


        if($actividadMantenimiento->save())
        {
            return redirect('actividadesmantenimiento')->withStatus(__('Los datos de la actividad de mantenimiento fueron actualizados correctamente.'));

        }
        return redirect('actividadesmantenimiento')->withErrors(['update_error', 'La Actualizacion no fue posible, contacte son administrador']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActividadMantenimiento  $actividadMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActividadMantenimiento $actividadMantenimiento)
    {
        $actividadMantenimiento = ActividadMantenimiento::find( $actividadMantenimiento->IdCategoria);


        if($actividadMantenimiento->delete())
        {
            //->withStatus(__('Profile successfully updated.'));
            return redirect('actividadesmantenimiento')->withStatus("El elemento " . $actividadMantenimiento->NombreActividad. ", ha sido eleminado correctamente");
        }
        return redirect('actividadesmantenimiento')->withInput()->with("eliminar_error","la actividad de mantenimiento seleccioinado no pudo eliminarse, probablemente tiene registros que dependen de la misma");
    }
}
