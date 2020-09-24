<?php

namespace App\Http\Controllers;

use App\Models\ActividadMantenimiento;
use App\Models\TipoMantenimiento;
use App\Models\TipoMantenimientoDetalle;
use App\Models\VentaServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\VentaServicioRequest;
use JasperPHP;
use Illuminate\Contracts\Encryption\DecryptException;

class VentaServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingresos_articulos = VentaServicio::with('articulos',  'cliente', 'usuario') ->orderByDesc('IdVentaServicio')->paginate(15);
        return view('ventaservicio.index', ['ventas' => $ingresos_articulos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $tipos_mantenimiento = TiposMantenimientos::with('actividadesmantenimiento')->all();
//        return view('ingresosarticulo.create', compact('tipos_mantenimiento'));

        return view('ventaservicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentaServicioRequest $request)
    {
        $venta = VentaServicio::create($request->all());

//        $productos = $request->input('productos', []);
        $cantidades = $request->input('cantidades', []);
        $precios = $request->input('precios', []);
        $codigos = $request->input('codigos', []);


        $concluidos2 = $request->input('concluidos', []);
        $observaciones = $request->input('observaciones', []);
        $servicios = $request->input('servicios', []);

        //se debe corroborar si es necesario que hay cambios en los costos al momento de venderlos
        $costos = $request->input('costos', []);

//        $costos = TipoMantenimientoDetalle::where('IdTipoMantenimiento', '=', $request->input('IdTipoMantenimiento') )->get()->toArray();


        $concluidos = array();
        foreach ( $concluidos2 as $term ) {
            $concluidos[] = $term;
        }


        $venta->IdUsuarioSecretaria = 1;
        $venta->FechaHoraVenta = \Carbon\Carbon::now();
        $venta->CodigoEstadoVenta = "I";
        $venta->Observaciones = $request->input('Observaciones');
        $venta->IdCliente = $request->input('IdCliente');
        $venta->NroPlaca = $request->input('NroPlaca');
        $venta->Kilometraje = $request->input('Kilometraje');
        $venta->MarcaMovilidad = $request->input('MarcaMovilidad');
        $venta->IdTipoMantenimiento = $request->input('IdTipoMantenimiento');





        $venta->save();

        for ($codigo=0; $codigo < count($codigos); $codigo++) {
            if ($codigos[$codigo] != '') {
                $venta->articulos()->attach($codigos[$codigo], ['Cantidad' => $cantidades[$codigo], 'Costo' => $precios[$codigo]]);

            }
        }

        for ($servicio=0; $servicio < count($servicios); $servicio++) {
            if ($servicios[$servicio] != '') {
//                $venta->actividadesMantenimiento()->attach($servicios[$servicio], ['Costo' => $costos[$servicio]['CostoServicio'], 'CodigoEstadoEjecucion' => ($concluidos[$servicio]=="on" ? 'C' : 'P' ), 'Observacion' => $observaciones[$servicio]]);
                $venta->actividadesMantenimiento()->attach($servicios[$servicio], ['Costo' => $costos[$servicio], 'CodigoEstadoEjecucion' => ($concluidos[$servicio]=="on" ? 'C' : 'P' ), 'Observacion' => $observaciones[$servicio]]);
            }
        }


        return redirect()->route('ventasservicios.index')->with("status","Venta registrada correctamente");;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VentaServicio  $ventaServicio
     * @return \Illuminate\Http\Response
     */
    public function show(VentaServicio $ventaServicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VentaServicio  $ventaServicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        try{
            $id = Crypt::decrypt($id);
            $venta = VentaServicio::withCount('articulos')->with('articulos', 'cliente', 'actividadesMantenimiento')->findOrFail($id);

            $total = 0;
            foreach ($venta->articulos as $detalle)
            {
                $total = $total+$detalle->pivot->Cantidad * $detalle->pivot->Precio;
            }

            foreach ($venta->actividadesMantenimiento as $detalle)
            {
                $total = $total+$detalle->pivot->Costo * $detalle->pivot->Costo;
            }

            return view('ventaservicio.edit',[ 'venta' => $venta, 'total'=>$total ]);
        }
        catch (DecryptException $e) {
            // abort(404, 'Codigo de Generación invalido!');
            abort(403, 'Accion no valida. Codigo de Generación invalido');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VentaServicio  $ventaServicio
     * @return \Illuminate\Http\Response
     */
    public function update(VentaServicioRequest $request, $id)
    {
        try{
            $id = Crypt::decrypt($id);
            $venta = VentaServicio::with('articulos','actividadesMantenimiento')->find($id);





//        $venta = VentaServicio::create($request->all());

            $cantidades = $request->input('cantidades', []);
            $precios = $request->input('precios', []);
            $codigos = $request->input('codigos', []);


            $concluidos2 = $request->input('concluidos', []);
            $observaciones = $request->input('observaciones', []);
            $servicios = $request->input('servicios', []);

            //se debe corroborar si es necesario que hay cambios en los costos al momento de venderlos
            $costos = $request->input('costos', []);

            //$costos = TipoMantenimientoDetalle::wherein('IdActividad',  $servicios)->where('IdTipoMantenimiento', '=', $venta->IdTipoMantenimiento )  ->get()->toArray();

             //dd($servicios, $observaciones, $costos, $concluidos);
            $concluidos = array();
            foreach ( $concluidos2 as $term ) {
                $concluidos[] = $term;
            }

            if($venta->articulos())
            {
                $venta->articulos()->detach();

            }
            if($venta->actividadesMantenimiento())
            {
                $venta->actividadesMantenimiento()->detach();

            }

            $venta->IdUsuarioSecretaria = 1;
    //        $venta->FechaHoraVenta = \Carbon\Carbon::now();
            $venta->CodigoEstadoVenta = $request->input('CodigoEstadoVenta');
            $venta->Observaciones = $request->input('Observaciones');
            $venta->IdCliente = $request->input('IdCliente');
            $venta->NroPlaca = $request->input('NroPlaca');
            $venta->Kilometraje = $request->input('Kilometraje');
            $venta->MarcaMovilidad = $request->input('MarcaMovilidad');

            $venta->update();
            $venta= $venta->fresh(['articulos']);
            $venta= $venta->fresh(['actividadesMantenimiento']);
            $venta->setRelations([]);


            for ($codigo=0; $codigo < count($codigos); $codigo++) {
                if ($codigos[$codigo] != '') {
                    $venta->articulos()->attach($codigos[$codigo], ['Cantidad' => $cantidades[$codigo], 'Costo' => $precios[$codigo]]);

                }
            }

            for ($servicio=0; $servicio < count($servicios); $servicio++) {
                if ($servicios[$servicio] != '') {
    //                $venta->actividadesMantenimiento()->attach($servicios[$servicio], ['Costo' => $costos[$servicio]['CostoServicio'], 'CodigoEstadoEjecucion' => ($concluidos[$servicio]=="on" ? 'C' : 'P' ), 'Observacion' => $observaciones[$servicio]]);
                    $venta->actividadesMantenimiento()->attach($servicios[$servicio], ['Costo' => $costos[$servicio], 'CodigoEstadoEjecucion' => ( $concluidos[$servicio]=="on" ? 'C' : 'P' ), 'Observacion' => $observaciones[$servicio]]);

                }
            }


            return redirect()->route('ventasservicios.index')->with("status","Venta modificada correctamente");
        }
        catch (DecryptException $e) {
            // abort(404, 'Codigo de Generación invalido!');
            abort(403, 'Accion no valida. Codigo de Generación invalido');
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VentaServicio  $ventaServicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(VentaServicio $ventaServicio)
    {
        //
    }

    public function finalizar($id)
    {
        try {
            $id = decrypt($id);
            $compra = VentaServicio::find( $id);
            $compra->CodigoEstadoVenta = 'F';
            $compra->update();

            return redirect()->route('ventasservicios.index')->with("status","La Transaccion se ha finalizado correctamente");;

        } catch (DecryptException $e) {
            // abort(404, 'Codigo de Generación invalido!');
            abort(403, 'Accion no valida. Codigo de Generación invalido');
        }





        return redirect()->route('ingresosarticulos.index')->with("status","La Transaccion se ha finalizado correctamente");;
    }

    public function reporte($id)
    {
//        if(!Crypt::decrypt($id))
//        {
//            abort(404, 'El codigo ingresado es incorrecto!');
//        }


        try {


            $id = decrypt($id);

            $jasper = new \JasperPHP\JasperPHP;
//        $entrada1 = storage_path('Reportes/VentaServicio/VentaServicioReporte.jrxml');
//        $entrada2 = storage_path('Reportes/VentaServicio/VentaArticuloReporte_Detalle.jrxml');
//        $entrada3 = storage_path('Reportes/VentaServicio/VentaServicioReporte_Detalle.jrxml');
//
//       // dd($entrada);
//
//        // Compile a JRXML to Jasper
//        $jasper->compile($entrada1)->execute();
//        $jasper->compile($entrada2)->execute();
//        $jasper->compile($entrada3)->execute();
//        echo $a;
            //dd('aaaaaaa');

            $hostname = env("DB_HOST", "localhost");
            $username = env("DB_USERNAME", "root");
            $database = env("DB_DATABASE", "carskeep10");
            $password = env("DB_PASSWORD", "carskeep10000");


            $entrada1 = storage_path('Reportes/VentaServicio/VentaServicioReporte.jasper');
            $jdbc_dir = base_path() . '\vendor\cossou\jasperphp\src\JasperStarter\jdbc';
//
            // Process a Jasper file to PDF and RTF (you can use directly the .jrxml)
            $salida = $jasper->process(
                $entrada1,
                false,
                array("pdf"),
                array("IdVentaServicio" => $id),
                array(
                    'driver' => 'mysql',
                    'username' => $username,
//                    'password' => $password,
                    'host' => $hostname,
                    'database' => $database,
                    'port' => '3306',
                    'jdbc_dir' => $jdbc_dir,
                )

            )->execute();


            $file = storage_path('Reportes/VentaServicio/VentaServicioReporte.pdf');
            if (file_exists($file)) {

                $headers = [
                    'Content-Type' => 'application/pdf'
                ];
                return response()->download($file, 'Reporte de Venta de Servicio', $headers, 'inline');
            } else {
                abort(404, 'El reporte no pudo ser generado!');
            }


        } catch (DecryptException $e) {
           // abort(404, 'Codigo de Generación invalido!');
            abort(403, 'Accion no valida. Codigo de Generación invalido');
        }





    }
}

