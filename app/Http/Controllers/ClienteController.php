<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate(15);
        return    view('clientes.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $validatedData = $request->validate([
            'Nombres' => 'required|max:255',
            'Apellidos' => 'required|max:255',
        ]);
        // dd($request->get('FechaNacimiento'));


        $cliente = new Cliente();

        $cliente->ci=$request->get('ci');
        $cliente->Nombres=$request->get('Nombres');

        $cliente->Apellidos=$request->get('Apellidos');
        $cliente->NroCelular=$request->get('NroCelular');
        $cliente->CorreoElectronico=$request->get('CorreoElectronico');

//        $cliente->FechaNacimiento=$request->get('FechaNacimiento');
//        //$cliente->FechaNacimiento=date("Y-m-d", strtotime($request->get("FechaNacimiento")));
//        //date("Y-m-d", strtotime($request->input("date")))


        $cliente->FechaRegistro=Carbon::now();

        $cliente->save();

        return redirect('clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {


        return view('clientes.edit',[ 'cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente = Cliente::find( $cliente->IdCliente);
        $cliente->ci = $request->get('ci');
        $cliente->Nombres = $request->get('Nombres');
        $cliente->Apellidos = $request->get('Apellidos');
        $cliente->NroCelular = $request->get('NroCelular');
        $cliente->CorreoElectronico = $request->get('CorreoElectronico');


        if($cliente->save())
        {
            return redirect('clientes')->withStatus(__('Profile successfully updated.'));
//            return redirect('clientes')->with("editado","La Cliente ha sido actualizada correctamente");
        }
        return redirect('clientes')->withInput()->with("editado_error","La Categoría seleccioinada no pudo editarse, intentenlo nuevamente porfavor");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
