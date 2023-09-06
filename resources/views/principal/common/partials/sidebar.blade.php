<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">

        <div class="sidebar-brand">
            <a href="{{route('home.index')}}">
                <img src="{{asset('assets/common/images/logo.png')}}" alt="">
            </a>
        </div>
        
        <div class="sidebar-brand hidden sidebar-brand-sm">
            <a href="{{route('home.index')}}">
                <img src="{{asset('assets/common/images/logo.png')}}" alt="">
            </a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{setActive('home.index')}}">
                <a href="{{route('home.index')}}" class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    <span>Inicio</span>
                </a>
            </li>

            @if (in_array(Auth::user()->role->name, ['SOLICITANTE']))

                <li class="{{setActive('guides.*')}}">
                    <a href="{{route('guides.create')}}" class="nav-link">
                        <i class="fa-solid fa-building-circle-check"></i>
                        <span>Crear Guía</span>
                    </a>
                </li>

                <li class="{{setActive('guidesApproved.*')}}">
                    <a href="{{route('guidesApproved.index')}}" class="nav-link">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Aprobados</span>
                    </a>
                </li>

                <li class="{{setActive('guidesPending.*')}}">
                    <a href="{{route('guidesPending.index')}}" class="nav-link">
                        <i class="fa-solid fa-clock-rotate-left fa-flip-vertical"></i>
                        <span>Pendientes</span>
                    </a>
                </li>

                <li class="{{setActive('guidesRejected.*')}}">
                    <a href="{{route('guidesRejected.index')}}" class="nav-link">
                        <i class="fa-solid fa-ban"></i>
                        <span>Rechazadas</span>
                    </a>
                </li>

                <li class="{{setActive('generatedWastesApplicant.*')}}">
                    <a href="{{route('generatedWastesApplicant.index')}}" class="nav-link">
                        <i class="fa-solid fa-dumpster"></i>
                        <span>Residuos Generados</span>
                    </a>
            </li>

            @endif

          @if (in_array(Auth::user()->role->name, ['APROBANTE']))

            <li class="{{setActive('approvingApprovedGuides.*')}}">
                <a href="{{route('approvingApprovedGuides.index')}}" class="nav-link">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Aprobados</span>
                </a>
            </li>

            <li class="{{setActive('approverGuides.*')}}">
                <a class="nav-link" href="{{route('approverGuides.index')}}">
                    <i class="fa-solid fa-clock-rotate-left fa-flip-vertical"></i>
                    <span>Pendientes</span>
                </a>
            </li>

            <li class="{{setActive('approvingRejectedGuides.*')}}">
                <a class="nav-link" href="{{route('approvingRejectedGuides.index')}}">
                    <i class="fa-solid fa-ban"></i>
                    <span>Rechazadas</span>
                </a>
            </li>

            <li class="{{setActive('generatedWastesApproving.*')}}">
                <a href="{{route('generatedWastesApproving.index')}}" class="nav-link">
                    <i class="fa-solid fa-dumpster"></i>
                    <span>Residuos Generados</span>
                </a>
            </li>

          @endif

          @if (in_array(Auth::user()->role->name, ['RECEPTOR']))
            <li class="{{setActive('recieverRecievedGuides.*')}}">
                <a href="{{route('recieverRecievedGuides.index')}}" class="nav-link">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Recepcionadas</span>
                </a>
            </li>

            <li class="{{setActive('recieverGuides.*')}}">
                <a class="nav-link" href="{{route('recieverGuides.index')}}">
                    <i class="fa-solid fa-clock-rotate-left fa-flip-vertical"></i>
                    <span>Pendientes</span>
                </a>
            </li>

            <li class="{{setActive('recieverRejectedGuides.*')}}">
                <a class="nav-link" href="{{route('recieverRejectedGuides.index')}}">
                    <i class="fa-solid fa-ban"></i>
                    <span>Rechazadas</span>
                </a>
            </li>

            <li class="{{setActive('generatedWastesReciever.*')}}">
                <a href="{{route('generatedWastesReciever.index')}}" class="nav-link">
                    <i class="fa-solid fa-dumpster"></i>
                    <span>Residuos Generados</span>
                </a>
            </li>
          @endif

        @if (in_array(Auth::user()->role->name, ['SUPERVISOR']))
            <li class="{{setActive('verificatorVerifiedGuides.*')}}">
                <a href="{{route('verificatorVerifiedGuides.index')}}" class="nav-link">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Verificadas</span>
                </a>
            </li>

            <li class="{{setActive('verificatorGuides.*')}}">
                <a class="nav-link" href="{{route('verificatorGuides.index')}}">
                    <i class="fa-solid fa-clock-rotate-left fa-flip-vertical"></i>
                    <span>Pendientes</span>
                </a>
            </li>

            <li class="{{setActive('verificatorRejectedGuides.*')}}">
                <a class="nav-link" href="{{route('verificatorRejectedGuides.index')}}">
                    <i class="fa-solid fa-ban"></i>
                    <span>Rechazadas</span>
                </a>
            </li>

            <li class="{{setActive('generatedWastesVerificator.*')}}">
                <a href="{{route('generatedWastesVerificator.index')}}" class="nav-link">
                    <i class="fa-solid fa-dumpster"></i>
                    <span>Residuos Generados</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role->name == 'ADMINISTRADOR')
        
            <li class="{{setActive('guidesAdminApproved.*')}}">
                <a href="{{route('guidesAdminApproved.index')}}" class="nav-link">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Guías aprobadas</span>
                </a>
            </li>

            <li class="{{setActive('guidesAdminPending.*')}}">
                <a href="{{route('guidesAdminPending.index')}}" class="nav-link">
                    <i class="fa-solid fa-clock-rotate-left fa-flip-vertical"></i>
                    <span>Guías pendientes</span>
                </a>
            </li>

            <li class="{{setActive('guidesAdminRejected.*')}}">
                <a href="{{route('guidesAdminRejected.index')}}" class="nav-link">
                    <i class="fa-solid fa-ban"></i>
                    <span>Guías rechazadas</span>
                </a>
            </li>

            <li class="{{setActive('generatedWastesAdmin.*')}}">
                <a href="{{route('generatedWastesAdmin.index')}}" class="nav-link">
                    <i class="fa-solid fa-dumpster"></i>
                    <span>Residuos Generados</span>
                </a>
            </li>
        
        @endif

        @if (Auth::user()->role->name == 'GESTOR')
            <li class="{{setActive('stock.*')}}">
                <a href="{{route('stock.index')}}" class="nav-link">
                    <i class="fa-solid fa-layer-group"></i>
                    <span>Stock</span>
                </a>
            </li>

            <li class="{{setActive('departures.*')}}">
                <a href="{{route('departures.index')}}" class="nav-link">
                    <i class="fa-solid fa-truck-moving"></i>
                    <span>Transporte</span>
                </a>
            </li>

            <li class="{{setActive('dispositions.*')}}">
                <a href="{{route('dispositions.index')}}" class="nav-link">
                    <i class="fa-solid fa-industry"></i>
                    <span>Disposición final</span>
                </a>
            </li>
    
        @endif

        </ul>

        @if (Auth::user()->role->name == 'ADMINISTRADOR')
            
            <ul class="sidebar-menu txt-divider">
                <li class="">
                    <a class="nav-link" href="">
                        <i class="fa-solid fa-user-shield"></i>
                        <span>ADMINISTRADOR</span>
                    </a>
                </li>
            </ul>

            <ul class="sidebar-menu">

                <li class="{{setActive('warehouses.*')}}">
                    <a href="{{route('warehouses.index')}}" class="nav-link">
                        <i class="fa-solid fa-warehouse"></i>
                        <span>Puntos verdes</span>
                    </a>
                </li>

                <li class="{{setActive('wastes.*')}}">
                    <a href="{{route('wastes.index')}}" class="nav-link">
                        <i class="fa-solid fa-recycle"></i>
                        <span>Residuos</span>
                    </a>
                </li>

                <li class="{{setActive('users.*')}}">
                    <a href="{{route('users.index')}}" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <span>Usuarios</span>
                    </a>
                </li>

            </ul>

        @endif

    </aside>
</div>