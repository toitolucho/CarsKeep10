@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Creación de un perfil de Cliente')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('clientes.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
{{--                        @method('put')--}}

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Perfil Básico del Cliente') }}</h4>
                                <p class="card-category">{{ __('Ingrese información del cliente') }}</p>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Ci') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ci') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('ci') ? ' is-invalid' : '' }}" name="ci" id="input-ci" type="text" placeholder="{{ __('Carnet de Identidad') }}" value="{{ old('ci') }}" required="true" aria-required="true"/>
                                            @if ($errors->has('ci'))
                                                <span id="ci-error" class="error text-danger" for="input-ci">{{ $errors->first('ci') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nombres') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Nombres') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('Nombres') ? ' is-invalid' : '' }}" name="Nombres" id="input-Nombres" type="text" placeholder="{{ __('Nombres') }}" value="{{ old('Nombres') }}" required="true" aria-required="true"/>
                                            @if ($errors->has('Nombres'))
                                                <span id="Nombres-error" class="error text-danger" for="input-Nombres">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Apellidos') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Apellidos') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('Apellidos') ? ' is-invalid' : '' }}" name="Apellidos" id="input-Apellidos" type="text" placeholder="{{ __('Apellidos') }}" value="{{ old('Apellidos') }}" required />
                                            @if ($errors->has('Apellidos'))
                                                <span id="email-error" class="error text-danger" for="input-Apellidos">{{ $errors->first('Apellidos') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('NroCelular') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('NroCelular') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('NroCelular') ? ' is-invalid' : '' }}" name="NroCelular" id="input-NroCelular" type="text" placeholder="{{ __('Nro Celular') }}" value="{{ old('NroCelular') }}" required />
                                                @if ($errors->has('NroCelular'))
                                                    <span id="NroCelular-error" class="error text-danger" for="input-NroCelular">{{ $errors->first('NroCelular') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('CorreoElectronico') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('CorreoElectronico') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('CorreoElectronico') ? ' is-invalid' : '' }}" name="CorreoElectronico" id="input-CorreoElectronico" type="email" placeholder="{{ __('Correo Electronico') }}" value="{{ old('CorreoElectronico') }}"  />
                                            @if ($errors->has('CorreoElectronico'))
                                                <span id="CorreoElectronico-error" class="error text-danger" for="input-CorreoElectronico">{{ $errors->first('CorreoElectronico') }}</span>
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