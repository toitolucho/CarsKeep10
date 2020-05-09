<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = Categoria::paginate(15);
        return    view('categorias.index', ['categorias' => $categoria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
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
            'NombreCategoria' => 'required|unique:categorias|max:255'
        ]);

        $categoria = new Categoria();
        $categoria->NombreCategoria=$request->get('NombreCategoria');


        $categoria->save();


        return redirect('categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit',[ 'categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {

        $categoria = Categoria::find( $categoria->IdCategoria);

        $categoria->NombreCategoria = $request->get('NombreCategoria');


        if($categoria->save())
        {
            return redirect('categorias')->withStatus(__('Los datos de la categoria fueron actualizados correctamente.'));

        }
        return redirect('categorias')->withErrors(['update_error', 'La Actualizacion no fue posible, contacte son administrador']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria = Categoria::find( $categoria->IdCategoria);


        if($categoria->delete())
        {
            //->withStatus(__('Profile successfully updated.'));
            return redirect('categorias')->withStatus("El elemento " . $categoria->NombreCategoria. ", ha sido eleminado correctamente");
        }
        return redirect('categorias')->withInput()->with("eliminar_error","la categoria seleccioinado no pudo eliminarse, probablemente tiene registros que dependen de la misma");
    }
}
