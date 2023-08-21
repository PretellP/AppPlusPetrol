@extends('principal.common.layouts.masterpage')

@section('content')


<div class="row content">

    <div class="title-page-header">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>Guías de internamiento</h4>
                </div>
            </div>
        </div>

        <div class="principal-container applicant card-body card z-index-2">

            <div class="mb-4">
                <a id="register-wasteClass-btn" class="btn btn-primary" href="{{route('guides.create')}}">
                    <i class="fa-solid fa-circle-plus"></i> &nbsp; Registrar nueva guía
                    <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                </a>
            </div>

            <table id="guide-table-applicant" class="table table-hover" data-url="{{route('guides.index')}}">
                <thead>
                    <tr class="approved-guides-table-head">
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
                        <th class="not-export-col">Ver</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>

@endsection