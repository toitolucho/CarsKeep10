<?php

namespace App\Http\Controllers;

use App\Models\IngresoArticulo;
use Illuminate\Http\Request;

class IngresoArticuloController extends Controller
{
    public function index()
    {
        //dd("Hola");
        //$ingresos_articulos = DB::table('ComprasArticulos') ->paginate(15);
        $ingresos_articulos = IngresoArticulo::with('comprasarticulosdetalles', 'comprasarticulosdetalles.articulo', 'usuario') ->orderByDesc('IdCompraArticulo')->paginate(15);

        //dd($ingresos_articulos);
        return view('', ['ingresos' => $ingresos_articulos]);
    }

    public function autocompletar()
    {
        $datas = Articulo::select("NombreArticulo")->get();
        $dataModified = array();
        foreach ($datas as $data)
        {
            $dataModified[] = $data->NombreArticulo;
        }
        dd(response()->json($dataModified));
        return response()->json($dataModified);

    }

    public function autocomplete(Request $request)

    {
        //  dd("Hola");

//        $data = articulo::select("NombreArticulo")
//            ->where("NombreArticulo","LIKE","%{$request->input('query')}%")->get();
//        dd($data);
//
//        $datas = Customers::select("FirstName")->where("FirstName","LIKE","%{$request->input('query')}%")->get();
//        $dataModified = array();
//        foreach ($datas as $data)
//        {
//            $dataModified[] = $data->NombreArticulo;
//        }
//
//        return response()->json($dataModified);

        //return response()->json($data);

//        $datas = DB::table('Articulos')->select("NombreArticulo")->get();
//
//        dd($datas);
//        $dataModified = array();
//        foreach ($datas as $data)
//        {
//            $dataModified[] = $data->NombreArticulo;
//        }
        if ($request->has('q')) {
            $datas = Articulo::select("NombreArticulo")->where("NombreArticulo","LIKE","{$request->get('q')}")->get();
        }
        else
            $datas = DB::table('Articulos')->select("NombreArticulo")->get();



        // dd($datas);
        $dataModified = array();
        foreach ($datas as $data)
        {
            $dataModified[] = $data->NombreArticulo;
        }

        // return DB::table('Articulos')->select("NombreArticulo")->get();
        return response()->json($dataModified);

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
        return view('compraarticulo.create', compact('articulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statement = DB::select("SHOW TABLE STATUS LIKE 'ComprasArticulos'");
        $nextId = $statement[0]->Auto_increment;

        $compra = IngresoArticulo::create($request->all());

        $productos = $request->input('productos', []);
        $cantidades = $request->input('cantidades', []);
        $precios = $request->input('precios', []);
        $codigos = $request->input('codigos', []);


        $compra->IdUsuario = 1;
        $compra->FechaHoraRegistro = \Carbon\Carbon::now();
        $compra->CodigoEstadoIngreso = "I";
        $compra->Observaciones = $request->input('Observaciones');;
        // $compra->IdCompraArticulo= $nextId;

        $compra->save();
        for ($product=0; $product < count($productos); $product++) {
            if ($productos[$product] != '') {
                //$order->products()->attach($productos[$product], ['quantity' => $cantidades[$product]]);
                $detalle = new IngresoArticulosdetalle();
                $detalle->IdArticulo = $codigos[$product];
                $detalle->Cantidad = $cantidades[$product];
                $detalle->Precio = $precios[$product] ;
                // $detalle->IdCompraArticulo = $nextId;
                $compra->comprasarticulosdetalles()->save($detalle);
            }
        }
        //  $compra->save();
        //dd($order->comprasarticulosdetalles());


        return redirect()->route('comprasarticulos.index')->with("registrado","Compra registrada correctamente");;
        //return response()->json($compra::with('comprasarticulosdetalles'));
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
        $compra = IngresoArticulo::with('comprasarticulosdetalles', 'comprasarticulosdetalles.articulo')->findOrFail($id);
//        $suma = $compra_articulo->comprasarticulosdetalles()->sum('Cantidad');
//        $suma = $compra_articulo->comprasarticulosdetalles()->sum('Precio');

        $total = 0; //= $compra_articulo->comprasarticulosdetalles()->Cantidad * $compra_articulo->comprasarticulosdetalles()->Precio;
        foreach ($compra->comprasarticulosdetalles as $detalle)
        {
            $total = $total+$detalle->Cantidad * $detalle->Precio;
        }
        // dd($total);
//        //dd($ingresos_articulos);
//        return view('compraarticulo.index', ['ingresos' => $ingresos_articulos]);

//        $categoria = Categoria::findOrFail($id);
        // dd($compra_articulo);
        return view('compraarticulo.edit',[ 'compra' => $compra, 'total'=>$total ]);
        //return view ('compraarticulo.edit', compact('compra','total'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update5(Request $request, $id)
    {

        $deletedRows = IngresoArticulosdetalle::where('IdCompraArticulo', $id)->delete();

        $compra = IngresoArticulo::with('comprasarticulosdetalles')->find($id);

        if($compra->comprasarticulosdetalles())
        {
            // $compra->comprasarticulosdetalles()->detach();
            $compra->comprasarticulosdetalles()->delete();
        }

        //$categoria = Categoria::find( $id);


        $productos = $request->input('productos', []);
        $cantidades = $request->input('cantidades', []);
        $precios = $request->input('precios', []);
        $codigos = $request->input('codigos', []);


//        $compra->IdUsuario = 1;
//        $compra->FechaHoraRegistro = \Carbon\Carbon::now();
//        $compra->CodigoEstadoIngreso = "I";
        $compra->Observaciones = $request->input('Observaciones');;
        // $compra->IdCompraArticulo= $nextId;

        $compra->save();
        for ($product=0; $product < count($productos); $product++) {
            if ($productos[$product] != '') {
                //$order->products()->attach($productos[$product], ['quantity' => $cantidades[$product]]);
                $detalle = new IngresoArticulosdetalle();
                $detalle->IdArticulo = $codigos[$product];
                $detalle->Cantidad = $cantidades[$product];
                $detalle->Precio = $precios[$product] ;
                // $detalle->IdCompraArticulo = $nextId;
                $compra->comprasarticulosdetalles()->save($detalle);
            }
        }
        //  $compra->save();
        //dd($order->comprasarticulosdetalles());


        return redirect()->route('comprasarticulos.index')->with("editado","Compra actualizada correctamente");;


//        $categoria->NombreCategoria = $request->get('NombreCategoria');
//
//
//        if($categoria->save())
//        {
//            return redirect('categorias')->with("editado","La Categoria ha sido actualizada correctamente");
//        }
//        return redirect('categorias')->withInput()->with("editado_error","La Categoría seleccioinada no pudo editarse, intentenlo nuevamente porfavor");
    }


    public function update(Request $request, $id)
    {
        $compra = IngresoArticulo::with('articulos')->find($id);


        if($compra->articulos())
        {
            $compra->articulos()->detach();

        }

        $productos = $request->input('productos', []);
        $cantidades = $request->input('cantidades', []);
        $precios = $request->input('precios', []);
        $codigos = $request->input('codigos', []);


//        $compra->IdUsuario = 1;
//        $compra->FechaHoraRegistro = \Carbon\Carbon::now();
//        $compra->CodigoEstadoIngreso = "I";
        $compra->Observaciones = $request->input('Observaciones');
        $compra= $compra->fresh(['articulos']);
        $compra->setRelations([]);
        $compra->update();



        for ($product=0; $product < count($productos); $product++) {

            if ($productos[$product] != '') {
                $compra->articulos()->attach($codigos[$product], ['Cantidad' => $cantidades[$product], 'Precio' => $precios[$product]]);

            }
        }

        return redirect()->route('comprasarticulos.index')->with("editado","Compra actualizada correctamente");;


    }

    public function buscar(Request $request)
    {
        //dd("holaaa");
        // dd($request->get('NombreCategoria'));
        //$textoBusqueda = $request->get('IdCompraArticulo');

        // $compras = DB::table('ComprasArticulos')->where('IdCompraArticulo','=',$textoBusqueda)->paginate(15);

        $compras = IngresoArticulo::with('comprasarticulosdetalles', 'comprasarticulosdetalles.articulo', 'usuario')->where('IdCompraArticulo','=', $request->get('IdCompraArticulo'))->get();

        // dd($compras->Observaciones);

        if($compras->isEmpty())
            // return redirect('comprasarticulos.index')->with("no_encontrado","No se encontró ningún registro con los datos proporcionados");
            return redirect('comprasarticulos')->with("no_encontrado","No se encontró ningún registro con los datos proporcionados");

        else

            return view('compraarticulo.index', ['ingresos' => $compras]);
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
