@extends('layouts.app', ['activePage' => 'Ingresos', 'titlePage' => __('Registro de un nuevo Ingreso')])


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
                    <form method="post" action="{{ route('ingresosarticulos.store') }}" autocomplete="off"  id="compraarticulos"  >
{{--                    <form action="{{ route("ventasservicios.store") }}" method="POST" id="VentaServicios"  class="needs-validation" novalidate>--}}
                        @csrf
{{--                        @method('put')--}}

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Ingreso y Compra de Artículos') }}</h4>
                                <p class="card-category">{{ __('Registre los datos de la compra') }}</p>
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
{{--                                            <div id="myAlert" class="alert alert-rose">--}}
{{--                                                <a href="#" class="close" data-dismiss="alert">&times;</a>--}}
{{--                                                <strong>Registro sin Articulos</strong> No puede continuar mientras no haya registrado al menos un articulo.--}}
{{--                                            </div>--}}

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
                                                                <i class="material-icons">add_shopping_cart</i>
                                                                Detalle Articulos
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
                                                        <label class="col-sm-2 col-form-label">{{ __('Proveedor') }}</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-group{{ $errors->has('IdProveedor') ? ' has-danger' : '' }}">
                                                                <input type="search" name="NombreRazonSocial" class="form-control typeahead" placeholder="Proveedor" autocomplete="off" id="input-IdProveedor"   required="true" aria-required="true" />
                                                                <div class="invalid-feedback">
                                                                    Porfavor seleccione un proveedor.
                                                                </div>


                                                                <input type="hidden" name="IdProveedor"   value="{{old('IdProveedor')}}"  required="true" aria-required="true"  />
                                                                @if ($errors->has('IdProveedor'))
                                                                    <span id="IdProveedor-error" class="error text-danger" for="input-IdProveedor">{{ $errors->first('IdProveedor') }}</span>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label class="col-sm-2 col-form-label">{{ __('Fecha de Registro') }}</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-group{{ $errors->has('FechaHoraRegistro') ? ' has-danger' : '' }}">
                                                                <input class="form-control{{ $errors->has('FechaHoraRegistro') ? ' is-invalid' : '' }}" name="FechaHoraRegistro" id="input-FechaHoraRegistroa" type="date" placeholder="{{ __('Fecha de Registro') }}" value="{{ old('FechaHoraRegistro', Carbon\Carbon::today()->format('Y-m-d')) }}" required="true" aria-required="true"/>
                                                                @if ($errors->has('FechaHoraRegistro'))
                                                                    <span id="NombreCategoria-error" class="error text-danger" for="input-FechaHoraRegistro">{{ $errors->first('FechaHoraRegistro') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1">Estado</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-group{{ $errors->has('CodigoEstadoIngreso') ? ' has-danger' : '' }}">

                                                                <select class="form-control{{ $errors->has('CodigoEstadoIngreso') ? ' is-invalid' : '' }} "  title="Seleccione Tipo Inventario" name="CodigoEstadoIngreso" id="input-CodigoEstadoIngreso" data-toggle="tooltip" data-placement="top" title="Tooltip on top"  required >

                                                                    <option value="I" selected>INICIADO</option>
                                                                    <option value="F">FINALIZADO</option>
                                                                    <option value="A">ANULADO</option>

                                                                </select>

                                                                @if ($errors->has('CodigoEstadoIngreso'))
                                                                    <span id="CodigoEstadoIngreso-error" class="error text-danger" for="input-CodigoEstadoIngreso">{{ $errors->first('CodigoEstadoIngreso') }}</span>
                                                                @endif
                                                            </div>
                                                            <span class="bmd-help">Seleccione Finalizar en caso de confirmar el movimiento (Recuerde que ya no podra hacer cambios)</span>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label class="col-sm-2 col-form-label">{{ __('Observaciones') }}</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-group{{ $errors->has('Observaciones') ? ' has-danger' : '' }}">
                                                                {{--                                                <input class="form-control{{ $errors->has('Descripcion') ? ' is-invalid' : '' }}" name="Descripcion" id="input-Descripcion" type="text"  value="{{ old('Descripcion') }}" required />--}}


                                                                <textarea class="form-control {{ $errors->has('Observaciones') ? ' is-invalid' : '' }}" name="Observaciones" id="input-Observaciones" rows="3">{{old('Observaciones')}}</textarea>
                                                                <span class="bmd-help">Introduzca la descripción u observacion que describa de forma general el ingreso</span>
                                                                @if ($errors->has('Observaciones'))
                                                                    <span id="Observaciones-error" class="error text-danger" for="input-Observaciones">{{ $errors->first('Observaciones') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="tab-pane" id="detalle">





                                                            <div class="row mt-3 ml-1 mr-1">
                                                                <div class="col-lg-2"></div>
                                                                <div class="form-group col-lg-8 ">
                                                                    <input type="search" id="buscarArticulo" name="articulo" class="form-control typeahead" placeholder="Int. Articulo" autocomplete="off" >

                                                                </div>
                                                            </div>
                                                            <div class="row  mt-3 ml-1">
                                                                <div class="col-md-12">
                                                                    <table class="table table-bordered table-hover" id="tabla_articulos">
                                                                        <thead>
                                                                        <tr>
                                                                            <th class='w-5 text-center'> Nro</th>
                                                                            <th class='w-50 text-center'> Articulo</th>
                                                                            <th class='w-10 text-center'> Cantidad</th>
                                                                            <th class='w-15 text-center'> Precio</th>
                                                                            <th class='w-15 text-center'> Total</th>
                                                                            <th class='w-5 text-center' style="border-top: 1px solid #f8f9fc; border-right: 1px solid #f8f9fc; border-bottom: 1px solid #f8f9fc;"></th>
                                                                            <th class="text-center" style='display:none'></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>









                                                    <div class="row clearfix" style="margin-top:20px">
                                                        <div class="ml-auto col-md-4">
                                                            <table class="table table-bordered table-hover" id="tab_logic_total">
                                                                <tbody>
                                                                <tr>
                                                                    <th class="text-center">Sub Total</th>
                                                                    <td class="text-center"><input type="number" name='sub_total' placeholder='0.00'
                                                                                                   class="form-control" id="sub_total" readonly/></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center">% Impuesto</th>
                                                                    <td class="text-center">
                                                                        <div class="input-group mb-2 mb-sm-0">
                                                                            <input type="number" class="form-control" id="tax" placeholder="0">
                                                                            <div class="input-group-addon">%</div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center">Monto Impuesto</th>
                                                                    <td class="text-center"><input type="number" name='tax_amount' id="tax_amount"
                                                                                                   placeholder='0.00' class="form-control" readonly/></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center">Total:</th>
                                                                    <td class="text-center"><input type="number" name='total_amount' id="total_amount"
                                                                                                   placeholder='0.00' class="form-control" readonly/></td>
                                                                </tr>
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
                                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
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
            $('.alert').alert();
            var NroArticulos=0;





            $('#tabla_articulos').on('keyup change',function(){
                calc_total();
            });

            $('#tabla_articulos tbody').on('keyup change',function(){
                calc();
            });

            $(".selectpicker").selectpicker();

            var clientes = new Bloodhound({
                remote: {
                    url: '/buscarProveedoresAjax?q=QUERY',
                    wildcard: 'QUERY'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('NombreRazonSocial'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });
            console.log(clientes);
            $("#input-IdProveedor").typeahead({
                hint: true,
                highlight: true,
                limit: 10,
                minLength: 2
            }, {
                source: clientes.ttAdapter(),
                display: 'NombreRazonSocial',

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'listaClientes',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Proveedor no encontrado</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {

                        return ('<div class="list-group-item" >' + data.NombreRazonSocial + '</div>');
                    }
                }
            }).on('typeahead:selected', function(event, data) {
                var nombreCompleto = data.NombreRazonSocial;
                var IdCliente = data.IdProveedor;


                $('#compraarticulos input[name=\"IdProveedor\"]').val(IdCliente)


            });

            var articulos = new Bloodhound({
                remote: {
                    url: '/buscarproductosAjax?q=QUERY',
                    wildcard: 'QUERY'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('NombreArticulo'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });
            //  console.log(engine);

            $("#buscarArticulo").typeahead({
                hint: true,
                highlight: true,
                limit: 10,
                minLength: 2
            }, {
                source: articulos.ttAdapter(),
                display: 'NombreArticulo',

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'listaArticulos',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Registro no encontrado</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        //  console.log("datos del servidor : ");
                        //console.log(data);
                        //return '<a href="' + data.NombreArticulo + '" class="list-group-item">' + data.NombreArticulo + ' - @' + data.NombreArticulo + '</a>'
                        return ('<div class="list-group-item" >' + data.NombreArticulo + '</div>');
                        // return  data.NombreArticulo;
                    }
                }
            }).on('typeahead:selected', function(event, data) {
                // console.log("seleccionado");
                // console.log(data.NombreArticulo);
                //$('.search-inputs').val(data.NombreArticulo);

                var name = data.NombreArticulo;
                var codigo = data.IdArticulo;
                var precio = data.PrecioVigente;


                dato = existeTupla('tabla_articulos', data.IdArticulo, 7);
                if(dato == true)
                {
                    alert("El articulo <strong> \"" + name + "\" </strong>ya se encuentra en el detalle");
                    return;
                }
                var markup = "<tr id=articulo" +(NroArticulos+1)+">" +
                    "<td class='w-5  '>" +(NroArticulos+1)+" </td>"+
                    // "<td class='w-50 '><input type='text' name='productos[]' class='form-control' value ='"+ name+"'  readonly/></td>" +
                    "<td class='w-50 '> "+ name+"</td>" +
                    "<td class='w-10 text-right'><input type='number' name='cantidades[]' class='form-control qty' step='any' value ='1' min='0'  oninput='check(this)' /></td>" +
                    "<td class='w-15 text-right'><input type='number' name='precios[]' placeholder='Int. Precio Unitario' class='form-control price' step='any' min='0' value='"+precio +"' oninput='check(this)' /> </td>" +
                    "<td class='w-15 text-right'><input type='number' name='total[]' placeholder='0.00' class='form-control total'  value='"+precio +"' readonly/></td>"+
                    "<td class='w-5  text-center' data-name='del" +(NroArticulos+1)+"'><button onclick='removeRowArticulo("+(NroArticulos+1)+");' name='articulo" +(NroArticulos+1)+"' class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden='true'>×</span></button></td>"+
                    "<td style='display:none'> <input name='codigos[]' value='"+data.IdArticulo +"'> </td>"+

                    "</tr>";
                $('#tabla_articulos').append(markup);
                calc_total();


                NroArticulos++;




            });




            $('#compraarticulos').submit(function(e) {
                respuesta = false;
                var currentForm = this;
                e.preventDefault();
                var rowCountArticulos = $('#tabla_articulos tr').length;


                if(rowCountArticulos < 2)
                {
                    $("#myAlert").fadeIn();

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


        function calc()
        {
           // console.log("llamada a funcion calc" );
            $('#tabla_articulos tbody tr').each(function(i, element) {
                var html = $(this).html();
                if(html!='')
                {
                    var qty = $(this).find('.qty').val();
                    var price = $(this).find('.price').val();
                    $(this).find('.total').val(qty*price);

                    calc_total();
                }
            });
        }

        function calc_total()
        {

            total=0;
            $('.total').each(function() {
                total += parseInt($(this).val());

            });
            $('#sub_total').val(total.toFixed(2));
            tax_sum=total/100*$('#tax').val();
            $('#tax_amount').val(tax_sum.toFixed(2));
            $('#total_amount').val((tax_sum+total).toFixed(2));
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
