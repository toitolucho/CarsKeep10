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
        $actividad->CostoServicio=$request->get('CostoServicio');



        $actividad->save();


        return  redirect()->route('actividadesmantenimientos.index'); //redirect('actividadesmantenimiento');
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
//    public function edit(ActividadMantenimiento $actividadMantenimiento)
    public function edit($id)
    {
        //dd($actividadMantenimiento->IdActividad);
        $actividadMantenimiento = ActividadMantenimiento::find( $id);
        return view('actividadesmantenimiento.edit',[ 'actividadMantenimiento' => $actividadMantenimiento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActividadMantenimiento  $actividadMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd( $id);
        $actividadMantenimiento = ActividadMantenimiento ::find( $id);

        $actividadMantenimiento->NombreActividad = $request->get('NombreActividad');
        $actividadMantenimiento->CostoServicio = $request->get('CostoServicio');



        if($actividadMantenimiento->save())
        {
            return  redirect()->route('actividadesmantenimientos.index')->withStatus(__('Los datos de la actividad de mantenimiento fueron actualizados correctamente.'));

        }
        return  redirect()->route('actividadesmantenimientos.index')->withErrors(['update_error', 'La Actualizacion no fue posible, contacte son administrador']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActividadMantenimiento  $actividadMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividadMantenimiento = ActividadMantenimiento::find( $id);


        if($actividadMantenimiento->delete())
        {
            //->withStatus(__('Profile successfully updated.'));
            return redirect()->route('actividadesmantenimientos.index')->withStatus("El elemento " . $actividadMantenimiento->NombreActividad. ", ha sido eleminado correctamente");
        }
        return redirect()->route('actividadesmantenimientos.index')->withInput()->with("eliminar_error","la actividad de mantenimiento seleccioinado no pudo eliminarse, probablemente tiene registros que dependen de la misma");
    }
}
