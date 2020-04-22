
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
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="#" class="btn btn-sm btn-primary">Agregar Cliente</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
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
                                    </tr></thead>
                                    <tbody>
                                        @foreach($clientes as $cliente)
                                            <tr role="row">

                                                <td class="w-5"><a href="clientes/{{$cliente->IdCliente}}"> {{$cliente->ci}} </a>  </td>
                                                <td class="w-35">{{$cliente->Nombres . " " . $cliente->Apellidos}}  </td>
                                                <td class="w-10">{{$cliente->NroCelular}}  </td>

                                                <td class="w-10 text-right">
                                                    <li data-form="#delete-form-{{$cliente->IdCliente}}"
                                                        data-title="Eliminar Cliente"
                                                        data-message="Se encuentra seguro de eliminar este cliente?"
                                                        data-target="#formConfirm" class="listado">



                                                        <a class="btn btn-primary " class="formConfirm text-primary"
                                                           href="{{route("clientes.edit", $cliente->IdCliente )}}"
                                                           data-toggle="tooltip" data-placement="top" title="Modificar datos"
                                                           aria-label="Editar">
                                                            <i class="fas fa-xs fa-edit" aria-hidden="true"></i>
                                                        </a>

                                                        {{--                                                <span data-toggle="modal" data-target="#formConfirm">--}}
                                                        <a data-toggle="tooltip" class="formConfirm btn btn-danger"
                                                           data-placement="top" title="Eliminar cliente" href="">
                                                            <i class="fas fa-xs fa-trash" aria-hidden="true"></i>

                                                        </a>



                                                    </li>

                                                    <form id="delete-form-{{$cliente->IdCliente}}"
                                                          {{--                                                  action="/clientes/{{$cliente->IdCliente}}" method="post"--}}
                                                          action = "{{route("clientes.destroy", $cliente->IdCliente )}}" method="post"
                                                          style="display: none">
                                                        <input type="hidden" name="_method" value="delete">
                                                        {{csrf_field()}}

                                                    </form>

                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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