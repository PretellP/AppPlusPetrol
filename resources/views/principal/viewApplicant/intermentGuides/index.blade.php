@extends('principal.common.layouts.masterpage')

@section('content')


<div class="row content">

    <div class="title-page-header">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>Solicitar Guía de Internamiento</h4>
                </div>
            </div>
        </div>

        <div class="principal-container container-create-guide card-body card z-index-2">

            <div class="code-container mb-4">
                GUÍA DE INTERNAMIENTO Nro:
                <span class="code-txt">
                    {{$guide_code}}
                </span>
            </div>

            <div class="mb-4">

                <form action="" id="registerGuideForm">

                    <div class="select-warehouse-guide-container">

                        <div class="form-group col-md-12 inner-box-select-warehouse">
                            <label for="guide-warehouse-select">Punto verde *</label>
                            <select data-url="{{route('guides.getDataWarehouse')}}" name="select-warehouse"
                                id="guide-warehouse-select" class="form-control select2" required>
                                <option value=""></option>
                                @foreach ($warehouses as $warehouse)
                                <option value="{{$warehouse->id}}">{{$warehouse->id}} - {{$warehouse->front->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="description-guide-title">
                        Descripción de procedencia
                    </div>

                    <div class="form-row" id="selects-container-register">
                        <div class="form-group col-md-2">
                            <span class="guide-warehouse-info-dis">LOTE</span>

                            <input id="guide-lot-dis" type="text" class="form-control" disabled>

                        </div>

                        <div class="form-group col-md-2">
                            <span class="guide-warehouse-info-dis">ETAPA</span>

                            <input id="guide-stage-dis" type="text" class="form-control" disabled>
                        </div>


                        <div class="form-group col-md-2">
                            <span class="guide-warehouse-info-dis">LOCACIÓN</span>
                            <input id="guide-location-dis" type="text" class="form-control" disabled>
                        </div>

                        <div class="form-group col-md-2">
                            <span class="guide-warehouse-info-dis">ÁREA / PROYECTO</span>
                            <input id="guide-proyect-dis" type="text" class="form-control" disabled>
                        </div>


                        <div class="form-group col-md-2">
                            <span class="guide-warehouse-info-dis">EMPRESA</span>
                            <input id="guide-company-dis" type="text" class="form-control" disabled>
                        </div>


                        <div class="form-group col-md-2">
                            <span class="guide-warehouse-info-dis">FRENTE</span>
                            <input id="guide-front-dis" type="text" class="form-control" disabled>
                        </div>

                    </div>

                    <div class="divider-bottom-select">
                    </div>


                    <div class="select-class-guide-container mt-3">

                        <div class="form-group select-container-ClassWaste inner-box-select-warehouse">
                            <label for="guide-wasteClass-select">Clase de residuo *</label>
                            <select data-url="{{route('guides.getDataWarehouse')}}" id="guide-wasteClass-select"
                                class="form-control select2">
                                <option value=""></option>
                                @foreach ($wasteClasses as $wasteClass)
                                <option value="{{$wasteClass->id}}"> {{$wasteClass->symbol}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group ms-3 waste-type-select-container">
                            <label for="guide-wasteTypes-select">Tipos de residuo *</label>
                            <select id="guide-wasteTypes-select" class="form-control select2" multiple>
                            </select>
                        </div>

                        <div class="form-group ms-3 save-btn-classWaste-guide-container">
                            <button class="btn btn-primary" id="btn-save-classWaste-guide" data-url="{{route('guides.getDataWarehouse')}}">
                                <i class="fa-solid fa-square-plus"></i> &nbsp;
                                Agregar
                            </button>
                        </div>
                    </div>



                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th class="classSymbol-guide" scope="col">CLASE</th>
                                <th class="nameWasteType-guide" scope="col">NOMBRE/TIPO DE RESIDUO</th>
                                <th scope="col">PESO APROX (Kg)</th>
                                <th scope="col">N° DE BULTOS</th>
                                <th scope="col">TIPO DE EMBALAJE</th>
                                <th scope="col">Borrar</th>
                            </tr>
                        </thead>
                        <tbody id="table-classTypes-body">

                            <tr id="row-info-total-guide">
                                <td></td>
                                <td class="text-right">Total Peso / Bultos:</td>
                                <td id="info-total-weight">0</td>
                                <td id="info-package-quantity">0</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                        
                        
                    </table>

                </form>

            </div>

        </div>
    </div>

</div>

@endsection

@section('modals')


@endsection