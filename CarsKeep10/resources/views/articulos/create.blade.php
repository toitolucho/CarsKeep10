@extends('layouts.app', ['activePage' => 'Articulos', 'titlePage' => __('Creación de un articulo básico')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('articulos.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
{{--                        @method('put')--}}

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Perfil Básico del Articulo') }}</h4>
                                <p class="card-category">{{ __('Ingrese información del articulo') }}</p>
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
                                        <label class="col-sm-2 col-form-label">{{ __('Nombre Articulo') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('NombreArticulo') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('NombreArticulo') ? ' is-invalid' : '' }}" name="NombreArticulo" id="input-NombreArticulo" type="text" value="{{ old('NombreArticulo') }}" required="true" aria-required="true"/>
                                                @if ($errors->has('NombreArticulo'))
                                                    <span id="NombreArticulo-error" class="error text-danger" for="input-NombreArticulo">{{ $errors->first('NombreArticulo') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('IdCategoria') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('IdCategoria') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('IdCategoria') ? ' is-invalid' : '' }}" name="IdCategoria" id="input-IdCategoria" type="text"  value="{{ old('IdCategoria') }}" required="true" aria-required="true"/>
                                                @if ($errors->has('IdCategoria'))
                                                    <span id="IdCategoria-error" class="error text-danger" for="input-IdCategoria">{{ $errors->first('IdCategoria') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Cantidad de Existencia') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('CantidadExistencia') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('CantidadExistencia') ? ' is-invalid' : '' }}" name="CantidadExistencia" id="input-CantidadExistencia" type="text" value="{{ old('CantidadExistencia') }}" required />
                                                @if ($errors->has('CantidadExistencia'))
                                                    <span id="email-error" class="error text-danger" for="input-Apellidos">{{ $errors->first('Apellidos') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Precio Vigente') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('PrecioVigente') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('PrecioVigente') ? ' is-invalid' : '' }}" name="PrecioVigente" id="input-PrecioVigente" type="text"  value="{{ old('PrecioVigente') }}" required />
                                                @if ($errors->has('PrecioVigente'))
                                                    <span id="PrecioVigente-error" class="error text-danger" for="input-PrecioVigente">{{ $errors->first('PrecioVigente') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <label class="col-sm-2 col-form-label">{{ __('Tipo Inventario') }}</label>
                                        <div class="col-sm-7">

                                            <div class="form-group{{ $errors->has('TipoInventario') ? ' has-danger' : '' }}">
                                                <select class="form-control{{ $errors->has('TipoInventario') ? ' is-invalid' : '' }} "  title="Seleccione Tipo Inventario" name="TipoInventario" id="input-TipoInventario" type="text" placeholder="{{ __('TipoInventario') }}" value="{{ old('TipoInventario') }}" required >

                                                    <option value="P" selected>PEPS</option>
                                                    <option value="U">UEPS</option>
                                                    <option value="O">PONDERADO(PROMEDIO)</option>
                                                    @if ($errors->has('TipoInventario'))
                                                        <span id="TipoInventario-error" class="error text-danger" for="input-TipoInventario">{{ $errors->first('PrecioVigente') }}</span>
                                                    @endif
                                                </select>
                                            </div>

                                        </div>


                                        {{--                                        <select id="TipoInventario" class="form-control" name="TipoInventario" >--}}


                                        {{--                                        </select>--}}


                                    </div>


                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Descripcion') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('Descripcion') ? ' has-danger' : '' }}">
{{--                                                <input class="form-control{{ $errors->has('Descripcion') ? ' is-invalid' : '' }}" name="Descripcion" id="input-Descripcion" type="text"  value="{{ old('Descripcion') }}" required />--}}


                                                <textarea class="form-control {{ $errors->has('Descripcion') ? ' is-invalid' : '' }}" name="Descripcion" id="input-Descripcion" rows="3">{{old('Descripcion')}}</textarea>
                                                <span class="bmd-help">Introduzca una descripción adecuada para el articulo</span>
                                                @if ($errors->has('Descripcion'))
                                                    <span id="Descripcion-error" class="error text-danger" for="input-Descripcion">{{ $errors->first('Descripcion') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round"><i class="material-icons">update</i> {{ __('Guardar') }}<div class="ripple-container"></div></button>
{{--                                <button class="btn btn-danger">--}}
{{--                                    <i class="material-icons">close</i> Danger--}}
{{--                                    <div class="ripple-container"></div></button>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection