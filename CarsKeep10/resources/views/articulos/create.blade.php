@extends('layouts.app', ['activePage' => 'Articulos', 'titlePage' => __('Creación de un articulo básico')])


<style>
    /***
	TYPEAHEAD for MDB
	by djibe
***/

    .typeahead {
        z-index: 1051;
    }


    /*If using icon span before input, like <i class="fa fa-asterisk prefix"></i>*/

    span.twitter-typeahead {
        /*width: calc(100% - 3rem);*/
        /*margin-left: 3rem;*/
        width: calc(100%);
    }


    /* Aspect of the dropdown of results*/

    .typeahead.dropdown-menu,
    span.twitter-typeahead .tt-menu {
        min-width: 100%;
        background: white;
        /*as large as input*/
        border: none;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
        border-radius: 0;
        font-size: 1.2rem;
    }


    /*Aspect of results, done*/

    span.twitter-typeahead .tt-suggestion {
        color: #D4AA00;
        cursor: pointer;
        padding: 1rem;
        text-transform: capitalize;
        font-weight: 400;
    }


    /*Hover a result, done*/

    span.twitter-typeahead .active.tt-suggestion,
    span.twitter-typeahead .tt-suggestion.tt-cursor,
    span.twitter-typeahead .active.tt-suggestion:focus,
    span.twitter-typeahead .tt-suggestion.tt-cursor:focus,
    span.twitter-typeahead .active.tt-suggestion:hover,
    span.twitter-typeahead .tt-suggestion.tt-cursor:hover {
        background-color: #EEEEEE;
        color: #D4AA00;
    }

    label.active {
        color: #D4AA00 !important;
    }

    #myAlert {
        display: none;
    }

</style>
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('articulos.store') }}" autocomplete="off" class="form-horizontal" id = "articulos">
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
{{--                                    <div class="row">--}}
{{--                                        <label class="col-sm-2 col-form-label">{{ __('IdCategoria') }}</label>--}}
{{--                                        <div class="col-sm-7">--}}
{{--                                            <div class="form-group{{ $errors->has('IdCategoria') ? ' has-danger' : '' }}">--}}
{{--                                                <input class="form-control{{ $errors->has('IdCategoria') ? ' is-invalid' : '' }}" name="IdCategoria" id="input-IdCategoria" type="text"  value="{{ old('IdCategoria') }}" required="true" aria-required="true"/>--}}
{{--                                                @if ($errors->has('IdCategoria'))--}}
{{--                                                    <span id="IdCategoria-error" class="error text-danger" for="input-IdCategoria">{{ $errors->first('IdCategoria') }}</span>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Categoria') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('IdCategoria') ? ' has-danger' : '' }}">
                                                <input type="search" name="NombreCategoria" class="form-control typeahead" placeholder="Categoria" autocomplete="off" id="input-IdCategoria"   required="true" aria-required="true" />
                                                <div class="invalid-feedback">
                                                    Porfavor seleccione un Categoria.
                                                </div>


                                                <input  type="hidden" id="IdCategoria" name="IdCategoria"   value="{{old('IdCategoria')}}"  required="true" aria-required="true"  />
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
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip()
            $('.alert').alert();

            var clientes = new Bloodhound({
                remote: {
                    url: '/buscarCategoriasAjax?q=QUERY',
                    wildcard: 'QUERY'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('NombreCategoria'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });
            console.log(clientes);

            $("#input-IdCategoria").typeahead({
            hint: true,
            highlight: true,
            limit: 10,
            minLength: 2
            }, {
            source: clientes.ttAdapter(),
            display: 'NombreCategoria',

            // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
            name: 'listaCategorias',

            // the key from the array we want to display (name,id,email,etc...)
            templates: {
            empty: [
            '<div class="list-group search-results-dropdown"><div class="list-group-item">Categoria no encontrada</div></div>'
            ],
            header: [
            '<div class="list-group search-results-dropdown">'
                ],
                suggestion: function (data) {

                return ('<div class="list-group-item" >' + data.NombreCategoria + '</div>');
                }
                }
                }).on('typeahead:selected', function(event, data) {
                var nombreCompleto = data.NombreCategoria;
                var IdCategoria = data.IdCategoria;


                $('#articulos input[name=\"IdCategoria\"]').val(IdCategoria)


            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.0/typeahead.bundle.min.js"></script>
@endpush
