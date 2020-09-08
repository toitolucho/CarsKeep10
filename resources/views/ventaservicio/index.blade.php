
@extends('layouts.app', ['activePage' => 'Ventas Servicios', 'titlePage' => __('Compra e Ingresos de insumos básicos para los servicios')])
<style>
    .listado {
        list-style-type: none !important;
    }

    .close {
        color: #fff;
        opacity: 1;
    }


</style>




@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Servicios y Atención al cliente</h4>
                            <p class="card-category"> Aqui podra administrar el movimiento de ventas de servicios de mantenimiento que brinda la institución a sus clientes</p>
                        </div>
                        <div class="card-body">
                            @if (session('status')   )
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>{{ session('status') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (session('eliminar_error')   )
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>{{ session('eliminar_error') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif


                                @if ($errors->has('update_error')  )
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-warning">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ $errors->first('update_error') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{route('ventasservicios.create')}}" class="btn btn-sm btn-primary">Registrar Venta</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th class="w-6">Id</th>
                                        <th class="w-20">Cliente</th>
                                        <th class="w-12">Fecha </th>
                                        <th class="w-12">Estado</th>
                                        <th class="w-25">Observaciones</th>
                                        <th class="text-right w-15">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ventas as $venta)
                                            @if($venta->CodigoEstadoVenta == 'I')
                                                <tr role="row">
                                            @endif
                                            @if($venta->CodigoEstadoVenta == 'F')
                                                <tr role="row" class="table-warning">
                                            @endif
                                            @if($venta->CodigoEstadoVenta == 'A')
                                                <tr role="row" class="table-danger">
                                            @endif


                                                <td class="w-6"><a href="{{route("ventaservicios.reporte",  $venta->IdVentaServicioEncriptado )}}" data-toggle="tooltip" data-placement="top" title="Ver Detalle"> {{$venta->IdVentaServicio}} </a>  </td>
                                                <td class="w-20">{{$venta->cliente ?  $venta->cliente->NombreCompleto : ''}}  </td>
                                                <td class="w-12">{{   date('d-m-Y', strtotime($venta->FechaHoraVenta))   }} </td>
                                                <td class="w-12">{{$venta->Estado}}  </td>
                                                <td class="w-25">{{$venta->Observaciones}}  </td>


                                                <td class="text-right w-15">
                                                    @if($venta->CodigoEstadoVenta == 'I')
                                                    <li data-form="#delete-form-{{$venta->IdVentaServicio}}"
                                                        data-title="Eliminar Venta"
                                                        data-message="Se encuentra seguro de eliminar el registro de esta Venta?"
                                                        data-target="#formConfirm" class="listado">



                                                        <a href="{{route("ventasservicios.edit",  $venta->IdVentaServicioEncriptado )}}"
                                                           data-toggle="tooltip" data-placement="top" title="Modificar Venta"
                                                           class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i><div class="ripple-container"></div></a>

                                                        <a data-target="#formFinalizar" href="#"
                                                           data-toggle="tooltip" data-placement="top" title="Finalizar Venta"
                                                           data-form="#finalizar-form-{{ $venta->IdIngresoArticulo}}"
                                                           data-title="Finalizar Venta de Servicio"
                                                           data-message="¿Se encuentra seguro de finalizar los servicios registrados para esta venta? Recuerde que una vez finalizada la transaccion, los cambios son irreversibles"
                                                           class="formFinalizar btn btn-link btn-success btn-just-icon "><i class="material-icons">check_circle</i></a>

                                                        <a data-target="#formConfirm" href="#"
                                                           data-toggle="tooltip" data-placement="top" title="Eliminar la venta"
                                                           class="formConfirm btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>

                                                        <a href="{{route("ventaservicios.reporte", $venta->IdVentaServicioEncriptado )}}"
                                                           data-toggle="tooltip" data-placement="top" title="Imprimir Reporte"
                                                           class="btn btn-link btn-warning btn-just-icon like"><i class="material-icons">print</i><div class="ripple-container"></div></a>


                                                    </li>

                                                    <form id="delete-form-{{ $venta->IdIngresoArticulo}}"
                                                          action = "{{route("ventasservicios.destroy",  $venta->IdVentaServicioEncriptado )}}" method="post"
                                                          style="display: none">
                                                        <input type="hidden" name="_method" value="delete">
                                                        {{csrf_field()}}

                                                    </form>
                                                    <form id="finalizar-form-{{ $venta->IdIngresoArticulo}}"
                                                          action = "{{route("ventaservicios.finalizar",  $venta->IdVentaServicioEncriptado )}}" method="post"
                                                          style="display: none">
                                                        <input type="hidden" name="_method" value="delete">
                                                        @csrf
                                                        @method('put')

                                                    </form>

                                                    @else
                                                        <a href="{{route("ventaservicios.reporte", $venta->IdVentaServicioEncriptado)}}"
                                                           data-toggle="tooltip" data-placement="top" title="Imprimir Reporte"
                                                           class="btn btn-link btn-warning btn-just-icon like"><i class="material-icons">print</i><div class="ripple-container"></div></a>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-7">
                                    {{ $ventas->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

