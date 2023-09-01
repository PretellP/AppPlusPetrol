@extends('principal.common.layouts.masterpage')

@section('content')


<div class="row content">

    <div class="title-page-header">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>Stock</h4>
                </div>
            </div>
        </div>

        <div class="principal-container card-body card z-index-2">

            {{-- <div class="form-group date-range-container">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <a href="javascript:;" id="daterange-btn-wastes-admin" class="btn btn-primary icon-left btn-icon pt-2">
                            <i class="fas fa-calendar"></i>
                                Elegir Fecha 
                        </a>
                    </div>
                    <input type="text" name="date-range" class="form-control date-range-input" disabled>
                </div>
            </div>

            <input type="hidden" id="excel-generated-wastes-info" data-name='{{Auth::user()->name}}'> --}}

            <div class="mb-4" id="btn-register-packing-guide-container" data-url="{{route('loadGuidesSelected.manager')}}">
                <div class="btn btn-secondary" style="pointer-events: none;">
                    <i class="fa-solid fa-square-plus"></i> &nbsp; 
                    <span class="me-1">Realizar Carga</span>
                </div>
            </div>

            <table id="interment-wastes-table-manager" class="table table-hover" data-url="{{route('stock.index')}}">
                <thead>
                    <tr>
                        <th>Elegir</th>
                        <th>Nro. Guía de Internamiento</th>
                        <th>clase</th>
                        <th>Nom. Residuo</th>
                        <th>Tipo de embalaje</th>
                        <th>Peso Original (Kg)</th>
                        <th>Nro. Bultos</th> 
                        <th>Empresa</th>
                        <th>Fecha de verificación</th>
                        <th>Manejo/gestión</th>
                    </tr>
                </thead>
            </table>

            <div class="mt-5 mb-3 table-title">
                Cargas registradas
            </div>

            <div class="mb-4" id="btn-update-departure-container" data-url="{{route('loadGuidesSelected.manager')}}">
                <div class="btn btn-secondary" style="pointer-events: none;">
                    <i class="fa-solid fa-square-plus"></i> &nbsp; 
                    <span class="me-1">Dar salida</span>
                </div>
            </div>

            <table id="packing-guides-table-manager" class="table table-hover" data-url="{{route('stock.index')}}">
                <thead>
                    <tr>
                        <th>Elegir</th>
                        <th>Nro. Guía de Embalaje</th>
                        <th>Fecha de salida de los resíduos</th>
                        <th>Peso total (Kg)</th>
                        <th>Total bultos</th>
                        <th>Volumen (m3)</th>
                        <th>Salida</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>

</div>

@endsection

@section('modals')

<div class="modal fade" id="RegisterPackingGuideModal" tabindex="-1" aria-labelledby="RegisterPackingGuideModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-wastes">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterPackingGuideModalTitle">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-layer-group"></i> &nbsp;
                        <span id="txt-context-element">
                            Realizar Carga
                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

        <form action="{{route('stock.storePg.manager')}}"  id="register-pg-manager-form" method="POST">
            @csrf

            <div class="modal-body">

                <div class="text-bold p-2 mb-2 subtitle">
                    Residuos seleccionados:
                </div>


                <table id="guides-pg-manager-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nro. Guía de Internamiento</th>
                            <th>clase</th>
                            <th>Nom. Residuo</th>
                            <th>Tipo de embalaje</th>
                            <th>Peso Original (Kg)</th>
                            <th>Nro. Bultos</th> 
                            <th>Empresa</th>
                            <th>Fecha de verificación</th>
                        </tr>
                    </thead>

                    <tbody id="t-body-guides-pg-manager">
                        
                    </tbody>

                </table>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label> Peso Total:</label>
                        <div id="total-weight-pg-manager" class="disabled-txt-input">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Cantidad de Bultos: </label>
                        <div id="total-packages-pg-manager" class="disabled-txt-input">
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputGuideCode">Guía de embalaje *</label>
                        <input type="text" name="code" class="form-control"
                            placeholder="Ingresar guía de embalaje" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Fecha de salida de los residuos *</label>
                        <div class="input-group">
                            <input type="text" name="date" class="form-control datetimepicker" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputVolume">Volumen de Carga (m3) *</label>
                        <input type="number" step="0.01" min="0" name="volume" class="form-control"
                            placeholder="Ingresar volumen de carga" required>
                    </div>

                </div>
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary btn-save">
                    Guardar
                    <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                </button>
            </div>


        </form>

        </div>



    </div>
