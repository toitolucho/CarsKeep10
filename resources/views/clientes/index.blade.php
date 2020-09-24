
@extends('layouts.app', ['activePage' => 'Clientes', 'titlePage' => __('Clientes')])
<style>
    .listado {
        list-style-type: none !important;
    }

    .close {
        color: #fff;
        opacity: 1;
    }


</style>



<!-- Button trigger modal -->
<div class="right">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>
</div>


<!-- Ventana modal para insertar movilidades -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de Movilidades</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('clientes.insertarVehiculo') }}" >
                {{csrf_field()}}
                <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="NroPlaca" id="idNroPlaca" aria-describedby="emailHelp" placeholder="Número de Placa">
{{--                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  name="km" id="idkm" placeholder="Kilometraje">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="Marca" id="idMarca" placeholder="Marca">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name ="Modelo" id="idModelo" placeholder="Modelo">
                        </div>
                        <div class="form-group">
{{--                            <input type="text" class="form-control" name ="Color" id="idColor" placeholder="Color">--}}
                            <select class="form-control{{ $errors->has('TipoInventario') ? ' is-invalid' : '' }} "  title="Seleccione Tipo Inventario" name="Color" id="IdColor" type="text" placeholder="{{ __('TipoInventario') }}" value="{{ old('TipoInventario') }}" required >

                                <option value="1" selected>Blanco</option>
                                <option value="2">Negro</option>
                                <option value="3">Plata</option>
                                <option value="4">Gris</option>
                                <option value="5">Azul</option>
                                <option value="6">Rojo</option>
                                <option value="7">Amarillo / Dorado</option>
                                <option value="8">Verde</option>
                                <option value="9">Café Claro</option>
                                <option value="10">Otros</option>
{{--                                @if ($errors->has('TipoInventario'))--}}
{{--                                    <span id="TipoInventario-error" class="error text-danger" for="input-TipoInventario">{{ $errors->first('PrecioVigente') }}</span>--}}
{{--                                @endif--}}
                            </select>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>






@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Clientes</h4>
                            <p class="card-category"> Aqui podra administrar a los clientes</p>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
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

                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{route('clientes.create')}}" class="btn btn-sm btn-primary">Agregar Cliente</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">
                                    <thead class=" text-primary">
                                    <tr><th>
                                            Ci
                                        </th>
                                        <th>
                                            Nombre Completo
                                        </th>
                                        <th>
                                            Nro Celular
                                        </th>
                                        <th class="text-right">
                                            Acciones
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($clientes as $cliente)
                                            <tr role="row">

                                                <td class="w-5"><a href="clientes/{{$cliente->IdCliente}}"> {{$cliente->ci}} </a>  </td>
                                                <td class="w-35">{{$cliente->Nombres . " " . $cliente->Apellidos}}  </td>
                                                <td class="w-10">{{$cliente->NroCelular}}  </td>

                                                <td class="text-right">
                                                    <li data-form="#delete-form-{{$cliente->IdCliente}}"
                                                        data-title="Eliminar Cliente"
                                                        data-message="Se encuentra seguro de eliminar este cliente?"
                                                        data-target="#formConfirm" class="listado">

                                                        <a href="{{route("clientes.edit", $cliente->IdCliente )}}" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i><div class="ripple-container"></div></a>
                                                        <a data-toggle="modal" data-target="#formConfirm" href="#" class="formConfirm btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>

{{--                                                        <a data-target="#exampleModal" href="#"--}}
{{--                                                           data-toggle="tooltip" data-placement="top" title="Agregar Movilidad"--}}
{{--                                                           data-form="#finalizar-form-{{ $cliente->IdCliente}}"--}}
{{--                                                           data-title="Agregar una nueva movilidad"--}}
{{--                                                           data-message="¿Se encuentra seguro de finalizar los servicios registrados para esta venta? Recuerde que una vez finalizada la transaccion, los cambios son irreversibles"--}}
{{--                                                           class="formFinalizar btn btn-link btn-success btn-just-icon "><i class="material-icons">commute</i></a>--}}

                                                        <button type="button" class="btn btn-success btn-fab btn-fab-mini" data-toggle="modal" data-target="#exampleModal"
                                                                data-toggle="tooltip" data-placement="top" title="Agregar Movilidad">
                                                            <i class="material-icons">commute</i>
                                                        </button>

                                                    </li>




                                                    <form id="delete-form-{{$cliente->IdCliente}}"
                                                          action = "{{route("clientes.destroy", $cliente->IdCliente )}}" method="post"
                                                          style="display: none">
                                                        <input type="hidden" name="_method" value="delete">
                                                        {{csrf_field()}}

                                                    </form>

                                                </td>

{{--                                                <td class="w-10 text-right">--}}
{{--                                                    <li data-form="#delete-form-{{$cliente->IdCliente}}"--}}
{{--                                                        data-title="Eliminar Cliente"--}}
{{--                                                        data-message="Se encuentra seguro de eliminar este cliente?"--}}
{{--                                                        data-target="#formConfirm" class="listado">--}}



{{--                                                        <a class="btn btn-primary " class="formConfirm text-primary"--}}
{{--                                                           href="{{route("clientes.edit", $cliente->IdCliente )}}"--}}
{{--                                                           data-toggle="tooltip" data-placement="top" title="Modificar datos"--}}
{{--                                                           aria-label="Editar">--}}
{{--                                                            <i class="fas fa-xs fa-edit" aria-hidden="true"></i>--}}
{{--                                                        </a>--}}

{{--                                                                                                        <span data-toggle="modal" data-target="#formConfirm">--}}
{{--                                                        <a data-toggle="tooltip" class="formConfirm btn btn-danger"--}}
{{--                                                           data-placement="top" title="Eliminar cliente" href="">--}}
{{--                                                            <i class="fas fa-xs fa-trash" aria-hidden="true"></i>--}}

{{--                                                        </a>--}}



{{--                                                    </li>--}}

{{--                                                    <form id="delete-form-{{$cliente->IdCliente}}"--}}
{{--                                                                                                            action="/clientes/{{$cliente->IdCliente}}" method="post"--}}
{{--                                                          action = "{{route("clientes.destroy", $cliente->IdCliente )}}" method="post"--}}
{{--                                                          style="display: none">--}}
{{--                                                        <input type="hidden" name="_method" value="delete">--}}
{{--                                                        {{csrf_field()}}--}}

{{--                                                    </form>--}}

{{--                                                </td>--}}


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-7">
                                    {{ $clientes->links() }}
                                </div>
                            </div>


                        </div>
                    </div>
                    {{--          <div class="alert alert-danger">--}}
                    {{--            <span style="font-size:18px;">--}}
                    {{--              <b> </b> This is a PRO feature!</span>--}}
                    {{--          </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
