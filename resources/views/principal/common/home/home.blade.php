@extends('principal.common.layouts.masterpage')

@section('content')


<div class="row content">

    <div class="title-page-header">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>INICIO</h4>
                </div>
            </div>
        </div>

        <div class="card-body card z-index-2 g-course-flex home-page-content-container">

            <div class="title-home-text">¿Qué te gustaría Ver?</div>

            <div class="subtitle-home-text"> Elige la opción que más se adapte a tus requerimientos </div>

            <div class="link-boxes-container mt-4">

                @if (Auth::user()->userType->name == 'SOLICITANTE')
                <a href="{{route('guides.create')}}">
                    <div class="link-box">
                        <div class="img-context-link-container">
                            <img src="{{asset('storage/img/home/create.png')}}" alt="">
                        </div>
                        <div class="context-home-text">
                            Crear Guía de Internamiento
                        </div>
                    </div>
                </a>
                @endif

                <a href="{{$routeApproved}}">
                    <div class="link-box">
                        <div class="img-context-link-container">
                            <img src="{{asset('storage/img/home/approved.png')}}" alt="">
                        </div>
                        <div class="context-home-text">
                            Guías Aprobadas
                        </div>
                    </div>
                </a>
               
                <a href="{{$routePending}}">
                    <div class="link-box">
                        <div class="img-context-link-container">
                            <img src="{{asset('storage/img/home/pending.png')}}" alt="">
                        </div>
                        <div class="context-home-text">
                            Guías Pendientes
                        </div>
                    </div>
                </a>

                <a href="{{$routeRejected}}">
                    <div class="link-box">
                        <div class="img-context-link-container">
                            <img src="{{asset('storage/img/home/rejected.png')}}" alt="">
                        </div>
                        <div class="context-home-text">
                            Guías Rechazadas
                        </div>
                    </div>
                </a>

                @if (in_array(Auth::user()->userType->name, ['ADMINISTRADOR','SOLICITANTE']))
                <a href="{{$routeWastes}}">
                    <div class="link-box">
                        <div class="img-context-link-container">
                            <img src="{{asset('storage/img/home/wastes.png')}}" alt="">
                        </div>
                        <div class="context-home-text">
                            Residuos Generados
                        </div>
                    </div>
                </a>
                @endif

                @if (Auth::user()->userType->name == 'ADMINISTRADOR')
                
                <a href="{{route('warehouses.index')}}">
                    <div class="link-box">
                        <div class="img-context-link-container warehouses">
                            <i class="fa-solid fa-warehouse"></i>
                        </div>
                        <div class="context-home-text">
                            Gestionar Puntos Verdes
                        </div>
                    </div>
                </a>

                <a href="{{route('wastes.index')}}">
                    <div class="link-box">
                        <div class="img-context-link-container wastes">
                            <i class="fa-solid fa-recycle"></i>
                        </div>
                        <div class="context-home-text">
                            Gestionar Residuos
                        </div>
                    </div>
                </a>

                <a href="{{route('users.index')}}">
                    <div class="link-box">
                        <div class="img-context-link-container users">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="context-home-text">
                            Gestionar Usuarios
                        </div>
                    </div>
                </a>
                @endif

               
            </div>

        </div>
    </div>

</div>

@endsection
