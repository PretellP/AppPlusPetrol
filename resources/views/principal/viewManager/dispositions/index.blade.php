@extends('principal.common.layouts.masterpage')

@section('content')

<div class="title-page-header">
    <div class="card page-title-container">
        <div class="card-header">
            <div class="total-width-container">
                <h4>Disposición final</h4>
            </div>
        </div>
    </div>

    <div class="principal-container card-body card z-index-2">

        <input type="hidden" id="excel-generated-departures-info" data-name='{{Auth::user()->name}}'>

        <div class="mb-4 buttons-register-container">
            <div id="btn-register-disposition-container"
                data-url="{{route('getWastesDetail.ajax')}}">
                <div class="btn btn-secondary" style="pointer-events: none;">
                    <i class="fa-solid fa-square-plus"></i> &nbsp;
                    <span class="me-1">Disposición</span>
                </div>
            </div>
        </div>

        <div class="group-filter-buttons-section">
            <div class="form-group date-range-container">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <a href="javascript:;" id="daterange-btn-dispositions-manager"
                            class="btn btn-primary icon-left btn-icon pt-2">
                            <i class="fas fa-calendar"></i>
                            Elegir Fecha
                        </a>
                    </div>
                    <input type="text" name="date-range" class="form-control date-range-input"
                        id="date-range-input-dispositions" disabled>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Filtrar por Disposición: &nbsp;</label>
                <div class="selectgroup">
                    <label class="selectgroup-item">
                        <input type="radio" name="filter-departures-stat-disposition" value="" class="selectgroup-input" checked>
                        <span class="selectgroup-button selectgroup-button-icon">TODO</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="filter-departures-stat-disposition" value="pendiente" class="selectgroup-input">
                        <span class="selectgroup-button selectgroup-button-icon">PENDIENTE</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="filter-departures-stat-disposition" value="gestionado" class="selectgroup-input">
                        <span class="selectgroup-button selectgroup-button-icon">GESTIONADO</span>
                    </label>
                </div>
            </div>

        </div>


        <table id="dispositions-table-manager" class="table table-hover" data-url="{{route('dispositions.index')}}">
            <thead>
                <tr>
                    <th>Elegir</th>
                    <th>N° Guía de Embalaje</th>
                    <th>N° Guía Green Care</th>
                    <th>Clase</th>
                    <th>Nom. Residuo</th>
                    <th>Tipo de embalaje</th>
                    <th>Peso Real (Kg)</th>
                    <th>N° Bultos</th>
                    <th>Empresa</th>

                    <th>N° Guía GC Puerto</th>
                    <th>Fecha llegada de Pucallpa</th>
                    <th>Fecha retiro de puerto</th>
                    <th>N° Guía Green Care</th>

                    <th>Destino</th>
                    <th>Placa camión Pucallpa</th>
                    <th>Peso recibido</th>
                    <th>Dif. peso Malv-Pucall</th>
                    <th>Fecha de salida de pucallpa</th>

                    <th>Guía de DDFF</th>
                    <th>Peso DDFF</th>
                    <th>Diferencia de pesos</th>
                    <th>Lugar de disposición</th>
                    <th>N° de Boleta</th>
                    <th>N°/Certificado</th>
                    <th>PLaca de camión</th>
                    <th>Reporte Gestión</th>
                    <th>Observación DF</th>
                    <th>Fecha llegada disposición</th>
                    <th>Fecha de DDFF</th>

                    <th>Estado Disposición</th>
                </tr>
            </thead>
        </table>

    </div>
</div>

@endsection

@section('modals')

<div class="modal fade" id="RegisterDispositionModal" tabindex="-1" aria-labelledby="RegisterDispositionModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-wastes">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterDispositionModalTitle">
                    <div class="section-title mt-0">
                        <<i class="fa-solid fa-truck"></i> &nbsp;
                        <span id="txt-context-element">
                            Disposición final
                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="{{route('managerWastesDisposition.update')}}" id="register-disposition-form" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="text-bold p-2 mb-2 subtitle">
                        Residuos seleccionados:
                    </div>

                    <table id="wastes-selected-disposition-manager-table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>N° Guía de Embalaje</th>
                                <th>N° Guía Green Care</th>
                                <th>Clase</th>
                                <th>Nom. Residuo</th>
                                <th>Tipo de embalaje</th>
                                <th>Peso Real (Kg)</th>
                                <th>N° Bultos</th>
                                <th>Destino</th>
                                <th>Placa camión Pucallpa</th>
                            </tr>
                        </thead>

                        <tbody id="t-body-disposition-wastes-manager">

                        </tbody>

                    </table>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="inputVolume">N° Guía de DDFF *</label>
                            <input type="text" name="n-ddff-guide" class="form-control"
                                placeholder="Ingresar número de guía" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Fecha de llegada *</label>
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
                            <label>Fecha de DDFF *</label>
                            <div class="input-group">
                                <input type="text" name="date-ddff" class="form-control datetimepicker" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="inputVolume">Peso DDFF *</label>
                            <input type="number" name="ddff-weight" class="form-control" min="0" step="0.01"
                                 required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputVolume">Diferencia de pesos *</label>
                            <input type="number" name="weight-diff" class="form-control" min="0" step="0.01"
                                placeholder="Ingresar diferencia de pesos" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputVolume">Lugar de disposición *</label>
                            <select name="disposition-place" class="form-control select2" id="registerDispositionSelect" required>
                                <option></option>
                                <option value="TRUPAL">Trupal</option>
                                <option value="TARIS">Taris</option>
                                <option value="ACEROS AREQUIPA">Aceros Arequipa</option>
                                <option value="PETRAMAS">Trupal</option>
                                <option value="GREEN CARE">Green Care</option>
                                <option value="GEXIM">Gexim</option>
                                <option value="ETNA">Etna</option>
                                <option value="PROVESUR">Provesur</option>
                                <option value="CAPSA">Capsa</option>
                                <option value="INNOVA ZAPALLAL">Innova Zapallal</option>
                                <option value="INNOVA LURIN">Innova Lurin</option>
                                <option value="SECHE-CHILCA">Seche-Chilca</option>
                            </select>
                        </div>
                        
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>N° de Boleta *</label>
                            <input type="text" name="n-invoice" class="form-control"
                                placeholder="Ingresar número de boleta" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>N°/Certificado *</label>
                            <input type="text" name="n-certification" class="form-control"
                                placeholder="Ingresar número de certificado" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Placa de Camión *</label>
                            <input type="text" name="plate" class="form-control"
                                placeholder="Ingresar placa de camión" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label>Reporte Gestión (opcional)</label>
                            <input type="text" name="report" class="form-control">
                        </div>
                        <div class="form-group col-6">
                            <label>Observación DF (opcional)</label>
                            <input type="text" name="observation" class="form-control">
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