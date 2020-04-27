@extends('layouts.app', ['activePage' => 'Servicios', 'titlePage' => __('Edición de Servicios de Mantenimiento')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('actividadesmantenimientos.update', $actividadMantenimiento) }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Actividades de Manimiento') }}</h4>
                                <p class="card-category">{{ __('Ingrese información de la actividad de Mantenimiento') }}</p>
                            </div>
                            <div class="card-body ">
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
                                    <label class="col-sm-2 col-form-label">{{ __('Nombre de Actividad de Mantenimiento') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('NombreActividad') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('NombreActividad') ? ' is-invalid' : '' }}" name="NombreActividad" id="input-NombreActividad" type="text" placeholder="{{ __('Descripcion de la categoría') }}" value="{{ old('NombreActividad', $actividadMantenimiento->NombreActividad) }}" required="true" aria-required="true"/>
                                            @if ($errors->has('NombreActividad'))
                                                <span id="NombreActividad-error" class="error text-danger" for="input-NombreActividad">{{ $errors->first('NombreActividad') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round"><i class="material-icons">update</i> {{ __('Actualizar') }}<div class="ripple-container"></div></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection