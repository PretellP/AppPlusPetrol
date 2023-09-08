<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>@yield('title', 'APP | PlusPetrol')</title>

        <style>
            *
            {
                box-sizing: border-box;
                font-size: 13px;
                font-family: Arial, Helvetica, sans-serif;
            }

            .header-container
            {
                height: 100px;
                margin-bottom: 10px;
            }

            .header-container
            .left-header-cont
            {
                float: left;
                text-align: left;
                height: 100%
            }

            .left-header-cont
            .img-logo-cont
            {
                margin-bottom: 10px;
            }

            .left-header-cont
            .img-logo-cont img
            {
                height: 60px;
            }

            .left-header-cont
            .date-cont .date-title
            {
                font-weight: bold;
            }

            .header-container
            .right-header-cont
            {
                text-align: right;
                height: 100%;
             
                float: right;
            }

            .title-guide-cont
            {
                text-transform: uppercase;
                font-weight: bold;
                padding: 7px 15px;
                width: min-content;
                border: 1px solid black;
                margin-bottom: 22px; 
            }

            .guide-code-cont
            {
                padding: 10px 0;
            }

            .guide-code-cont
            .guide-code
            {
                padding: 7px 15px;
                border: 1px solid black;
                margin-left: 20px;
                font-weight: bold;
            }

            .title-description
            {
                padding: 3px;
                border-top: 1px solid black;
                border-left: 1px solid black;
                border-right: 1px solid black;
                background-color: rgb(228, 228, 228);
            }

            .title-description.after-first
            {
                border-top: none;
            }

            .table-guide
            {
                width: 100%;
                border-collapse: collapse;
            }

            .table-guide th,
            .table-guide td
            {
                border: 1px solid black;
            }

            .table-guide td
            {
                padding: 5px;
            }

            .obs-guide-container
            {
                margin-bottom: 10px;
            }

            .obs-guide-container
            .comment-box
            {
                min-height: 20px;
                padding: 5px
            }

            .container-users
            {
                width: 100%;
            }

            .container-users
            .row-div
            {
                margin-bottom: 15px;
                width: 46%;
            }

            .container-users
            .img-signature-cont
            {
                height: 100px;
                position: relative;
                overflow: hidden;
            }

            .container-users
            .img-signature-cont img
            {
                position: absolute;
                height: 99px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .text-center{text-align: center}
            .text-right{text-align: right}
            .text-left{text-align: left}
            .text-bold{font-weight: bold}
            .border-black{border: 1px solid black}
            .float-left{float: left;}
            .float-right{float: right;}
            .border-custom{ border-top: 1px solid black;
                            border-left: 1px solid black;
                            border-right: 1px solid black;}
            .margin-auto{margin: auto}

            .not-page-break{page-break-inside: avoid;};

        </style>
    </head>

    <body>

        <div class="header-container">
            <div class="left-header-cont">
                <div class="img-logo-cont">
                    <img src="data:image/jpg;base64,
                    {{base64_encode(file_get_contents(base_path('public/assets/common/images/logo.png')))}}" alt="">
                    {{-- <img src="{{public_path('assets/common/images/logo.png')}}" alt=""> --}}
                </div>
                <div class="date-cont">
                    <span class="date-title">
                        Fecha: 
                    </span>
                    <span class="date">
                        <?php setlocale(LC_TIME, 'es_es.UTF-8'); ?>
                        {{ strftime('%A, %e de %B, %Y %H:%M', time()) }}
                    </span>
                </div>
            </div>

            <div class="right-header-cont">
                <div class="title-guide-cont">
                    Guía de Internamiento de Residuos
                </div>
                <div class="guide-code-cont">
                    <span>
                        Nro.
                    </span>
                    <span class="guide-code">
                        {{$guide->code}}
                    </span>
                </div>
            </div>
        </div>

        <div class="general-content">

            <div class="body-description-container">
                <div class="title-description text-center">
                    DESCRIPCIÓN DE PROCEDENCIA
                </div>

                <table class="table-guide">
                    <thead>
                        <th>Lote</th>
                        <th>Etapa</th>
                        <th>Locación</th>
                        <th>Área / Proyecto</th>
                        <th>Empresa</th>
                        <th>Frente</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$guide->warehouse->lot->name}}</td>
                            <td>{{$guide->warehouse->stage->name}}</td>
                            <td>{{$guide->warehouse->location->name}}</td>
                            <td>{{$guide->warehouse->projectArea->name}}</td>
                            <td>{{$guide->warehouse->company->name}}</td>
                            <td>{{$guide->warehouse->front->name}}</td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <div class="detail-guide-container">
                <div class="title-description after-first text-center">
                    DETALLE DEL RESIDUO
                </div>

                <table class="table-guide">
                    <thead>
                        <th>Clase</th>
                        <th>Nombre / Tipo de Residuo</th>
                        <th>Peso(Kg)</th>
                        <th>N° de bultos</th>
                        <th>Tipo de Embalaje</th>
                    </thead>
                    <tbody>
                        @foreach ($guide->guideWastes as $waste)
                        <tr>
                            <td class="text-center">{{$waste->waste->classesWastes->first()->symbol}}</td>
                            <td>{{$waste->waste->name}}</td>
                            <td class="text-right">{{$waste->actual_weight}}</td>
                            <td class="text-right">{{$waste->package_quantity}}</td>
                            <td>{{$waste->package->name}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td class="text-bold text-center">Total Peso / Bultos</td>
                            <td class="text-right">{{$weight}}</td>
                            <td class="text-right">{{$packages}}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="obs-guide-container">
                <div class="title-description after-first">
                    Observaciones y/o Aclaraciones:
                </div>
                <div class="border-black comment-box">
                    {{$guide->comment}}
                </div>
            </div>

            <div class="page_break"></div>

            <div class="users-container">
                <div class="container-users top-container-users not-page-break">

                    <div class="row-div first-row-div float-left">
                        <div class="title-user-detail text-center title-description">
                            Solicitado por:
                        </div>
                        <div class="img-signature-cont border-custom">
                            <img src="data:image/jpg;base64,
                            {{base64_encode(file_get_contents(base_path('public/storage/'.$guide->applicant->url_signature)))}}" alt="">
                            {{-- <img src="{{public_path('storage/'.$guide->applicant->url_signature)}}" alt=""> --}}
                        </div>
                        <div>
                            <table class="table-guide">
                                <tbody>
                                    <tr>
                                        <td>Nombre: </td>
                                        <td>{{$guide->applicant->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Empresa: </td>
                                        <td>{{getUserCompany($guide->applicant)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tipo de Usuario: </td>
                                        <td>{{$guide->applicant->role->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Fecha de solicitud: </td>
                                        <td>{{$guide->created_at}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row-div second-row-div float-right" style="clear: both">
                        <div class="title-user-detail text-center title-description">
                            Recepcionado por:
                        </div>
                        <div class="img-signature-cont border-custom">
                            <img src="data:image/jpg;base64,
                            {{base64_encode(file_get_contents(base_path('public/storage/'.$guide->reciever->url_signature)))}}" alt="">
                            {{-- <img src="{{public_path('storage/'.$guide->reciever->url_signature)}}" alt=""> --}}
                        </div>
                        <div>
                            <table class="table-guide">
                                <tbody>
                                    <tr>
                                        <td>Nombre: </td>
                                        <td>{{$guide->reciever->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Empresa: </td>
                                        <td>{{getUserCompany($guide->reciever)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tipo de Usuario: </td>
                                        <td>{{$guide->reciever->role->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Fecha de recepción: </td>
                                        <td>{{$guide->date_recieved}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="container-users bottom-container-users not-page-break" style="clear: both">
                    
                    <div class="row-div first-row-div float-left">
                        
                        <div class="title-user-detail text-center title-description">
                            Aprobado por:
                        </div>
                        <div class="img-signature-cont border-custom">
                            <img src="data:image/jpg;base64,
                            {{base64_encode(file_get_contents(base_path('public/storage/'.$guide->approvant->url_signature)))}}" alt="">
                            {{-- <img src="{{public_path('storage/'.$guide->approvant->url_signature)}}" alt=""> --}}
                        </div>
                        <div>
                            <table class="table-guide">
                                <tbody>
                                    <tr>
                                        <td>Nombre: </td>
                                        <td>{{$guide->approvant->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Empresa: </td>
                                        <td>{{getUserCompany($guide->approvant)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tipo de Usuario: </td>
                                        <td>{{$guide->approvant->role->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Fecha de aprobación: </td>
                                        <td>{{$guide->date_approved}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="row-div second-row-div float-right">
                        <div class="title-user-detail text-center title-description">
                            Supervisado por:
                        </div>
                        <div class="img-signature-cont border-custom">
                            <img src="data:image/jpg;base64,
                            {{base64_encode(file_get_contents(base_path('public/storage/'.$guide->checker->url_signature)))}}" alt="">
                            {{-- <img src="{{public_path('storage/'.$guide->checker->url_signature)}}" alt=""> --}}
                        </div>
                        <div>
                            <table class="table-guide">
                                <tbody>
                                    <tr>
                                        <td>Nombre: </td>
                                        <td>{{$guide->checker->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Empresa: </td>
                                        <td>{{getUserCompany($guide->checker)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tipo de Usuario: </td>
                                        <td>{{$guide->checker->role->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Fecha de verificación: </td>
                                        <td>{{$guide->date_verified}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        


        
    </body>
</html>


