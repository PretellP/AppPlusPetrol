<nav class="navbar navbar-expand-lg main-navbar">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="form-inline mr-auto">
        @csrf
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>

        <li class="dropdown ms-auto me-2 user-info-content">
            <a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <div class="d-sm-none d-lg-inline-block inner-info-container">
                    <i class="fa-solid fa-user"></i> &nbsp;&nbsp;
                    Hola, {{Auth::user()->name}}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right mt-4">
                <a href="" class="dropdown-item has-icon text-danger"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                </a>
            </div>
        </li>
    </form>
</nav>