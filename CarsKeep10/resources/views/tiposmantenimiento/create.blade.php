@extends('layouts.app', ['activePage' => 'Tipos_Mantenimiento', 'titlePage' => __('Creación de un Tipo de Mantenimiento')])

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
    .small-checkbox {width: 8px; height: 20px !important;}

</style>

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('tiposmantenimientos.store') }}" autocomplete="off" class="form-horizontal" id="tiposmaneniento">
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
                                <div class="col-sm-12">
                                    <div id="myAlert" class="alert alert-rose alert-dismissible fade show" role="alert">
                                        <strong>Registro sin Articulos!</strong> No puede continuar mientras no haya registrado al menos un articulo.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-nav-tabs">
                                <div class="card-header card-header-warning">
                                    <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper" id="tabs">
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" href="#configuracion" data-toggle="tab">
                                                        <i class="material-icons">description</i>
                                                        General
                                                        <div class="ripple-container"></div></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#detalle" data-toggle="tab">
                                                        <i class="material-icons">playlist_add</i>
                                                        Detalle Servicios
                                                        <div class="ripple-container"></div></a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="tab-content" >
                                        <div class="tab-pane active show" id="configuracion">
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
                                        <div class="tab-pane" id="detalle">


                                            @if($errors->has('codigos.*'))
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="alert alert-rose">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                            <span>{{ $errors->first('codigos.*') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif


                                            <div class="row mt-3 ml-1 mr-1">
                                                <div class="col-lg-2"></div>
                                                <div class="form-group col-lg-8 ">
                                                    <input type="search" id="buscarServicio" name="servicio" class="form-control typeahead" placeholder="Int. Servicio" autocomplete="off" >

                                                </div>
                                            </div>
                                            <div class="row  mt-3 ml-1">
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-hover" id="tabla_servicios">
                                                        <thead>
                                                        <tr>
                                                            <th class='w-5 text-center' > Nro</th>
                                                            <th class='w-75 text-center'> Servicio</th>
                                                            <th class='w-10 text-center'> Costo</th>
                                                            <th class='w-10 text-center' data-toggle="tooltip" data-placement="top" title="Servicio Obligatorio?"> Obli?</th>
                                                            <th class='w-5 text-center' style="border-top: 1px solid #f8f9fc; border-right: 1px solid #f8f9fc; border-bottom: 1px solid #f8f9fc;"></th>
                                                            <th class="text-center" style='display:none'></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>





                            </div>

                        </div>
                            <div class="card-footer ml-auto mr-auto">
                                {{--                                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>--}}
                                <button type="submit" class="btn btn-primary btn-round"><i class="material-icons">save</i> {{ __('Guardar') }}<div class="ripple-container"></div></button>
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


            var NroServicios=0;           

            

            var servicios = new Bloodhound({
                remote: {
                    url: '/buscarServiciosAjax?q=QUERY',
                    wildcard: 'QUERY'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('NombreActividad'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });
            //  console.log(engine);

            $("#buscarServicio").typeahead({
                hint: true,
                highlight: true,
                limit: 10,
                minLength: 2
            }, {
                source: servicios.ttAdapter(),
                display: 'NombreActividad',

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'listaServicios',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Registro no encontrado</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        return ('<div class="list-group-item" >' + data.NombreActividad + '</div>');
                    }
                }
            }).on('typeahead:selected', function(event, data) {

                var name = data.NombreActividad;
                var codigo = data.IdActividad;
                var precio = data.CostoServicio;


                dato = existeTupla('tabla_servicios', codigo, 6);
                if(dato == true)
                {
                    $('#myAlert').text("No puede registrar servicios duplicados");
                    $("#myAlert").fadeIn().delay(1500).fadeOut(1000);
                    return;
                }
                var markup = "<tr id=articulo" +(NroServicios+1)+">" +
                    "<td class='w-5  '>" +(NroServicios+1)+" </td>"+
                    // "<td class='w-50 '><input type='text' name='productos[]' class='form-control' value ='"+ name+"'  readonly/></td>" +
                    "<td class='w-50 '> "+ name+"</td>" +
                    "<td class='w-15 text-right'><input type='number' name='precios[]' placeholder='Int. Costo' class='form-control price' step='any' min='0' value='"+precio +"' oninput='check(this)' /> </td>" +
                    "<td class='w-15 text-right'> <input type='hidden' name='obligatorio[" +(NroServicios)+"]' value='' />  <input type='checkbox' name='obligatorio[" +(NroServicios)+"]' class='form-control small-checkbox'  value='true'/></td>"+
                    "<td class='w-5  text-center' data-name='del" +(NroServicios+1)+"'><button onclick='removeRowArticulo("+(NroServicios+1)+");' name='articulo" +(NroServicios+1)+"' class='btn btn-danger btn-sm'><span aria-hidden='true'>×</span></button></td>"+
                    "<td style='display:none'> <input name='codigos[]' value='"+codigo +"'> </td>"+

                    "</tr>";
                $('#tabla_servicios').append(markup);

                NroServicios++;




            });




            $('#tiposmaneniento').submit(function(e) {
                respuesta = false;
                var currentForm = this;
                e.preventDefault();
                var rowCountArticulos = $('#tabla_servicios tr').length;


                if(rowCountArticulos < 2)
                {
                    //Registro sin Articulos!</strong> No puede continuar mientras no haya registrado al menos un articulo.
                    $('#myAlert').text("Registro sin Articulos! No puede continuar mientras no haya registrado al menos un articulo.");

                    $("#myAlert").fadeIn().delay(1500).fadeOut(1000);;

                }
                else {
                    currentForm.submit();
                }
            });
        });

        function check(input) {
            if (input.value == 0) {
                input.setCustomValidity('El valor númerico ingresado no debe ser cero');
            } else {
                // input is fine -- reset the error message
                input.setCustomValidity('');
            }
        }


        function removeRowArticulo(removeNum) {
            jQuery('#articulo'+removeNum).remove();
            calc_total();
        }

        function existeTupla(tabla, id, nro_columna) {

            console.log("buscando dublicados");
            var table = document.getElementById(tabla);

            /*
            Extract and iterate rows from tbody of table2
            */
            for(const tr of table.querySelectorAll("tbody tr")) {

                /*
                Extract first and second cell from this row
                */
                const td0 = tr.querySelector("td:nth-child("+nro_columna+")");
                // const td1 = tr.querySelector("td:nth-child(2)");
                //console.log(td0.innerHTML  + "  == " + id);



                var innerObj = td0.innerHTML;
                var index = innerObj.indexOf("value=");
                var objValue = "";
                if(index>0){
                    index+=7;
                    var tempStr = innerObj.substring(index,innerObj.lenght);
                    var tempIndex = tempStr.indexOf("\"");
                    tempIndex+=index;
                    objValue = innerObj.substring(index,tempIndex).trim();
                    //alert("value = "+objValue);
                    console.log(objValue  + "==" + id);
                }


                if(!td0 ) {
                    continue;
                }


                if ((objValue == id) ) {

                    console.log(`Match found for ${id} . Insert rejected`);
                    return true;
                }
            }
            return false;
        }

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.0/typeahead.bundle.min.js"></script>
@endpush
