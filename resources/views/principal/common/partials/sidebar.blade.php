<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">

        <div class="sidebar-brand">
            <a href="{{route('admin.index')}}">
                <img src="{{asset('assets/common/images/logo.png')}}" alt="">
            </a>
        </div>
        
        <div class="sidebar-brand hidden sidebar-brand-sm">
            <a href="{{route('admin.index')}}">
                <img src="{{asset('assets/common/images/logo.png')}}" alt="">
            </a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{setActive('admin.index')}}">
                <a href="{{route('admin.index')}}" class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    <span>Inicio</span>
                </a>
            </li>

            <li class="">
                <a href="" class="nav-link">
                    <i class="fa-solid fa-building-circle-check"></i>
                    <span>Internamiento</span>
                </a>
            </li>

            <li class="">
                <a href="" class="nav-link">
                    <i class="fa-solid fa-layer-group"></i>
                    <span>Stock</span>
                </a>
            </li>

            <li class="">
                <a class="nav-link" href="">
                    <i class="fa-solid fa-truck-moving"></i>
                    <span>Transporte</span>
                </a>
            </li>

            <li class="">
                <a class="nav-link" href="">
                    <i class="fa-solid fa-industry"></i>
                    <span>Disposición final</span>
                </a>
            </li>

        </ul>

        @if (Auth::user()->userType->name == 'ADMINISTRADOR')
            
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