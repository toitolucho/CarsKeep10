<?php

namespace App\Http\Controllers;

use App\Models\TipoMantenimiento;
use Illuminate\Http\Request;

class TipoMantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_mantenimiento = TipoMantenimiento::paginate(15);
        return    view('tiposmantenimiento.index', ['tiposMantenimiento' => $tipos_mantenimiento]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiposmantenimiento.create');
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
            'NombreMantenimiento' => 'required|unique:TiposMantenimientos|max:255'
        ]);

        $obligatorios = $request->input('obligatorio', []);
        $precios = $request->input('precios', []);
        $codigos = $request->input('codigos', []);

       // dd($obligatorios);



        $actividad = TipoMantenimiento::create($request->all());

        //$actividad = new TipoMantenimiento();
        $actividad->NombreMantenimiento=$request->get('NombreMantenimiento');
        $actividad->Descripcion=$request->get('Descripcion');
        $actividad->LimiteInferiorKilometraje=$request->get('LimiteInferiorKilometraje');
        $actividad->LimiteSuperiorKilometraje=$request->get('LimiteSuperiorKilometraje');



        $actividad->save();





        for ($codigo=0; $codigo < count($codigos); $codigo++) {
            if ($codigos[$codigo] != '') {
                $actividad->actividadesmantenimiento()->attach($codigos[$codigo], ['Obligatorio' => ( $obligatorios[$codigo] ? '1' : '0'), 'CostoServicio' => $precios[$codigo]]);

            }
        }


        //return redirect()->route('ingresosarticulos.index')->with("status","Ingreso registrado correctamente");
        return  redirect()->route('tiposmantenimientos.index')->with("status","Mantenimiento registrado correctamente"); //redirect('tiposmantenimiento');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoMantenimiento  $tipoMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoMantenimiento $tipoMantenimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoMantenimiento  $tipoMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $tipoMantenimiento = TipoMantenimiento::find( $id);
        $tipoMantenimiento = TipoMantenimiento::withCount('actividadesmantenimiento')->with('actividadesmantenimiento')->findOrFail($id);
        return view('tiposmantenimiento.edit',[ 'tipoMantenimiento' => $tipoMantenimiento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoMantenimiento  $tipoMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipoMantenimiento = TipoMantenimiento ::find( $id);


        $tipoMantenimiento->NombreMantenimiento=$request->get('NombreMantenimiento');
        $tipoMantenimiento->Descripcion=$request->get('Descripcion');
        $tipoMantenimiento->LimiteInferiorKilometraje=$request->get('LimiteInferiorKilometraje');
        $tipoMantenimiento->LimiteSuperiorKilometraje=$request->get('LimiteSuperiorKilometraje');






        if($tipoMantenimiento->actividadesmantenimiento())
        {
            $tipoMantenimiento->actividadesmantenimiento()->detach();

        }

//        $productos = $request->input('productos', []);
        $obligatorios = $request->input('obligatorio', []);
        $precios = $request->input('precios', []);
        $codigos = $request->input('codigos', []);


        $tipoMantenimiento->update();
        $tipoMantenimiento= $tipoMantenimiento->fresh(['actividadesmantenimiento']);
        $tipoMantenimiento->setRelations([]);





        for ($codigo=0; $codigo < count($codigos); $codigo++) {
            if ($codigos[$codigo] != '') {
                $tipoMantenimiento->actividadesmantenimiento()->attach($codigos[$codigo], ['Obligatorio' => $obligatorios[$codigo], 'CostoServicio' => $precios[$codigo]]);

            }
        }



        if($tipoMantenimiento->save())
        {
            return  redirect()->route('tiposmantenimientos.index')->withStatus(__('Los datos de la actividad de mantenimiento fueron actualizados correctamente.'));

        }
        return  redirect()->route('tiposmantenimientos.index')->withErrors(['update_error', 'La Actualizacion no fue posible, contacte son administrador']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoMantenimiento  $tipoMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoMantenimiento = TipoMantenimiento::find( $id);


        if($tipoMantenimiento->delete())
        {
            //->withStatus(__('Profile successfully updated.'));
            return redirect()->route('tiposmantenimientos.index')->withStatus("El elemento " . $tipoMantenimiento->NombreMantenimiento. ", ha sido eleminado correctamente");
        }
        return redirect()->route('tiposmantenimientos.index')->withInput()->with("eliminar_error","la actividad de mantenimiento seleccioinado no pudo eliminarse, probablemente tiene registros que dependen de la misma");
    }
}
