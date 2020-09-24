<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Vehiculo = Vehiculo::paginate(15);
        return    view('Vehiculos.index', ['Vehiculos' => $Vehiculo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Vehiculos.create');
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
            'NombreVehiculo' => 'required|unique:Vehiculos|max:255'
        ]);

        $Vehiculo = new Vehiculo();
        $Vehiculo->NombreVehiculo=$request->get('NombreVehiculo');


        $Vehiculo->save();


        return redirect('Vehiculos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehiculo  $Vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $Vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehiculo  $Vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculo $Vehiculo)
    {
        return view('Vehiculos.edit',[ 'Vehiculo' => $Vehiculo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehiculo  $Vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculo $Vehiculo)
    {

        $Vehiculo = Vehiculo::find( $Vehiculo->IdVehiculo);

        $Vehiculo->NombreVehiculo = $request->get('NombreVehiculo');


        if($Vehiculo->save())
        {
            return redirect('Vehiculos')->withStatus(__('Los datos de la Vehiculo fueron actualizados correctamente.'));

        }
        return redirect('Vehiculos')->withErrors(['update_error', 'La Actualizacion no fue posible, contacte son administrador']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehiculo  $Vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $Vehiculo)
    {
        $Vehiculo = Vehiculo::find( $Vehiculo->IdVehiculo);


        if($Vehiculo->delete())
        {
            //->withStatus(__('Profile successfully updated.'));
            return redirect('Vehiculos')->withStatus("El elemento " . $Vehiculo->NombreVehiculo. ", ha sido eleminado correctamente");
        }
        return redirect('Vehiculos')->withInput()->with("eliminar_error","la Vehiculo seleccioinado no pudo eliminarse, probablemente tiene registros que dependen de la misma");
    }

    public function insertar(Request $request)
    {
//        $validatedData = $request->validate([
//            'NroPlaca' => 'required|unique:NroPlaca|max:255'
//        ]);

        $Vehiculo = new Vehiculo();
        $Vehiculo->NroPlaca=$request->get('NroPlaca');
        $Vehiculo->km=$request->get('km');
        $Vehiculo->Marca=$request->get('Marca');
        $Vehiculo->Modelo=$request->get('Modelo');
        $Vehiculo->Color=$request->get('Color');
        //$Vehiculo->IdCliente=$request->get('IdCliente');
        $Vehiculo->IdCliente= 6;
        $Vehiculo->FechaRegistro = \Carbon\Carbon::now();


        $Vehiculo->save();


        return redirect()->route('clientes.index')->with("status","La se ha registrado correctamente el vehículo");;
    }
}
