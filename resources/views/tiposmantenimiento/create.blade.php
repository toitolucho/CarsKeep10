@extends('layouts.app', ['activePage' => 'Tipos_Mantenimiento', 'titlePage' => __('Creación de un Tipo de Mantenimiento')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('tiposmantenimientos.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
{{--                        @method('put')--}}

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Actividades de Servicios') }}</h4>
                                <p class="card-category">{{ __('Ingrese información de la actividad de clasificación del servicio') }}</p>
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
                                        <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('NombreMantenimiento') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('NombreMantenimiento') ? ' is-invalid' : '' }}"
                                                       name="NombreMantenimiento" id="input-NombreMantenimiento" type="text"
                                                       placeholder="{{ __('Descripcion de la categoría') }}"
                                                       value="{{ old('NombreMantenimiento') }}"
                                                       required="true" aria-required="true"/>
                                                @if ($errors->has('NombreMantenimiento'))
                                                    <span id="NombreMantenimiento-error" class="error text-danger"
                                                          for="input-NombreMantenimiento">{{ $errors->first('NombreMantenimiento') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Kilometraje Inicial') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('LimiteInferiorKilometraje') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('LimiteInferiorKilometraje') ? ' is-invalid' : '' }}"
                                                       name="LimiteInferiorKilometraje" id="input-LimiteInferiorKilometraje" type="text"
                                                       number="true"
                                                       placeholder="{{ __('inicial') }}"
                                                       value="{{ old('LimiteInferiorKilometraje') }}"
                                                       required="true" aria-required="true"/>
                                                @if ($errors->has('LimiteInferiorKilometraje'))
                                                    <span id="LimiteInferiorKilometraje-error" class="error text-danger"
                                                          for="input-LimiteInferiorKilometraje">{{ $errors->first('LimiteInferiorKilometraje') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Kilometraje Final') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('LimiteSuperiorKilometraje') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('LimiteSuperiorKilometraje') ? ' is-invalid' : '' }}"
                                                       name="LimiteSuperiorKilometraje" id="input-LimiteSuperiorKilometraje" type="text"
                                                       number="true"
                                                       placeholder="{{ __('final') }}"
                                                       value="{{ old('LimiteSuperiorKilometraje') }}"
                                                       required="true" aria-required="true"/>
                                                @if ($errors->has('LimiteSuperiorKilometraje'))
                                                    <span id="LimiteSuperiorKilometraje-error" class="error text-danger"
                                                          for="input-LimiteSuperiorKilometraje">{{ $errors->first('LimiteSuperiorKilometraje') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Descripcion') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('Descripcion') ? ' has-danger' : '' }}">
                                                {{--                                                <input class="form-control{{ $errors->has('Descripcion') ? ' is-invalid' : '' }}" name="Descripcion" id="input-Descripcion" type="text" placeholder="{{ __('Descripcion') }}" value="{{ old('Descripcion', $tipoMantenimiento->Descripcion) }}" required />--}}
                                                <textarea class="form-control {{ $errors->has('Descripcion') ? ' is-invalid' : '' }}" name="Descripcion" id="input-Descripcion" rows="3">{{old('Descripcion')}}</textarea>
                                                @if ($errors->has('Descripcion'))
                                                    <span id="Descripcion-error" class="error text-danger" for="input-Descripcion">{{ $errors->first('Descripcion') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="card-footer ml-auto mr-auto">
{{--                                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>--}}
                                <button type="submit" class="btn btn-primary btn-round"><i class="material-icons">update</i> {{ __('Guardar') }}<div class="ripple-container"></div></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection