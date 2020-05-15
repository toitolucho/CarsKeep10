
@extends('layouts.app', ['activePage' => 'Ingresos', 'titlePage' => __('Compra e Ingresos de insumos básicos para los servicios')])
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
                            <h4 class="card-title ">Compra e Ingresos de insumos básicos para los servicios</h4>
                            <p class="card-category"> Aqui podra administrar los ingresos de los articulos necesarios para poder brindar los diferentes servicios de mantenimiento que tiene registrado</p>
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
                                        <div class="alert alert-success">
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
                                    <a href="{{route('ingresosarticulos.create')}}" class="btn btn-sm btn-primary">Registrar Ingreso</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th class="w-6">Id</th>
                                        <th class="w-20">Proveedor</th>
                                        <th class="w-12">Fecha</th>
                                        <th class="w-12">Estado</th>
                                        <th class="w-25">Observaciones</th>
                                        <th class="text-right w-15">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ingresos as $ingreso)
                                            @if($ingreso->CodigoEstadoIngreso == 'I')
                                                <tr role="row">
                                            @endif
                                            @if($ingreso->CodigoEstadoIngreso == 'F')
                                                <tr role="row" class="table-warning">
                                            @endif
                                            @if($ingreso->CodigoEstadoIngreso == 'A')
                                                <tr role="row" class="table-danger">
                                            @endif


                                                <td class="w-6"><a href="{{route("ingresosarticulos.show", $ingreso)}}"> {{$ingreso->IdIngresoArticulo}} </a>  </td>
                                                <td class="w-20">{{$ingreso->proveedor ?  $ingreso->proveedor->NombreRazonSocial : ''}}  </td>
                                                <td class="w-12">{{   date('d-m-Y', strtotime($ingreso->FechaHoraRegistro))   }} </td>
                                                <td class="w-12">{{$ingreso->Estado}}  </td>
                                                <td class="w-25">{{$ingreso->Observaciones}}  </td>


                                                <td class="text-right w-15">
                                                    @if($ingreso->CodigoEstadoIngreso == 'I')
                                                    <li data-form="#delete-form-{{$ingreso->IdIngresoArticulo}}"
                                                        data-title="Eliminar Ingreso"
                                                        data-message="Se encuentra seguro de eliminar el registro de este ingreso?"
                                                        data-target="#formConfirm" class="listado">



                                                        <a href="{{route("ingresosarticulos.edit", $ingreso->IdIngresoArticulo )}}"
                                                           data-toggle="tooltip" data-placement="top" title="Modificar Ingreso"
                                                           class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i><div class="ripple-container"></div></a>

                                                        <a data-target="#formFinalizar" href="#"
                                                           data-toggle="tooltip" data-placement="top" title="Finalizar Ingreso"
                                                           data-form="#finalizar-form-{{$ingreso->IdIngresoArticulo}}"
                                                           data-title="Finalizar Ingreso"
                                                           data-message="¿Se encuentra seguro de finalizar el ingreso por la compra actual? Recuerde que una vez finalizada la transaccion, los cambios son irreversibles"
                                                           class="formFinalizar btn btn-link btn-success btn-just-icon "><i class="material-icons">check_circle</i></a>

                                                        <a data-target="#formConfirm" href="#"
                                                           data-toggle="tooltip" data-placement="top" title="Eliminar el Ingreso"
                                                           class="formConfirm btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>

                                                        <a href="{{route("ingresosarticulos.reporte", $ingreso->IdIngresoArticulo )}}"
                                                           data-toggle="tooltip" data-placement="top" title="Imprimir Reporte"
                                                           class="btn btn-link btn-warning btn-just-icon like"><i class="material-icons">print</i><div class="ripple-container"></div></a>


                                                    </li>

                                                    <form id="delete-form-{{$ingreso->IdIngresoArticulo}}"
                                                          action = "{{route("ingresosarticulos.destroy", $ingreso )}}" method="post"
                                                          style="display: none">
                                                        <input type="hidden" name="_method" value="delete">
                                                        {{csrf_field()}}

                                                    </form>
                                                    <form id="finalizar-form-{{$ingreso->IdIngresoArticulo}}"
                                                          action = "{{route("ingresosarticulos.finalizar", $ingreso )}}" method="post"
                                                          style="display: none">
                                                        <input type="hidden" name="_method" value="delete">
                                                        @csrf
                                                        @method('put')

                                                    </form>

                                                    @else
                                                        <a href="{{route("ingresosarticulos.reporte", $ingreso->IdIngresoArticulo )}}"
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
                                    {{ $ingresos->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

