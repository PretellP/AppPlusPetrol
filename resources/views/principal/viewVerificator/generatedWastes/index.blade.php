@extends('principal.common.layouts.masterpage')

@section('content')


<div class="row content">

    <div class="title-page-header">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>Residuos Generados</h4>
                </div>
            </div>
        </div>

        <div class="principal-container card-body card z-index-2">

            <div class="form-group date-range-container">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <a href="javascript:;" id="daterange-btn-wastes-verificator" class="btn btn-primary icon-left btn-icon pt-2">
                            <i class="fas fa-calendar"></i>
                                Elegir Fecha 
                        </a>
                    </div>
                    <input type="text" name="date-range" class="form-control date-range-input" disabled>
                </div>
            </div>

            <input type="hidden" id="excel-generated-wastes-info" data-name='{{Auth::user()->name}}'>

            <table id="generated-wastes-table-verificator" class="table table-hover" data-url="{{route('generatedWastesVerificator.index')}}">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nro. de Guía de Empaque</th>
                        <th>Nro. de Guía de Internamiento</th>
                        <th>Clase</th>
                        <th>Nombre de residuo</th>
                        <th>Tipo de empaque</th>
                        <th>Peso Real (kg)</th>
                        <th>Nro. de bultos</th>
                        <th>Empresa</th>
                        <th>Volumen de la carga</th>
                        <th>Fecha de verificación</th>
                        <th>Fecha de salida del residuo</th>
                        <th>Fecha de salida Malvinas</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>

@endsection