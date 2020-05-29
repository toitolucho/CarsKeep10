@extends('layouts.app', ['activePage' => 'Ventas Servicios', 'titlePage' => __('Registro de una nueva Venta')])


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

    .input_numero {
        text-align: right;
    }

    .small-checkbox {width: 8px; height: 20px !important;}

</style>

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">






                    <form method="post" action="{{ route('ventasservicios.update', $venta->IdVentaServicioEncriptado) }}" autocomplete="off"  id="ventaservicios"  >

                        {{--                    <form action="{{ route("ventasservicios.store") }}" method="POST" id="VentaServicios"  class="needs-validation" novalidate>--}}
                        @csrf
                        @method('put')
                        {{--                        @method('put')--}}

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Venta y Atencion de Servicios') }}</h4>
                                <p class="card-category">{{ __('Registre los datos que desea modificar de la venta') }}</p>
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
                                            <strong>Registro sin servicios!</strong> No puede continuar mientras no haya registrado al menos un servicios que atender.
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
                                                        <a class="nav-link" href="#detalleServicios" data-toggle="tab">
                                                            <i class="material-icons">build</i>
                                                            Detalle Servcios
                                                            <div class="ripple-container"></div></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#detalleArticulos" data-toggle="tab">
                                                            <i class="material-icons">queue_play_next</i>
                                                            Detalle Articulos e Insumos
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
                                                    <label class="col-sm-2 col-form-label">{{ __('Cliente') }}</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group{{ $errors->has('IdCliente') ? ' has-danger' : '' }}">
                                                            <input type="search" name="NombreRazonSocial" class="form-control typeahead" placeholder="Proveedor" autocomplete="off" id="input-IdCliente"   required="true" aria-required="true" />

                                                            <input type="hidden" name="IdCliente"   value="{{old('IdCliente', $venta->IdCliente)}}"  required="true" aria-required="true"  />
                                                            @if ($errors->has('IdCliente'))
                                                                <span id="IdCliente-error" class="error text-danger" for="input-IdCliente">{{ $errors->first('IdCliente') }}</span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row" >
                                                    <label class="col-sm-2 col-form-label">{{ __('Nro Placa') }}</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group{{ $errors->has('NroPlaca') ? ' has-danger' : '' }}">
                                                            <input class="form-control{{ $errors->has('NroPlaca') ? ' is-invalid' : '' }}" name="NroPlaca" id="input-NroPlaca" type="text" value="{{ old('NroPlaca', $venta->NroPlaca) }}" required />

                                                            @if ($errors->has('NroPlaca'))
                                                                <span id="NroPlaca-error" class="error text-danger" for="input-NroPlaca">{{ $errors->first('NroPlaca') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">{{ __('Fecha de Registro') }}</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group{{ $errors->has('FechaHoraRegistro') ? ' has-danger' : '' }}">
                                                            <input class="form-control{{ $errors->has('FechaHoraRegistro') ? ' is-invalid' : '' }}" name="FechaHoraRegistro" id="input-FechaHoraRegistroa" type="date" placeholder="{{ __('Fecha de Registro') }}" value="{{ old('FechaHoraRegistro', \Carbon\Carbon::parse($venta->FechaHoraVenta )->format('Y-m-d')) }}" required="true" aria-required="true"/>
                                                            @if ($errors->has('FechaHoraRegistro'))
                                                                <span id="NombreCategoria-error" class="error text-danger" for="input-FechaHoraRegistro">{{ $errors->first('FechaHoraRegistro') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1">Estado</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group{{ $errors->has('CodigoEstadoVenta') ? ' has-danger' : '' }}">

                                                            <select class="form-control{{ $errors->has('CodigoEstadoVenta') ? ' is-invalid' : '' }} "  title="Seleccione el estado de la transaccion" name="CodigoEstadoVenta" id="input-CodigoEstadoVenta" data-toggle="Estado de la Transacción" data-placement="top" title="Estado de la Transacción"   >

                                                                <option value="I" selected>INICIADO</option>
                                                                <option value="F">FINALIZADO</option>
                                                                <option value="A">ANULADO</option>

                                                            </select>

                                                            @if ($errors->has('CodigoEstadoVenta'))
                                                                <span id="CodigoEstadoVenta-error" class="error text-danger" for="input-CodigoEstadoVenta">{{ $errors->first('CodigoEstadoVenta') }}</span>
                                                            @endif
                                                        </div>
                                                        <span class="bmd-help">Seleccione Finalizar en caso de confirmar el movimiento (Recuerde que ya no podra hacer cambios)</span>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <label class="col-sm-2 col-form-label">{{ __('Kilometraje') }}</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group{{ $errors->has('Kilometraje') ? ' has-danger' : '' }}">
                                                            <input class="form-control{{ $errors->has('Kilometraje') ? ' is-invalid' : '' }}" name="Kilometraje" id="input-Kilometraje" type="number" value="{{ old('Kilometraje', $venta->Kilometraje) }}" required />

                                                            @if ($errors->has('Kilometraje'))
                                                                <span id="Kilometraje-error" class="error text-danger" for="input-Kilometraje">{{ $errors->first('Kilometraje') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <label class="col-sm-2 col-form-label">{{ __('Marca Movilidad') }}</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group{{ $errors->has('MarcaMovilidad') ? ' has-danger' : '' }}">
                                                            <input class="form-control{{ $errors->has('MarcaMovilidad') ? ' is-invalid' : '' }}" name="MarcaMovilidad" id="input-MarcaMovilidad" type="text" value="{{ old('MarcaMovilidad',$venta->MarcaMovilidad) }}" required />

                                                            @if ($errors->has('MarcaMovilidad'))
                                                                <span id="MarcaMovilidad-error" class="error text-danger" for="input-MarcaMovilidad">{{ $errors->first('MarcaMovilidad') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">{{ __('Observaciones') }}</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group{{ $errors->has('Observaciones') ? ' has-danger' : '' }}">
                                                            {{--                                                <input class="form-control{{ $errors->has('Descripcion') ? ' is-invalid' : '' }}" name="Descripcion" id="input-Descripcion" type="text"  value="{{ old('Descripcion') }}" required />--}}


                                                            <textarea class="form-control {{ $errors->has('Observaciones') ? ' is-invalid' : '' }}" name="Observaciones" id="input-Observaciones" rows="3">{{old('Observaciones', $venta->Observaciones)}}</textarea>
                                                            <span class="bmd-help">Introduzca la descripción u observacion que describa de forma general la venta de servicios</span>
                                                            @if ($errors->has('Observaciones'))
                                                                <span id="Observaciones-error" class="error text-danger" for="input-Observaciones">{{ $errors->first('Observaciones') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="tab-pane" id="detalleServicios">
                                                @if($errors->has('servicios.*'))
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
                                                        <input type="search" id="buscarMantenimiento" name="articulo" class="form-control typeahead" placeholder="Int. servicios de Mantenimiento" autocomplete="off" >
                                                        <input id="IdTipoMantenimiento"  name="IdTipoMantenimiento" hidden value="">

                                                    </div>
                                                </div>
                                                <div class="row  mt-3 ml-1">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered table-hover"
                                                               id="tabla_servicios">
                                                            <thead>
                                                            <tr>
                                                                <th class='w-5 text-center' > Nro</th>
                                                                <th class='w-30 text-center'> Servicio</th>
                                                                <th class='w-10 text-center'> Costo</th>
                                                                <th class='w-10 text-center' data-toggle="tooltip" data-placement="top" title="Servicio Obligatorio?"> Term.?</th>
                                                                <th class='w-30 text-center'> Observaciones</th>
                                                                <th class='w-5 text-center' style="border-top: 1px solid #f8f9fc; border-right: 1px solid #f8f9fc; border-bottom: 1px solid #f8f9fc;"></th>
                                                                <th class="text-center" style='display:none'></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
{{--                                                            tr.attr('id', "servicio" + cont);--}}
{{--                                                            tr.append($("<td/>",{  text: cont})).--}}
{{--                                                            append($("<td/>",{  text: value.actividadmantenimiento.NombreActividad})).--}}
{{--                                                            append($("<td/>",{  text: value.CostoServicio})).--}}
{{--                                                            append($("<td> <input hidden type='text' name='concluidos["+ (cont-1)+ "]' />  <input class='form-control small-checkbox'  type='checkbox' id='check"+ cont +"' name='concluidos["+ (cont-1)+ "]'  data-toggle='tooltip' data-placement='top' title='¿Ha concluido el servicio "+  value.actividadmantenimiento.NombreActividad  +"?' /> </td>")).--}}
{{--                                                            append($("<td><textarea class='form-control' id='txtObervacion"+ cont +"' name='observaciones[]' value='' rows='2'/></td>")).--}}
{{--                                                            append($("<td><button onclick='removeRowServicio("+cont+")' name='servicio"+cont+"' class='btn btn-danger btn-just-icon btn-sm'> <i class='material-icons'>highlight_off</i></button>  </td>")).--}}
{{--                                                            append( $("<td style='display:none'>  <input name='servicios[]' value='"+value.IdActividad +"'>  </td>")--}}
{{--                                                            );--}}



                                                                @foreach($venta->actividadesMantenimiento as $detalle)

                                                                    <tr id= "servicio{{$loop->index+1}}">
                                                                        <td>{{$loop->index+1}}</td>
                                                                        {{--                                                                        <td><input type='text' name='productos[]' class='form-control' value ="{{$detalle->articulo->NombreArticulo}}"  readonly/></td>--}}
                                                                        <td>{{$detalle->NombreActividad}}</td>
                                                                        <td class="text-right">{{$detalle->pivot->Costo}}</td>
                                                                        <td> <input hidden type='text' name='concluidos[ {{$loop->index}} ]' />   <input class='form-control small-checkbox'   {{$detalle->pivot->CodigoEstadoEjecucion == 'C' ? "checked" :  "" }}  type='checkbox' id='check{{$loop->index+1}}' name='concluidos[ {{$loop->index}} ]'  data-toggle='tooltip' data-placement='top' title='¿Ha concluido el servicio {{$detalle->NombreActividad}}?' /></td>
{{--                                                                        <td><input type='number' name='precios[]' placeholder='Int. Precio Unitario' class='form-control price' step='0.00' min='0' value="{{$detalle->pivot->Precio}}"> </td>--}}
                                                                        <td><textarea class='form-control' id='txtObervacion{{$loop->index+1}}' name='observaciones[]' rows='2'>  {{$detalle->pivot->Observacion}} </textarea></td>
                                                                        <td data-name='del{{$loop->index+1}}'><button onclick='removeRowServicio({{$loop->index+1}});' name='del{{$loop->index+1}}' class='btn btn-danger btn-just-icon btn-sm'> <i class='material-icons'>highlight_off</i></button> </td>
                                                                        {{--                                                                        <td class="td-actions text-right" data-name='del{{$loop->index+1}}'><button onclick='removeRowArticulo({{$loop->index+1}});' name='del{{$loop->index+1}}' type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="">--}}
                                                                        {{--                                                                                <i class="material-icons">close</i>--}}
                                                                        {{--                                                                               </button></td>--}}
                                                                        <td style='display:none'> <input name='servicios[]' value="{{$detalle->IdActividad}}"> </td>
                                                                    </tr>


                                                                @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="detalleArticulos">


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

                                                            @foreach($venta->articulos as $detalle)

                                                                <tr id= "articulo{{$loop->index+1}}">
                                                                    <td>{{$loop->index+1}}</td>
                                                                    {{--                                                                        <td><input type='text' name='productos[]' class='form-control' value ="{{$detalle->articulo->NombreArticulo}}"  readonly/></td>--}}
                                                                    <td>{{$detalle->NombreArticulo}}</td>
                                                                    <td><input type='number' name='cantidades[]' class='form-control qty' step='1' value ="{{$detalle->pivot->Cantidad}}" ></td>
                                                                    <td><input type='number' name='precios[]' placeholder='Int. Precio Unitario' class='form-control price' step='0.00' min='0' value="{{$detalle->pivot->Costo}}"> </td>
                                                                    <td><input type='number' name='total[]' placeholder='0.00' class='form-control total'  value="{{ $detalle->pivot->Cantidad*$detalle->pivot->Costo }}" readonly/></td>
                                                                    <td data-name='del{{$loop->index+1}}'><button onclick='removeRowArticulo({{$loop->index+1}});' name='del{{$loop->index+1}}' class='btn btn-danger btn-sm'><span aria-hidden='true'>×</span></button></td>
                                                                    {{--                                                                        <td class="td-actions text-right" data-name='del{{$loop->index+1}}'><button onclick='removeRowArticulo({{$loop->index+1}});' name='del{{$loop->index+1}}' type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="">--}}
                                                                    {{--                                                                                <i class="material-icons">close</i>--}}
                                                                    {{--                                                                               </button></td>--}}
                                                                    <td style='display:none'> <input name='codigos[]' value="{{$detalle->IdArticulo}}"> </td>
                                                                </tr>


                                                            @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7 text-center">
                                            <span class="float-md-left"></span>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <table class="table table-bordered table-hover" id="tab_logic_total">
                                                <tbody>
                                                <tr>
                                                    <th class="text-right">Sub Total</th>
                                                    <td class="text-center">
                                                        {{--                                                            <input type="number" name='sub_total' placeholder='0.00' class="form-control input_numero" id="sub_total" readonly/>--}}
                                                        <div class="input-group">
                                                            <input type="number"  name='sub_total' id="sub_total" placeholder='0.00' class="form-control input_numero" aria-label="Monto Sub Total (Con dos decimales validos)" readonly>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Bs</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th class="text-right">% Impuesto</th>
                                                    <td class="text-center">
                                                        <div class="input-group mb-2 mb-sm-0">
                                                            <input type="number"   id="tax" placeholder='0' class="form-control input_numero" aria-label="Porcentaje Descuento (Con dos decimales validos)" >
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">Monto Impuesto</th>
                                                    <td class="text-center">
                                                        {{--                                                            <input type="number" name='tax_amount' id="tax_amount"--}}
                                                        {{--                                                                                       placeholder='0.00' class="form-control input_numero" readonly/>--}}
                                                        <div class="input-group">
                                                            <input type="number"  name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control input_numero" aria-label="Monto Impuesto (Con dos decimales validos)" readonly>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Bs</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">Total:</th>
                                                    <td class="text-center ">
                                                        <div class="input-group">
                                                            <input type="number"  name='total_amount' id="total_amount" placeholder='0.00' class="form-control input_numero" aria-label="Monto Total (Con dos decimales validos)" readonly>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Bs</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-1 text-center">
                                            <span class="float-md-right"> </span>
                                        </div>

                                    </div>




                                </div>



                            </div>

                            <div class="card-footer ml-auto mr-auto">
                                {{--                                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>--}}
                                <button  type="submit" class="btn btn-primary btn-round"><i class="material-icons">save</i> {{ __('Guardar') }}<div class="ripple-container"></div></button>
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

            var NroArticulos={!! $venta->articulos_count !!};
            $('#input-CodigoEstadoVenta').val("{!!  $venta->CodigoEstadoVenta  !!}");





            $('#tabla_articulos').on('keyup change',function(){
                calc_total();
            });

            $('#tabla_articulos tbody').on('keyup change',function(){
                calc();
            });

            $(".selectpicker").selectpicker();

            var clientes = new Bloodhound({
                remote: {
                    url: '/buscarClientesAjax?q=QUERY',
                    wildcard: 'QUERY'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('NombreCompleto'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });
            console.log(clientes);
            $("#input-IdCliente").typeahead({
                hint: true,
                highlight: true,
                limit: 10,
                minLength: 2
            }, {
                source: clientes.ttAdapter(),
                display: 'NombreCompleto',

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'listaClientes',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Cliente no encontrado</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {

                        return ('<div class="list-group-item" >' + data.NombreCompleto + '</div>');
                    }
                }
            }).on('typeahead:selected', function(event, data) {
                var nombreCompleto = data.NombreCompleto;
                var IdCliente = data.IdCliente;


                $('#ventaservicios input[name=\"IdCliente\"]').val(IdCliente)


            });

            $("#input-IdCliente").typeahead('val', "{!! $venta->cliente ?  $venta->cliente-> NombreCompleto : ''!!}");
            $('#compraarticulos input[name=\"IdCliente\"]').val({!! $venta->IdCliente !!})

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
                    // alert("El articulo <strong> \"" + name + "\" </strong>ya se encuentra en el detalle");
                    $('#myAlert').text("No puede registrar articulos duplicados");
                    $("#myAlert").fadeIn().delay(1500).fadeOut(1000);;



                    return;
                }
                var markup = "<tr id=articulo" +(NroArticulos+1)+">" +
                    "<td class='w-5  '>" +(NroArticulos+1)+" </td>"+
                    // "<td class='w-50 '><input type='text' name='productos[]' class='form-control' value ='"+ name+"'  readonly/></td>" +
                    "<td class='w-50 '> "+ name+"</td>" +
                    "<td class='w-10 text-right'><input type='number' name='cantidades[]' class='form-control qty' step='any' value ='1' min='0'  oninput='check(this)' /></td>" +
                    "<td class='w-15 text-right'><input type='number' name='precios[]' placeholder='Int. Precio Unitario' class='form-control price' step='any' min='0' value='"+precio +"' oninput='check(this)' /> </td>" +
                    "<td class='w-15 text-right'><input type='number' name='total[]' placeholder='0.00' class='form-control total'  value='"+precio +"' readonly/></td>"+
                    "<td class='w-5  text-center' data-name='del" +(NroArticulos+1)+"'><button onclick='removeRowArticulo("+(NroArticulos+1)+");' name='articulo" +(NroArticulos+1)+"' class='btn btn-danger btn-sm'><span aria-hidden='true'>×</span></button></td>"+
                    "<td style='display:none'> <input name='codigos[]' value='"+data.IdArticulo +"'> </td>"+

                    "</tr>";
                $('#tabla_articulos').append(markup);
                calc_total();


                NroArticulos++;




            });



            var mantenimientos = new Bloodhound({
                remote: {
                    url: '/buscarMantenimientosAjax?q=QUERY',
                    wildcard: 'QUERY'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('NombreMantenimiento'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });
            //  console.log(engine);

            $("#buscarMantenimiento").typeahead({
                hint: true,
                highlight: true,
                limit: 10,
                minLength: 2
            }, {
                source: mantenimientos.ttAdapter(),
                display: 'NombreMantenimiento',

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'listaMantenimientos',

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
                        return ('<div class="list-group-item" >' + data.NombreMantenimiento + '</div>');
                        // return  data.NombreArticulo;
                    }
                }
            }).on('typeahead:selected', function(event, data) {
                // console.log("seleccionado");
                // console.log(data.NombreArticulo);
                //$('.search-inputs').val(data.NombreArticulo);

                var name = data.NombreMantenimiento;
                var codigo = data.IdTipoMantenimiento;
                var descripcion = data.Descripcion;
                var limInf = data.LimiteInferiorKilometraje;
                var limSup = data.LimiteSuperiorKilometraje;

                $('#ventaservicios input[name=\"IdTipoMantenimiento\"]').val(codigo)

                $.get("{{URL::to('/tiposmantenimientos/detalle/')}}/" + codigo, function(data){
                    // console.log(data);


                    {{--///<textarea class="form-control {{ $errors->has('Descripcion') ? ' is-invalid' : '' }}" name="Descripcion" id="input-Descripcion" rows="3">{{old('Descripcion')}}</textarea>--}}
                    //     "<td class='w-5  text-center' data-name='del" +(NroArticulos+1)+"'><button onclick='removeRowArticulo("+(NroArticulos+1)+");' name='articulo" +(NroArticulos+1)+"' class='btn btn-danger btn-sm'><span aria-hidden='true'>×</span></button></td>"+
                    // "<td style='display:none'> <input name='codigos[]' value='"+data.IdArticulo +"'> </td>"+
                    cont = 1;
                    $.each(data, function(i,value){
                        console.log(value);

                        var tr = $("<tr/>");
                        tr.attr('id', "servicio" + cont);
                        tr.append($("<td/>",{  text: cont})).
                        append($("<td/>",{  text: value.actividadmantenimiento.NombreActividad})).
                        append($("<td/>",{  text: value.CostoServicio})).
                        append($("<td> <input hidden type='text' name='concluidos["+ (cont-1)+ "]' />  <input class='form-control small-checkbox'  type='checkbox' id='check"+ cont +"' name='concluidos["+ (cont-1)+ "]'  data-toggle='tooltip' data-placement='top' title='¿Ha concluido el servicio "+  value.actividadmantenimiento.NombreActividad  +"?' /> </td>")).
                        append($("<td><textarea class='form-control' id='txtObervacion"+ cont +"' name='observaciones[]' value='' rows='2'/></td>")).
                        append($("<td><button onclick='removeRowServicio("+cont+")' name='servicio"+cont+"' class='btn btn-danger btn-just-icon btn-sm'> <i class='material-icons'>highlight_off</i></button>  </td>")).
                        append( $("<td style='display:none'>  <input name='servicios[]' value='"+value.IdActividad +"'>  </td>")
                        );



                        $('#tabla_servicios').append(tr);
                        cont++;
                    })


                    // console.log(data[0].actividadmantenimiento.NombreActividad);

                    //borrar la tabla
                    //insertar los datos en la tabla
                })


                // dato = existeTupla('tabla_servicios', data.IdArticulo, 7);
                // if(dato == true)
                // {
                //     // alert("El articulo <strong> \"" + name + "\" </strong>ya se encuentra en el detalle");
                //     $('#myAlert').text("No puede registrar articulos duplicados");
                //     $("#myAlert").fadeIn().delay(1500).fadeOut(1000);;
                //
                //
                //
                //     return;
                // }
                // var markup = "<tr id=articulo" +(NroArticulos+1)+">" +
                //     "<td class='w-5  '>" +(NroArticulos+1)+" </td>"+
                //     // "<td class='w-50 '><input type='text' name='productos[]' class='form-control' value ='"+ name+"'  readonly/></td>" +
                //     "<td class='w-50 '> "+ name+"</td>" +
                //     "<td class='w-10 text-right'><input type='number' name='cantidades[]' class='form-control qty' step='any' value ='1' min='0'  oninput='check(this)' /></td>" +
                //     "<td class='w-15 text-right'><input type='number' name='precios[]' placeholder='Int. Precio Unitario' class='form-control price' step='any' min='0' value='"+precio +"' oninput='check(this)' /> </td>" +
                //     "<td class='w-15 text-right'><input type='number' name='total[]' placeholder='0.00' class='form-control total'  value='"+precio +"' readonly/></td>"+
                //     "<td class='w-5  text-center' data-name='del" +(NroArticulos+1)+"'><button onclick='removeRowArticulo("+(NroArticulos+1)+");' name='articulo" +(NroArticulos+1)+"' class='btn btn-danger btn-sm'><span aria-hidden='true'>×</span></button></td>"+
                //     "<td style='display:none'> <input name='codigos[]' value='"+data.IdArticulo +"'> </td>"+
                //
                //     "</tr>";
                // $('#tabla_articulos').append(markup);
                // calc_total();


                // NroArticulos++;




            });




            $('#ventaservicios').submit(function(e) {


                respuesta = false;
                var currentForm = this;
                e.preventDefault();
                var rowCountArticulos = $('#tabla_articulos tr').length;
                console.log("Numero filas " + rowCountArticulos);


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

        function removeRowServicio(removeNum) {
            jQuery('#servicio'+removeNum).remove();
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
