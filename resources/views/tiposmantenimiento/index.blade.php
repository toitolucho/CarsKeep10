
@extends('layouts.app', ['activePage' => 'Tipos_Mantenimiento', 'titlePage' => __('Tipos de Mantenimiento')])
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
                            <h4 class="card-title ">Tipos de Mantenimiento</h4>
                            <p class="card-category"> Aqui podra administrar los diferentes catalogos de servicios de mantenimientos según el tipo de Mantenimiento </p>
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
                                    <a href="{{route('tiposmantenimientos.create')}}" class="btn btn-sm btn-primary">Agregar Tipo Mantenimiento</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">
                                    <thead class=" text-primary">
                                    <tr><th>Id</th>
                                        <th class="text-center">Tipo</th>
                                        <th class="text-center">Desde(Km)</th>
                                        <th class="text-center">Hasta(Km)</th>
                                        <th class="text-right">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tiposMantenimiento as $tipo)
                                            <tr role="row">

                                                <td class="w-5"><a href="{{route("tiposmantenimientos.show", $tipo)}}"> {{$tipo->IdTipoMantenimiento}} </a>  </td>
                                                <td class="w-45">{{$tipo->NombreMantenimiento}}  </td>
                                                <td class="w-15">{{$tipo->LimiteInferiorKilometraje}}  </td>
                                                <td class="w-15">{{$tipo->LimiteSuperiorKilometraje}}  </td>


                                                <td class="text-right">
                                                    <li data-form="#delete-form-{{$tipo->IdTipoMantenimiento}}"
                                                        data-title="Eliminar Tipo de Mantenimiento "
                                                        data-message="Se encuentra seguro de eliminar esta tipo de Mantenimiento?"
                                                        data-target="#formConfirm" class="listado">

                                                        <a href="{{route("tiposmantenimientos.edit", $tipo->IdTipoMantenimiento)}}" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i><div class="ripple-container"></div></a>
                                                        <a data-toggle="modal" data-target="#formConfirm" href="#" class="formConfirm btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>

                                                    </li>

                                                    <form id="delete-form-{{$tipo->IdTipoMantenimiento}}"
                                                          action = "{{route("tiposmantenimientos.destroy", $tipo->IdTipoMantenimiento )}}" method="post"
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
                            <div class="row">
                                <div class="col-sm-12 col-md-7">
                                    {{ $tiposMantenimiento->links() }}
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
