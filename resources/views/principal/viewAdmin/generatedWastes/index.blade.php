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

            <input type="hidden" id="excel-generated-wastes-info" data-title='Residuos Generados-{{getCurrentDate()}}' data-name='residuos-generados-{{getCurrentDate()}}'>

            <table id="generated-wastes-table-admin" class="table table-hover" data-url="{{route('generatedWastesAdmin.index')}}">
                <thead>
                    <tr>
                        <th>Nro. de Guía</th>
                        <th>Fecha de verificación</th>
                        <th>Lote</th>
                        <th>Etapa</th>
                        <th>Locación</th>
                        <th>Área / Proyecto</th>
                        <th>Empresa</th>
                        <th>Frente</th>
                        <th>Clase</th>
                        <th>Nom. Residuo</th>
                        <th>Peso Original (Kg)</th>
                        <th>Nro. Bultos</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>

@endsection