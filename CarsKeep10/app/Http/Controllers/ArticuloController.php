<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

use App\Models\Categoria;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::with('categoria')-> paginate(15);
        return    view('articulos.index', ['articulos' => $articulos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.create');
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
            'NombreArticulo' => 'required|unique:articulos|max:200'
        ]);

        $articulo = new Articulo();
        $articulo->NombreArticulo=$request->get('NombreArticulo');
        $articulo->IdCategoria=$request->get('IdCategoria');
        $articulo->CantidadExistencia=$request->get('CantidadExistencia');
        $articulo->PrecioVigente=$request->get('PrecioVigente');
        $articulo->TipoInventario=$request->get('TipoInventario');
        $articulo->Descripcion=$request->get('Descripcion');


        $articulo->save();


        return redirect('articulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        return view('articulos.edit',[ 'articulo' => $articulo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {

        //dd($request->all());
        $articulo = Articulo::find( $articulo->IdArticulo);

        $articulo->NombreArticulo = $request->get('NombreArticulo');
        $articulo->IdCategoria = $request->get('IdCategoria');
        $articulo->CantidadExistencia = $request->get('CantidadExistencia');
        $articulo->PrecioVigente = $request->get('PrecioVigente');
        $articulo->TipoInventario = $request->get('TipoInventario');
        $articulo->Descripcion = $request->get('Descripcion');


        if($articulo->save())
        {
            return redirect('articulos')->withStatus(__('Los datos del articulo fueron actualizados correctamente.'));

        }
        return redirect('articulos')->withErrors(['update_error', 'La Actualizacion no fue posible, contacte son administrador']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $articulo = Articulo::find( $articulo->IdArticulo);


        if($articulo->delete())
        {
            //->withStatus(__('Profile successfully updated.'));
            return redirect('articulos')->withStatus("El elemento " . $articulo->NombreArticulo. ", ha sido eleminado correctamente");
        }
        return redirect('articulos')->withInput()->with("eliminar_error","el articulo seleccioinado no pudo eliminarse, probablemente tiene registros que dependen de la misma");
    }
}
