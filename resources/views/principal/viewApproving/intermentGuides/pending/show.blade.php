@extends('principal.common.layouts.masterpage')

@section('content')


<div class="row content">

    <div class="title-page-header">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>Revisar guía de Internamiento pendiente</h4>
                </div>
            </div>
        </div>

        
        <div class="principal-container container-create-guide card-body card z-index-2">

            <a href="{{route('approverGuides.index')}}" class="btn btn-primary return-btn mb-2">
                <i class="fa-solid fa-circle-arrow-left fa-xl"></i> &nbsp;
                Regresar
            </a>

            <div class="code-container mb-4">
                GUÍA DE INTERNAMIENTO Nro:
                <span class="code-txt">
                    {{$guide->code}}
                </span>
            </div>

            <div class="mb-4">

                <form action="{{route('approvedGuide.update', $guide)}}" method="POST" id="register-approved-guide-form">
                    @csrf

                    <div class="description-guide-title">
                        Descripción de procedencia
                    </div>

                    <div class="form-row" id="selects-container-register-guide">
                        <div class="form-group col-md-2">
                            <span class="guide-warehouse-info-dis">LOTE</span>

                            <input value="{{$guide->warehouse->lot->name}}" type="text" class="form-control" disabled>

                        </div>

                        <div class="form-group col-md-2">
                            <span class="guide-warehouse-info-dis">ETAPA</span>

                            <input value="{{$guide->warehouse->stage->name}}" id="guide-stage-dis" type="text" class="form-control" disabled>
                        </div>


                        <div class="form-group col-md-2">
                            <span class="guide-warehouse-info-dis">LOCACIÓN</span>
                            <input value="{{$guide->warehouse->location->name}}" id="guide-location-dis" type="text" class="form-control" disabled>
                        </div>

                        <div class="form-group col-md-2">
                            <span class="guide-warehouse-info-dis">ÁREA / PROYECTO</span>
                            <input value="{{$guide->warehouse->projectArea->name}}" id="guide-proyect-dis" type="text" class="form-control" disabled>
                        </div>


                        <div class="form-group col-md-2">
                            <span class="guide-warehouse-info-dis">EMPRESA</span>
                            <input value="{{$guide->warehouse->company->name}}" id="guide-company-dis" type="text" class="form-control" disabled>
                        </div>


                        <div class="form-group col-md-2">
                            <span class="guide-warehouse-info-dis">FRENTE</span>
                            <input value="{{$guide->warehouse->front->name}}" id="guide-front-dis" type="text" class="form-control" disabled>
                        </div>

                    </div>

                    <div class="divider-bottom-select">
                    </div>


                    <table class="table table-hover mt-3">
                        <thead>
                            <tr>
                                <th class="classSymbol-guide" scope="col">CLASE</th>
                                <th class="nameWasteType-guide" scope="col">NOMBRE/TIPO DE RESIDUO</th>
                                <th scope="col">PESO APROX (Kg)</th>
                                <th scope="col">N° DE BULTOS</th>
                                <th scope="col">TIPO DE EMBALAJE</th>
                            </tr>
                        </thead>
                        <tbody id="table-classTypes-body">

                            @foreach ($guide->guideWastes as $wasteType)

                            <tr id="row-info-total-guide">
                                <td>{{$wasteType->waste->classesWastes->first()->symbol}}</td>
                                <td> {{$wasteType->waste->name}} </td>
                                <td id="info-total-weight"> {{$wasteType->aprox_weight}} </td>
                                <td>{{$wasteType->package_quantity}}</td>
                                <td>{{$wasteType->package->name}}</td>
                            </tr>

                            @endforeach

                            <tr id="row-info-total-guide">
                                <td></td>
                                <td class="text-right">Peso Total aproximado:</td>
                                <td id="info-actual-total-weight"> {{$aprox_weight}} </td>
                                <td> {{$totalPackage}} </td>
                                <td></td>
                            </tr>
                        </tbody>
                        
                        
                    </table>

                    <div class="divider-bottom-select">
                    </div>

                    <div class="guide-comment-container mt-3">
                        <label for="guide-comment">Observaciones y/o aclaraciones: </label>
                        <span> {{$guide->comment}} </span>
                    </div>

                    <div class="info-sending-users mt-3">


                        <div class="info-user-box-guide info-applicant-container">
                            <div class="info-user-header-guide">
                                Solicitado por:
                            </div>
                            <div class="img-signature-container">
                                <img src="{{asset('storage/'.$guide->applicant->url_signature)}}" alt="">
                            </div>
                            <div class="personal-info-user">
                                <div class="row-user-info-guide">
                                    <div class="row-user-info-label-guide">Nombre: </div>
                                    <div class="row-user-info-txt"> {{$guide->applicant->name}} </div> 
                                </div>
                                <div class="row-user-info-guide">
                                    <div class="row-user-info-label-guide">
                                        Tipo Usuario:
                                    </div>
                                    <div class="row-user-info-txt">
                                        {{$guide->applicant->role->name}}
                                    </div>
                                </div>
                                <div class="row-user-info-guide">
                                    <div class="row-user-info-label-guide">Fecha de solicitud:</div>
                                    <div class="row-user-info-txt">{{$guide->created_at}}</div>
                                </div>
                            </div>
                        </div>


                    </div>

                    @if ($guide->stat_approved == 0 && $guide->stat_rejected == 0)
                        <div class="mt-5 button-save-guide-container">

                            <button id="button-rejected-guide" class="btn btn-danger me-5">
                                <i class="fa-solid fa-circle-xmark fa-xl"></i> &nbsp;
                                Rechazar
                                <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                            </button>

                            <button type="submit" id="button-save-approved-guide" class="btn btn-primary ms-5">
                                <i class="fa-solid fa-circle-check fa-xl"></i> &nbsp;
                                Aprobar
                                <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                            </button>

                        </div>
                    @endif

                   

                </form>

            </div>

            <form action="{{route('guides.rejected', $guide)}}" id="form-reject-guide" method="POST">
                @csrf
            </form>

        </div>
    </div>

</div>

@endsection

@section('modals')


@endsection