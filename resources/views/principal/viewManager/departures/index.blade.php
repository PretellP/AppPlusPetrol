@extends('principal.common.layouts.masterpage')

@section('content')

<div class="title-page-header">
    <div class="card page-title-container">
        <div class="card-header">
            <div class="total-width-container">
                <h4>Transporte</h4>
            </div>
        </div>
    </div>

    <div class="principal-container card-body card z-index-2">

        <input type="hidden" id="excel-generated-departures-info" data-name='{{Auth::user()->name}}'>

        <div class="mb-4 buttons-register-container">
            <div id="btn-register-arrival-container"
                data-url="{{route('getWastesDepartureDetail.ajax')}}">
                <div class="btn btn-secondary" style="pointer-events: none;">
                    <i class="fa-solid fa-square-plus"></i> &nbsp;
                    <span class="me-1">Dar llegada</span>
                </div>
            </div>

            <div id="btn-register-departure-container"
                data-url="{{route('getWastesDepartureDetail.ajax')}}">
                <div class="btn btn-secondary" style="pointer-events: none;">
                    <i class="fa-solid fa-square-plus"></i> &nbsp;
                    <span class="me-1">Dar salida</span>
                </div>
            </div>
        </div>

        <div class="group-filter-buttons-section">
            <div class="form-group date-range-container">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <a href="javascript:;" id="daterange-btn-departures-manager"
                            class="btn btn-primary icon-left btn-icon pt-2">
                            <i class="fas fa-calendar"></i>
                            Elegir Fecha
                        </a>
                    </div>
                    <input type="text" name="date-range" class="form-control date-range-input"
                        id="date-range-input-departures" disabled>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Filtrar por Llegada: &nbsp;</label>
                <div class="selectgroup">
                    <label class="selectgroup-item">
                        <input type="radio" name="filter-departures-stat-arrival" value="" class="selectgroup-input" checked>
                        <span class="selectgroup-button selectgroup-button-icon">TODO</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="filter-departures-stat-arrival" value="pendiente" class="selectgroup-input">
                        <span class="selectgroup-button selectgroup-button-icon">PENDIENTE</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="filter-departures-stat-arrival" value="gestionado" class="selectgroup-input">
                        <span class="selectgroup-button selectgroup-button-icon">GESTIONADO</span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Filtrar por Salida: &nbsp;</label>
                <div class="selectgroup">
                    <label class="selectgroup-item">
                        <input type="radio" name="filter-departures-stat-departure" value="" class="selectgroup-input" checked>
                        <span class="selectgroup-button selectgroup-button-icon">TODO</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="filter-departures-stat-departure" value="pendiente" class="selectgroup-input">
                        <span class="selectgroup-button selectgroup-button-icon">PENDIENTE</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="filter-departures-stat-departure" value="gestionado" class="selectgroup-input">
                        <span class="selectgroup-button selectgroup-button-icon">GESTIONADO</span>
                    </label>
                </div>
            </div>
        </div>


        <table id="departures-table-manager" class="table table-hover" data-url="{{route('departures.index')}}">
            <thead>
                <tr>
                    <th>Elegir</th>
                    <th>N° Guía de Embalaje</th>
                    <th>N° Guía PPC</th>
                    <th>clase</th>
                    <th>Nom. Residuo</th>
                    <th>Tipo de embalaje</th>
                    <th>Peso Original (Kg)</th>
                    <th>N° Bultos</th>
                    <th>Empresa</th>
                    <th>Fecha de salida Malvinas</th>
                    <th>N° Guía GC Puerto</th>
                    <th>Fecha llegada de Pucallpa</th>
                    <th>Fecha retiro de puerto</th>
                    <th>N° Guía Green Care</th>
                    <th>Destino</th>
                    <th>Placa Camión Pucallpa</th>
                    <th>Peso recibido</th>
                    <th>Dif. Peso Malvinas-Pucallpa</th>
                    <th>Fecha salida de Pucallpa</th>
                    <th>Estado LLegada</th>
                    <th>Estado Salida</th>
                </tr>
            </thead>
        </table>

    </div>
</div>

@endsection

@section('modals')

<div class="modal fade" id="RegisterArrivalModal" tabindex="-1" aria-labelledby="RegisterArrivalModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-wastes">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterArrivalModalTitle">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-truck"></i> &nbsp;
                        <span id="txt-context-element">
                            Dar llegada
                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="{{route('managerWastesArrival.update')}}" id="register-arrival-form" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="text-bold p-2 mb-2 subtitle">
                        Residuos seleccionados:
                    </div>


                    <table id="wastes-arrival-manager-table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>N° Guía de Embalaje</th>
                                <th>N° Guía PPC</th>
                                <th>Clase</th>
                                <th>Nom. Residuo</th>
                                <th>Tipo de embalaje</th>
                                <th>Peso Original (Kg)</th>
                                <th>N° Bultos</th>
                                <th>Empresa</th>
                                <th>Fecha de salida Malvinas</th>
                            </tr>
                        </thead>

                        <tbody id="t-body-arrival-wastes-manager">

                        </tbody>

                    </table>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Fecha llegada de Pucallpa *</label>
                            <div class="input-group">
                                <input type="text" name="date-arrival" class="form-control datetimepicker" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Fecha retiro de puerto *</label>
                            <div class="input-group">
                                <input type="text" name="date-retreat" class="form-control datetimepicker" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputVolume">Nro. Guía GC puerto *</label>
                            <input type="text" name="n-guide-gc" class="form-control"
                                placeholder="Ingresar número de guía" required>
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

<div class="modal fade" id="RegisterDepartureModal" tabindex="-1" aria-labelledby="RegisterDepartureModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-wastes">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterDepartureModalTitle">
                    <div class="section-title mt-0">
                        <<i class="fa-solid fa-truck"></i> &nbsp;
                        <span id="txt-context-element">
                            Dar salida
                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="{{route('managerWastesDeparture.update')}}" id="register-departure-form" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="text-bold p-2 mb-2 subtitle">
                        Residuos seleccionados:
                    </div>


                    <table id="wastes-selected-departure-manager-table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>N° Guía PPC</th>
                                <th>N° Guía GC puerto</th>
                                <th>Clase</th>
                                <th>Nom. Residuo</th>
                                <th>Tipo de embalaje</th>
                                <th>Peso Original (Kg)</th>
                                <th>N° Bultos</th>
                                <th>Empresa</th>
                            </tr>
                        </thead>

                        <tbody id="t-body-departure-wastes-manager">

                        </tbody>

                    </table>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Fecha salida de Pucallpa *</label>
                            <div class="input-group">
                                <input type="text" name="date-departure" class="form-control datetimepicker" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Destino *</label>
                            <input type="text" name="destination" class="form-control"
                                placeholder="Ingresar destino" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Placa camión Pucallpa *</label>
                            <input type="text" name="plate" class="form-control"
                                placeholder="Ingresar placa" required>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="inputVolume">N° Guía Green Care *</label>
                            <input type="text" name="n-green-care-guide" class="form-control"
                                placeholder="Ingresar número de guía" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputVolume">Peso recibido *</label>
                            <input type="number" name="retrieved-weight" class="form-control" min="0" step="0.01"
                                placeholder="Ingresar peso recibido" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputVolume">Dif. de peso Malvinas-Pucallpa *</label>
                            <input type="number" name="weight-diff" class="form-control" min="0" step="0.01"
                                placeholder="Ingresar diferencia de pesos" required>
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