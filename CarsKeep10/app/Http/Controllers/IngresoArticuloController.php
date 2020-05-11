<?php

namespace App\Http\Controllers;

use App\Models\IngresoArticulo;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class IngresoArticuloController extends Controller
{
    public function index()
    {
        //dd("Hola");
        //$ingresos_articulos = DB::table('ComprasArticulos') ->paginate(15);
        $ingresos_articulos = IngresoArticulo::with('articulos',  'usuario', 'proveedor') ->orderByDesc('IdIngresoArticulo')->paginate(15);

        //dd($ingresos_articulos);
        return view('ingresosarticulo.index', ['ingresos' => $ingresos_articulos]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $articulos = Articulo::all();
        return view('ingresosarticulo.create', compact('articulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        Validator::make($request, [
//            'CodigoEstado' => [
//                'required',
//                Rule::in(['I', 'A', 'F']),
//            ],
//        ]);

        $validatedData = $request->validate([
            'NombreArticulo' => 'required',
            'FechaHoraRegistro' => 'required',
            'CodigoEstado' => 'required',
        ]);
//|Rule::in(['I', 'A', 'F'])
        $compra = IngresoArticulo::create($request->all());

//        $productos = $request->input('productos', []);
        $cantidades = $request->input('cantidades', []);
        $precios = $request->input('precios', []);
        $codigos = $request->input('codigos', []);


        $compra->IdUsuario = 1;
        $compra->FechaHoraRegistro = \Carbon\Carbon::now();
        $compra->CodigoEstadoIngreso = "I";
        $compra->Observaciones = $request->input('Observaciones');
        $compra->IdProveedor = $request->input('IdProveedor');


        $compra->save();
//        for ($product=0; $product < count($productos); $product++) {
//            if ($productos[$product] != '') {
//                $compra->articulos()->attach($codigos[$product], ['Cantidad' => $cantidades[$product], 'Precio' => $precios[$product]]);
//
//            }
//        }
        for ($codigo=0; $codigo < count($codigos); $codigo++) {
            if ($codigos[$codigo] != '') {
                $compra->articulos()->attach($codigos[$codigo], ['Cantidad' => $cantidades[$codigo], 'Precio' => $precios[$codigo]]);

            }
        }


        return redirect()->route('ingresosarticulos.index')->with("status","Ingreso registrado correctamente");;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compra = IngresoArticulo::withCount('articulos')->with('articulos', 'proveedor')->findOrFail($id);

        $total = 0;
        foreach ($compra->articulos as $detalle)
        {
            $total = $total+$detalle->pivot->Cantidad * $detalle->pivot->Precio;
        }

        return view('ingresosarticulo.edit',[ 'ingreso' => $compra, 'total'=>$total ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $compra = IngresoArticulo::with('articulos')->find($id);


        if($compra->articulos())
        {
            $compra->articulos()->detach();

        }

//        $productos = $request->input('productos', []);
        $cantidades = $request->input('cantidades', []);
        $precios = $request->input('precios', []);
        $codigos = $request->input('codigos', []);

        $compra->FechaHoraRegistro = $request->input('FechaHoraRegistro');
        $compra->CodigoEstadoIngreso = $request->input('CodigoEstadoIngreso');
        $compra->Observaciones = $request->input('Observaciones');
        $compra->IdProveedor = $request->input('IdProveedor');

        $compra->update();
        $compra= $compra->fresh(['articulos']);
        $compra->setRelations([]);





        for ($product=0; $product < count($codigos); $product++) {

            if ($codigos[$product] != '') {
                $compra->articulos()->attach($codigos[$product], ['Cantidad' => $cantidades[$product], 'Precio' => $precios[$product]]);

            }
        }
       // dd($request->all());
        $compra->save();
        return redirect()->route('ingresosarticulos.index')->with("status","Ingreso actualizado correctamente");;


    }

    public function buscar(Request $request)
    {
        $compras = IngresoArticulo::with('articulos', 'proveedor', 'usuario')->where('IdIngresoArticulo','=', $request->get('IdIngresoArticulo'))->get();

        // dd($compras->Observaciones);

        if($compras->isEmpty())
            // return redirect('comprasarticulos.index')->with("no_encontrado","No se encontró ningún registro con los datos proporcionados");
            return redirect('ingresosarticulos')->with("no_encontrado","No se encontró ningún registro con los datos proporcionados");

        else

            return view('ingresosarticulos.index', ['ingresos' => $compras]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        //dd($id);
//        $categoria = Categoria::find( $id);
//
//
//        if($categoria->delete())
//        {
//            return redirect('categorias')->with("eliminar","El elemento " . $categoria->NombreCategoria . ", ha sido eleminado correctamente");
//        }
//        return redirect('categorias')->withInput()->with("eliminar_error","La Categoría seleccioinada no pudo eliminarse, probablemente tiene registros que dependen de la misma");
//        //
    }
}
