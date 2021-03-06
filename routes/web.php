<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use JasperPHP\JasperPHP as JasperPHP;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');



Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});





Route::get('/buscarProveedoresAjax', function (Request $request) {


    $datas = App\Models\Proveedor::select(array('IdProveedor','NombreRazonSocial', 'NombreRepresentante'))->where("NombreRazonSocial","LIKE","%{$request->get('q')}%")->orwhere("NombreRepresentante","LIKE","%{$request->get('q')}%")->get();
    //dd(response()->json($datas));
    return response()->json($datas);
});

Route::get('/buscarCategoriasAjax', function (Request $request) {


    $datas = App\Models\Categoria::select(array('IdCategoria','NombreCategoria'))->where("NombreCategoria","LIKE","%{$request->get('q')}%")->get();
    return response()->json($datas);
});

//

Route::get('/buscarClientesAjax', function (Request $request) {


    $datas = App\Models\Cliente::select(array('IdCliente',DB::raw("CONCAT(Nombres,' ',Apellidos)  AS NombreCompleto")))->where("Nombres","LIKE","%{$request->get('q')}%")->orwhere("Apellidos","LIKE","%{$request->get('q')}%")->get();
    //dd(response()->json($datas));
    return response()->json($datas);
});


Route::get('/buscarproductosAjax', function (Request $request) {

    $datas = App\Models\Articulo::select(array('IdArticulo', 'NombreArticulo', 'PrecioVigente'))->where("NombreArticulo","LIKE","%{$request->get('q')}%")->get();
    return response()->json($datas);
});

Route::get('/buscarServiciosAjax', function (Request $request) {

    $datas = App\Models\ActividadMantenimiento::select(array('IdActividad', 'NombreActividad', 'CostoServicio'))->where("NombreActividad","LIKE","%{$request->get('q')}%")->get();
    return response()->json($datas);
});

Route::get('/buscarMantenimientosAjax', function (Request $request) {

    $datas = App\Models\TipoMantenimiento::select(array('IdTipoMantenimiento', 'NombreMantenimiento', 'Descripcion'))->where("NombreMantenimiento","LIKE","%{$request->get('q')}%")->orwhere("Descripcion","LIKE","%{$request->get('q')}%")->get();
    return response()->json($datas);
});

// Rutas incorporadas manualmente
Route::resource('/clientes','ClienteController');
Route::resource('/vehiculos','VehiculoController');
Route::resource('/categorias','CategoriaController');
Route::resource('/articulos','ArticuloController');
Route::resource('/ingresosarticulos','IngresoArticuloController');
Route::resource('/actividadesmantenimientos','ActividadMantenimientoController');
Route::resource('/tiposmantenimientos','TipoMantenimientoController');
//Route::resource('/tiposmantenimientosdetallearticulo','TipoMantenimientoDetalleArticuloController');
Route::resource('/ventasservicios','VentaServicioController');


Route::put('/ingresosarticulos/f/{ingresosarticulo}',"IngresoArticuloController@finalizar")->name('ingresosarticulos.finalizar');
Route::get('/ingresosarticulos/reporte/{ingresosarticulo}','IngresoArticuloController@reporte')->name("ingresosarticulos.reporte");
Route::get('/ventasservicios/reporte/{ventaservicio}','VentaServicioController@reporte')->name("ventaservicios.reporte");
Route::put('/ventasservicios/f/{ventaservicio}',"VentaServicioController@finalizar")->name('ventaservicios.finalizar');
Route::post('/clientes/vehiculos/insertar','VehiculoController@insertar') ->name('clientes.insertarVehiculo');


Route::get('/tiposmantenimientos/detalle/{IdTipoMantenimiento}','TipoMantenimientoController@detalle')->name('tiposmantenimiento.detalle');
Route::get('/tiposmantenimientos/detallerango/{kilometraje}','TipoMantenimientoController@detallerango')->name('tiposmantenimiento.detallerango');



//Cleto
Route::get('/buscarPlacaAjax', function (Request $request) {
    $datas = App\Models\Vehiculo::select(array('NroPlaca','km'))->where("NroPlaca","LIKE","%{$request->get('q')}%")->get();
    //dd(response()->json($datas));
    return response()->json($datas);
});


Route::get('/buscarVehiculosAjax/{id}', function ($id) {
    $cliente = App\Models\Cliente::find($id);
    $datas = $cliente->vehiculos;
    // dd(response()->json($datas));
    return response()->json($datas);
});
Route::get('/buscarVehiculoAjax/{id}', function ($id) {
    $datas = App\Models\Vehiculo::find($id);

    // dd(response()->json($datas));
    return response()->json($datas);
});
Route::get('/verificarAjax/{id}', function ($id) {

    $datas = App\Models\VentaServicio::where('NroPlaca', $id)->first();
    return response()->json($datas);
});


//
//Route::get('/reporte', function () {
//
//    $jasper = new JasperPHP;
//    //dd(__DIR__ . '/../vendor/cossou/jasperphp/examples/hello_world.jrxml');
//
//    // Compile a JRXML to Jasper
//    $jasper->compile(__DIR__ . '/../vendor/cossou/jasperphp/examples/hello_world.jrxml')->execute();
//
//    // Process a Jasper file to PDF and RTF (you can use directly the .jrxml)
//    $jasper->process(
//        __DIR__ . '/../vendor/cossou/jasperphp/examples/hello_world.jasper',
//        false,
//        array("pdf", "rtf"),
//        array("php_version" => "xxx")
//    )->execute();
//
//    $file = __DIR__ . '/../vendor/cossou/jasperphp/examples/hello_world.pdf';
//    if (file_exists($file)) {
//
//        $headers = [
//            'Content-Type' => 'application/pdf'
//        ];
//        return response()->download($file, 'Test File', $headers, 'inline');
//    } else {
//        abort(404, 'File not found!');
//    }
//});