</div>


<div class="modal fade" id="showPackingGuideDetailModal" tabindex="-1" aria-labelledby="showPackingGuideDetailModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-wastes">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="showPackingGuideDetailModalTitle">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-layer-group"></i> &nbsp;
                        <span id="txt-context-element">
                            Detalle de Carga
                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <div class="modal-body">

                <table id="show-packing-guide-manager-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nro. Guía de Embalaje</th>
                            <th>Fecha de salida de los resíduos</th>
                            <th class="weight-pg">Peso Total(Kg)</th>
                            <th class="packages-pg">Total bultos</th>
                            <th>Volumen (m3)</th>
                        </tr>
                    </thead>

                    <tbody id="t-body-show-packing-guide-manager">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>

                </table>

                <div class="text-bold p-2 mb-2 subtitle">
                    Resíduos de la carga:
                </div>
                
                <table id="intGuide-show-manager-table" class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>Nro. Guía de Internamiento</th>
                            <th>Clase</th>
                            <th>Nom. Residuo</th>
                            <th>Tipo de embalaje</th>
                            <th>Peso Original (Kg)</th>
                            <th>Nro. Bultos</th> 
                            <th>Empresa</th>
                            <th>Fecha de verificación</th>
                        </tr>
                    </thead>

                    <tbody id="t-body-int-guides-manager">
                    </tbody>

                </table>
                
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="updateDeparturePgModal" tabindex="-1" aria-labelledby="updateDeparturePgModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterPackingGuideModalTitle">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-truck-moving"></i> &nbsp;
                        <span id="txt-context-element">
                            Registrar Salida
                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

        <form action="{{route('updatePackingGuideDeparture.manager')}}"  id="updateDeparture-pg-manager-form" method="POST">
            @csrf

            <div class="modal-body">

                <div class="text-bold p-2 mb-2 subtitle">
                    Cargas Seleccionadas:
                </div>


                <table id="guides-departure-manager-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nro. Guía de embalaje</th>
                            <th>Fecha de salida Malvinas</th>
                            <th>Peso total (Kg)</th>
                            <th>Total bultos</th>
                            <th>Volumen (m3)</th>
                        </tr>
                    </thead>

                    <tbody id="t-body-guides-departure-manager">
                    </tbody>

                </table>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="transport-type-select">Tipo de transporte *</label>
                        <select name="transport-type" id="transport-type-select" class="form-control select2" required>
                            <option></option>
                            <option value="Aéreo">Aéreo</option>
                            <option value="Fluvial">Fluvial</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Fecha de salida Malvinas *</label>
                        <div class="input-group">
                            <input type="text" name="date" class="form-control datetimepicker" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-group col-md-4">
                        <label for="destination-select">Destino de la carga *</label>
                        <select name="destination" id="destination-select" class="form-control select2" required>
                            <option></option>
                            <option value="Lima">Lima</option>
                            <option value="Pucallpa">Pucallpa</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="transport-type-select">N° de Guía PPC *</label>
                        <input type="text" name="n-guideppc" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>N° de Manifiesto *</label>
                        <input type="text" name="n-manifest" class="form-control" required>
                    </div>
                </div>
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary btn-save">
                    Guardar
                    <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                </button>
            </div>


        </form>

        </div>



    </div>
</div>

    
@endsection