@extends('layouts.app', ['activePage' => 'Articulos', 'titlePage' => __('Edicion de un Articulo')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('articulos.update', $articulo) }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Configuración Báscia de un Articulo') }}</h4>
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
                                            <input class="form-control{{ $errors->has('NombreArticulo') ? ' is-invalid' : '' }}" name="NombreArticulo" id="input-NombreArticulo" type="text" placeholder="{{ __('Nombre del Articulo') }}" value="{{ old('NombreArticulo', $articulo->NombreArticulo) }}" required="true" aria-required="true"/>
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
                                            <input class="form-control{{ $errors->has('IdCategoria') ? ' is-invalid' : '' }}" name="IdCategoria" id="input-IdCategoria" type="text" placeholder="{{ __('Identificador de Categoria') }}" value="{{ old('IdCategoria', $articulo->IdCategoria) }}" required="true" aria-required="true"/>
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
                                            <input class="form-control{{ $errors->has('CantidadExistencia') ? ' is-invalid' : '' }}" name="CantidadExistencia" id="input-CantidadExistencia" type="text" placeholder="{{ __('Existencia') }}" value="{{ old('CantidadExistencia', $articulo->CantidadExistencia) }}" required />
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
                                                <input class="form-control{{ $errors->has('PrecioVigente') ? ' is-invalid' : '' }}" name="PrecioVigente" id="input-PrecioVigente" type="text" placeholder="{{ __('Precio') }}" value="{{ old('PrecioVigente', $articulo->PrecioVigente) }}" required />
                                                @if ($errors->has('PrecioVigente'))
                                                    <span id="PrecioVigente-error" class="error text-danger" for="input-PrecioVigente">{{ $errors->first('PrecioVigente') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-6 col-sm-3">
                                        <div class="form-group{{ $errors->has('TipoInventario') ? ' has-danger' : '' }} dropdown bootstrap-select show-tick show">
                                            <select class=" form-control{{ $errors->has('TipoInventario') ? ' is-invalid' : '' }} selectpicker"
                                                                                                      data-style="select-with-transition" multiple=""
                                                                                                      title="Choose City" data-size="7" tabindex="-98" name="TipoInventario" id="input-TipoInventario">
                                                <option disabled=""> Multiple Options</option>
                                                <option value="P">PEPS</option>
                                                <option value="U">UEPS</option>
                                                <option value="O">PONDERADO(PROMEDIADO)</option>
                                            </select>
                                            @if ($errors->has('TipoInventario'))
                                                <span id="TipoInventario-error" class="error text-danger" for="input-TipoInventario">{{ $errors->first('TipoInventario') }}</span>
                                            @endif
                                            <button type="button" class="btn dropdown-toggle bs-placeholder select-with-transition" data-toggle="dropdown"
                                                    role="button" title="Seleccione Tipo" aria-expanded="true">
                                                <div class="filter-option">
                                                    <div class="filter-option-inner">
                                                        <div class="filter-option-inner-inner">Seleccione Tipo</div>
                                                    </div>
                                                </div>
                                                <div class="ripple-container"></div>
                                            </button>
                                            <div class="dropdown-menu show" role="combobox"
                                                 style="max-height: 276px; overflow: hidden; min-width: 220px; position: absolute; top: 39px; left: 1px; will-change: top, left;"
                                                 x-placement="bottom-start">
                                                <div class="inner show" role="listbox" aria-expanded="true" tabindex="-1"
                                                     style="max-height: 266px; overflow-y: auto;">
                                                    <ul class="dropdown-menu inner show">
                                                        <li class="disabled"><a role="option" class="dropdown-item disabled" aria-disabled="true"
                                                                                tabindex="-1" aria-selected="false"><span
                                                                        class=" bs-ok-default check-mark"></span><span class="text"> Multiple Options</span></a>
                                                        </li>
                                                        <li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span
                                                                        class=" bs-ok-default check-mark"></span><span class="text">PEPS </span></a></li>
                                                        <li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span
                                                                        class=" bs-ok-default check-mark"></span><span class="text">UEPS</span></a>
                                                        </li>
                                                        <li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span
                                                                        class=" bs-ok-default check-mark"></span><span class="text">PONDERADO(PROMEDIADO)</span></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Descripcion') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Descripcion') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('Descripcion') ? ' is-invalid' : '' }}" name="Descripcion" id="input-Descripcion" type="text" placeholder="{{ __('Descripcion') }}" value="{{ old('Descripcion', $articulo->Descripcion) }}" required />
                                            @if ($errors->has('Descripcion'))
                                                <span id="Descripcion-error" class="error text-danger" for="input-Descripcion">{{ $errors->first('Descripcion') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection




