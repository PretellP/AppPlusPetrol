@extends('principal.common.layouts.masterpage')

@section('content')


<div class="row content">

    <div class="title-page-header">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>RESIDUOS</h4>
                </div>
            </div>
        </div>

        <div class="principal-container card-body card z-index-2">

            <div class="mb-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#RegisterClassModal">
                    <i class="fa-solid fa-plus"></i> &nbsp; Registrar
                </button>

                <button class="ms-3 btn btn-primary" data-toggle="modal" data-target="#RegisterWasteModal">
                    <i class="fa-solid fa-biohazard"></i> &nbsp; Tipos de residuos
                </button>
            </div>

            

            <table id="waste-class-table" class="table table-hover" data-url="{{route('wastes.index')}}">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Clase</th>
                        <th>Símbolo</th>
                        <th>Tipo de residuo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>

</div>

@endsection