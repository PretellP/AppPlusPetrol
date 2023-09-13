@extends('principal.common.layouts.masterpage')

@section('content')


<div class="row content">

    <div class="title-page-header">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>Guías verificadas</h4>
                </div>
            </div>
        </div>

        <div class="principal-container card-body card z-index-2">

            <table id="guide-verified-table-verificator" class="table table-hover" data-url="{{route('verificatorGuides.index')}}">
                <thead>
                    <tr class="approved-guides-table-head">
                        <th>Nro de Guía</th>
                        <th>Fecha</th>
                        <th>Lote</th>
                        <th>Etapa</th>
                        <th>Locación</th>
                        <th>Area / Proyecto</th>
                        <th>Empresa</th>
                        <th>Frente</th>
                        <th>Ver</th>
                        <th class="text-center">Generar PDF</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>

@endsection