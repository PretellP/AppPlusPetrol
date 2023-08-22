@extends('principal.common.layouts.masterpage')

@section('content')


<div class="row content">

    <div class="title-page-header">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>Guías rechazadas</h4>
                </div>
            </div>
        </div>

        <div class="principal-container card-body card z-index-2">

            <table id="guide-rejected-table-admin" class="table table-hover" data-url="{{route('guidesAdmin.index')}}">
                <thead>
                    <tr class="rejected-guides-table-head">
                        <th>Nro de Guía</th>
                        <th>Fecha de solicitud</th>
                        <th>Lote</th>
                        <th>Etapa</th>
                        <th>Locación</th>
                        <th>Area / Proyecto</th>
                        <th>Empresa</th>
                        <th>Frente</th>
                        <th>Estado Aprobado</th>
                        <th>Estado Recepcionado</th>
                        <th>Estado Verificado</th>
                        <th>Ver</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>

@endsection