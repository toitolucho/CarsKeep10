
@extends('layouts.app', ['activePage' => 'Categorias', 'titlePage' => __('Categorias')])
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
                            <h4 class="card-title ">Categorias</h4>
                            <p class="card-category"> Aqui podra administrar las categorais que le permitirán clasificar sus articulos</p>
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
                                    <a href="{{route('categorias.create')}}" class="btn btn-sm btn-primary">Agregar Categoria</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">
                                    <thead class=" text-primary">
                                    <tr><th>
                                            Id
                                        </th>
                                        <th>
                                            Nombre Completo
                                        </th>

                                        <th class="text-right">
                                            Acciones
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categorias as $categoria)
                                            <tr role="row">

                                                <td class="w-5"><a href="{{route("categorias.show", $categoria)}}"> {{$categoria->IdCategoria}} </a>  </td>
                                                <td class="w-35">{{$categoria->NombreCategoria}}  </td>


                                                <td class="text-right">
                                                    <li data-form="#delete-form-{{$categoria->IdCategoria}}"
                                                        data-title="Eliminar Categoria"
                                                        data-message="Se encuentra seguro de eliminar esta categoria?"
                                                        data-target="#formConfirm" class="listado">

                                                        <a href="{{route("categorias.edit", $categoria->IdCategoria )}}" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i><div class="ripple-container"></div></a>
                                                        <a data-toggle="modal" data-target="#formConfirm" href="#" class="formConfirm btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>

                                                    </li>

                                                    <form id="delete-form-{{$categoria->IdCategoria}}"
                                                          action = "{{route("categorias.destroy", $categoria )}}" method="post"
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
                                    {{ $categorias->links() }}
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
