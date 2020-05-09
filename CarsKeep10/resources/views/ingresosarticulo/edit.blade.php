@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Registro de un Ingreso')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('ingresosarticulos.update', $ingreso) }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('CATEGORIAS') }}</h4>
                                <p class="card-category">{{ __('Ingrese información del clasificador y categorizador') }}</p>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Nombre de Categoria') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('NombreCategoria') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('NombreCategoria') ? ' is-invalid' : '' }}" name="NombreCategoria" id="input-NombreCategoria" type="text" placeholder="{{ __('Descripcion de la categoría') }}" value="{{ old('NombreCategoria', $categoria->NombreCategoria) }}" required="true" aria-required="true"/>
                                            @if ($errors->has('NombreCategoria'))
                                                <span id="NombreCategoria-error" class="error text-danger" for="input-NombreCategoria">{{ $errors->first('NombreCategoria') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection