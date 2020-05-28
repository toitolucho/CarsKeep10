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


        $concluidos = $request->input('concluidos', []);
        $observaciones = $request->input('observaciones', []);
        $servicios = $request->input('servicios', []);

        //se debe corroborar si es necesario que hay cambios en los costos al momento de venderlos
        //$costos = $request->input('costos', []);

        $costos = TipoMantenimientoDetalle::where('IdTipoMantenimiento', '=', $request->input('IdTipoMantenimiento') )->get()->toArray();

       // dd($costos[0]['CostoServicio']);

        $venta->IdUsuarioSecretaria = 1;
        $venta->FechaHoraVenta = \Carbon\Carbon::now();
        $venta->CodigoEstadoVenta = "I";
        $venta->Observaciones = $request->input('Observaciones');
        $venta->IdCliente = $request->input('IdCliente');
        $venta->NroPlaca = $request->input('NroPlaca');
        $venta->Kilometraje = $request->input('Kilometraje');
        $venta->MarcaMovilidad = $request->input('MarcaMovilidad');


        $venta->save();

        for ($codigo=0; $codigo < count($codigos); $codigo++) {
            if ($codigos[$codigo] != '') {
                $venta->articulos()->attach($codigos[$codigo], ['Cantidad' => $cantidades[$codigo], 'Costo' => $precios[$codigo]]);

            }
        }

        for ($servicio=0; $servicio < count($servicios); $servicio++) {
            if ($servicios[$servicio] != '') {
                $venta->actividadesMantenimiento()->attach($servicios[$servicio], ['Costo' => $costos[$servicio]['CostoServicio'], 'CodigoEstadoEjecucion' => ($concluidos[$servicio] ? 'F' : 'P' ), 'Observacion' => $observaciones[$servicio]]);

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
    public function edit(VentaServicio $ventaServicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VentaServicio  $ventaServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VentaServicio $ventaServicio)
    {
        //
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

    public function reporte($id)
    {
        $id = Crypt::decrypt($id);
        $jasper = new \JasperPHP\JasperPHP;
        $entrada1 = storage_path('Reportes/VentaServicio/VentaServicioReporte.jrxml');
        $entrada2 = storage_path('Reportes/VentaServicio/VentaArticuloReporte_Detalle.jrxml');
        $entrada3 = storage_path('Reportes/VentaServicio/VentaServicioReporte_Detalle.jrxml');
//
//       // dd($entrada);
//
//        // Compile a JRXML to Jasper
//        $jasper->compile($entrada1)->execute();
//        $jasper->compile($entrada2)->execute();
//        $jasper->compile($entrada3)->execute();
//        echo $a;
        //dd('aaaaaaa');

        $entrada1 = storage_path('Reportes/VentaServicio/VentaServicioReporte.jasper');
        //D:\Proyectos\CarsKeep\CarsKeep10\vendor\cossou\jasperphp\src\JasperStarter\jdbc
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
                'username' => 'root',
                'host' => 'localhost',
                'database' => 'carskeep10',
                'port' => '3306',
                'jdbc_dir' => $jdbc_dir,
            )

        )->execute();

//       echo $jdbc_dir;

        $file = storage_path('Reportes/VentaServicio/VentaServicioReporte.pdf');
        if (file_exists($file)) {

            $headers = [
                'Content-Type' => 'application/pdf'
            ];
            return response()->download($file, 'Test File', $headers, 'inline');
        } else {
            abort(404, 'File not found!');
        }
    }
}

