
@extends('layouts.app', ['activePage' => 'Servicios', 'titlePage' => __('Servicios y Actividades de Mantenimiento')])
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
                            <h4 class="card-title ">Servicios de Mantenimiento</h4>
                            <p class="card-category"> Aqui podra administrar los diferentes catalogos de servicios de mantenimientos </p>
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
                                    <a href="{{route('actividadesmantenimientos.create')}}" class="btn btn-sm btn-primary">Agregar Servicio</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">
                                    <thead class=" text-primary">
                                    <tr><th>
                                            Id
                                        </th>
                                        <th>
                                            Nombre del Servicio
                                        </th>

                                        <th class="text-right">
                                            Acciones
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($actividadesMantenimiento as $actividad)
                                            <tr role="row">

                                                <td class="w-5"><a href="{{route("actividadesmantenimientos.show", $actividad)}}"> {{$actividad->IdActividad}} </a>  </td>
                                                <td class="w-35">{{$categoria->NombreActividad}}  </td>


                                                <td class="text-right">
                                                    <li data-form="#delete-form-{{$actividad->IdActividad}}"
                                                        data-title="Eliminar actividad de Servicio "
                                                        data-message="Se encuentra seguro de eliminar esta actividad de servicio?"
                                                        data-target="#formConfirm" class="listado">

                                                        <a href="{{route("actividadesmantenimientos.edit", $actividad->IdActividad )}}" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i><div class="ripple-container"></div></a>
                                                        <a data-toggle="modal" data-target="#formConfirm" href="#" class="formConfirm btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>

                                                    </li>

                                                    <form id="delete-form-{{$actividad->IdActividad}}"
                                                          action = "{{route("actividadesmantenimientos.destroy", $categoria )}}" method="post"
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
                                    {{ $actividades_mantenimiento->links() }}
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
