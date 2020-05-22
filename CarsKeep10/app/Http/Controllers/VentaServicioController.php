<?php

namespace App\Http\Controllers;

use App\Models\VentaServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
    public function store(Request $request)
    {
        //
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
//        $entrada1 = storage_path('Reportes/IngresoArticulo/IngresosArticulosReporte.jrxml');
//        $entrada2 = storage_path('Reportes/IngresoArticulo/IngresosArticulosDetalleReporte.jrxml');
//
//       // dd($entrada);
//
//        // Compile a JRXML to Jasper
//        $jasper->compile($entrada1)->execute();
//        $jasper->compile($entrada2)->execute();

        $entrada1 = storage_path('Reportes/IngresoArticulo/IngresosArticulosReporte.jasper');
        //D:\Proyectos\CarsKeep\CarsKeep10\vendor\cossou\jasperphp\src\JasperStarter\jdbc
        $jdbc_dir = base_path() . '\vendor\cossou\jasperphp\src\JasperStarter\jdbc';
//
        // Process a Jasper file to PDF and RTF (you can use directly the .jrxml)
        $salida = $jasper->process(
            $entrada1,
            false,
            array("pdf"),
            array("IdIngresoArticulo" => $id),
            array(
                'driver' => 'mysql',
                'username' => 'root',
                'host' => 'localhost',
                'database' => 'carskeep10',
                'port' => '3306',
                'jdbc_dir' => $jdbc_dir,
            )

        )->execute();

//       echo $salida;

        $file = storage_path('Reportes/IngresoArticulo/IngresosArticulosReporte.pdf');
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
